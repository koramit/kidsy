<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegacyBiopsyCase extends Model
{
    protected $fillable = [
        'id',
        'no',
        'title',
        'first_name',
        'last_name',
        'diag_code',
        'year_bx',
        'run_no',
        'HN',
        'folder_type',
        'date_bx',
        'remark',
        'lab',
        'surgical_number',
        'diag_name',
        'new_folder',
        'status',
        'unused_HN_1',
        'unused_HN_2',
        'unused_HN_3',
        'unused_HN_4',
        'unused_HN_5',
        'scanner',
        'folder_status',
        'remark_2',
        'remark_3',
        'remark_4',
        'remark_5',
    ];

    protected $dates = ['date_bx'];

    public function getFolderTypeAttribute() {
        switch ($this->attributes['folder_type']) {
            case 'เหลือง':
                return 0;
            case 'แดง':
                return 1;
            default:
                return NULL;
        }
    }

    public function getFolderNumber() {
        if ( $this->diag_code != NULL && $this->year_bx != NULL && $this->run_no != NULL )
            return $this->diag_code . '-' . $this->year_bx . '-' . str_pad($this->run_no, 3, '0', STR_PAD_LEFT);
        return NULL;
    }

    public static function findByHN($hn) {
        return LegacyBiopsyCase::where('hn', $hn)->orderBy('id')->first();
    }

    public static function findFolderNumberByHN($hn) {
        $folder = LegacyBiopsyCase::where('hn', $hn)->orderBy('id')->first();
        return $folder === NULL ? NULL : $folder->getFolderNumber();
    }

    public static function loadDataFromCSV() {
        $checkEmptyFields = ['diag_code', 'year_bx', 'run_no', 'HN'];
        $data = loadCSV('legacy_biopsy_cases');
        
        $count = 1;
        
        foreach( $data as $case) {
            if ( $case['date_bx'] != '' )
                $case['date_bx'] = \Carbon\Carbon::createFromFormat('d-m-Y', $case['date_bx'])->format('Y-m-d');
            else
                unset($case['date_bx']);

            foreach ( $checkEmptyFields as $field )
                if ( $case[$field] == '' ) unset($case[$field]);
            
            $case['id'] = $count++;
            LegacyBiopsyCase::create($case);
        }
    }
}
