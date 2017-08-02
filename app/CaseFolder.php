<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseFolder extends Model
{
    protected $fillable = [
        'id',
        'hn',
        'diagnosis',
        'diagnosis_code',
        'year_code',
        'run_number',
        'folder_type',
        'remark',
    ];

    public static function findByHn($search) {
        foreach ( CaseFolder::where('mini_hash', miniHash($search))->get() as $case ) {
            if ( $case->hn == $search ) return $case;
        }

        return NULL;
    }

    public function getFolderNumber() {
        return $this->diagnosis_code . '-' . $this->year_code . '-' . str_pad($this->run_number, 3, '0', STR_PAD_LEFT) ;
    }

    // hn attribute get and set.
    public function setHnAttribute($value) {
        $this->attributes['hn'] = encryptInput($value);
        $this->attributes['mini_hash'] = miniHash($value);
    }
    public function getHnAttribute() {
        return decryptAttribute($this->attributes['hn']);
    }

    public static function importLegacyData() {
        $cases = \App\LegacyBiopsyCase::whereNotNull('HN')
                                  ->whereNotNull('date_bx')
                                  ->whereNotNull('diag_code')
                                  ->whereNotNull('year_bx')
                                  ->whereNotNull('run_no')
                                  ->orderBy('date_bx')
                                  ->get();
        $count = 1;
        foreach ( $cases as $case ) {
            if ( strlen($case->HN) == 8 && CaseFolder::findByHn($case->HN) == NULL  ) {
                $caseFolder['id'] = $count++;
                $caseFolder['hn'] = $case->HN;
                $caseFolder['diagnosis'] = $case->diag_name == '' ? NULL : $case->diag_name;
                $caseFolder['diagnosis_code'] = $case->diag_code;
                $caseFolder['year_code'] = $case->year_bx;
                $caseFolder['run_number'] = $case->run_no;
                $caseFolder['folder_type'] = $case->folder_type;
                $remark = trim($case->remark . ' ' . $case->new_folder  . ' ' . $case->staus);
                $caseFolder['remark'] = $remark == '' ? NULL : $remark;
                CaseFolder::create($caseFolder);
            }
        }
    }
}
