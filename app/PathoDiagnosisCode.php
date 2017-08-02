<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PathoDiagnosisCode extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
        'color_text',
        'color_hex',
        'tag_size',
    ];

    public static function newDiagCode($diag) {
        $id = PathoDiagnosisCode::count() + 1;
        return PathoDiagnosisCode::create([
                'id' => $id,
                'code' => 19,
                'name' => $diag,
                'color_text' => 'ขาว',
                'color_hex' => 'fff',
                'tag_size' => 2
            ]) ? PathoDiagnosisCode::find($id) : NULL;
    }

    public static function findByName($search) {
        $diag = PathoDiagnosisCode::where('name', $search)->first();
        return $diag;
    }

    public static function findByCode($search) {
        $diag = PathoDiagnosisCode::where('code', $search)->first();
        return $diag;
    }

    public static function getColorText($diagCode) {
        $diag = PathoDiagnosisCode::where('code', $diagCode)->first();
        if ( $diag !== NULL ) {
            return $diag->color_text . ($diag->tag_size === 1 ? 'เล็ก' : '');
        }

        return NULL;
    }

    public static function loadDataFromCSV() {
        $pathoCodes = loadCSV('patho_diag_codes');
        $count = 0;
        foreach($pathoCodes as $code) {
            $code['id'] = $count++;
            PathoDiagnosisCode::create($code);
        }
    }
}
