<?php

// User Definded function
if (! function_exists('encryptInput')) {
    function encryptInput($value) {
        return ($value == '') ? NUll : \Crypt::encrypt($value);
    }
}

if (! function_exists('decryptAttribute')) {
    function decryptAttribute($value) {
        return is_null($value) ? NULL : \Crypt::decrypt($value);
    }
}

if (! function_exists('parseDateInput')) {
    function parseDateInput($value) {
        return $value == '' ? NULL : \Carbon\Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }
}

if (! function_exists('parseDatetimeInput')) {
    function parseDatetimeInput($value) {
        return $value == '' ? NULL : \Carbon\Carbon::createFromFormat('d-m-Y H:i', $value)->toDatetimeString();
    }
}

if (! function_exists('parseNumericInput')) {
    function parseNumericInput($value) {
        return is_numeric($value) ? $value : NULL;
    }
}

if (! function_exists('complementInputs')) {
    function complementInputs(&$request, $inputs) {
        foreach($inputs as $input => $type) {
            if ($type == 'checkbox') {
                $request[$input] = (!array_key_exists($input, $request)) ? "0" : "1";
            } elseif ($type == 'options') {
                if (!array_key_exists($input, $request)) $request[$input] = NULL;
            } elseif ($type == 'text') {
                if ($request[$input] === '') $request[$input] = NULL;
            } elseif ($type == 'number') {
                if (!is_numeric($request[$input])) $request[$input] = NULL;
            } elseif ($type == 'date') {                
                $request[$input] = ($request[$input] === '') ? NULL : parseDateInput($request[$input]);
            } else { // datetime
                $request[$input] = ($request[$input] === '') ? NULL : parseDatetimeInput($request[$input]);
            }
        }
    }
}

if (! function_exists('displayDate')) {
    function displayDate($date, $format = 'd-m-Y') {
        return $date !== NULL ? (new \DateTime($date))->format($format) : '';
    }
}

if (! function_exists('isInputChecked')) {
    function isInputChecked($input, $checkValue, $mode = 'checked') {
        return $input === $checkValue ? ($mode == 'checked' ? 'checked':'selected'):'';
    }
}

if (! function_exists('h_en')) {
    function h_en($value) {
        return is_null($value) ? NULL : strrev(base64_encode(env('PRE_H') . $value . env('PEN_H')));
    }
}

if (! function_exists('h_de')) {
    function h_de($value) {
        return str_replace(env('PEN_H'),'',(str_replace(env('PRE_H'), '', base64_decode(strrev($value)))));
    }
}


if (! function_exists('removeNullInput')) {
    function removeNullInput(&$data) {
        foreach($data as $key => $value) {
            if ($value == 'NULL' || $value == NULL) unset($data[$key]);
        }
    }
}

if (! function_exists('loadCSV')) {
    function loadCSV($fileName) {
        $fileName = storage_path(). '/csv/' . $fileName . '.csv';
        if(!file_exists($fileName) || !is_readable($fileName))
            return FALSE;
        else {
            $header = NULL;
            $data = array();
            $count = 0;
            if (($handle = fopen($fileName, 'r')) !== FALSE){
                while (($row = fgetcsv($handle, 3000, ",")) !== FALSE){ // 300 = max lenght of longest line
                    if(!$header)
                        $header = $row;
                    else 
                        $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
            return $data;
        }
    }
}

if (! function_exists('miniHash')) {
    function miniHash($data) {
        return substr(hash_hmac("sha256", $data, env('APP_KEY')), 13, 7);
    }
}

// function testXYZ($search) {
//     $diagList = [
//                 "Minimal change",
//                 "IgM Nephropathy (IgM)",
//                 "FGS",
//                 "FSGS",
//                 "Focal glomerulosclerosis",
//                 "Focal proliferative GN",
//                 "Membranous GN",
//                 "Nephropathy",
//                 "Diffuse Endocapillary Proliferative GN",
//                 "Postinfectious GN",
//                 "Poststreptococcal GN",
//                 "Membranoproliferative GN (MPGN)",
//                 "MPGN type I",
//                 "MPGN type II",
//                 "MPGN type III",
//                 "Mesangial Proliferative GN",
//                 "Diffuse Crescentic GN",
//                 "Diffuse Sclerosing GN",
//                 "IgA Nephropathy (IgA)",
//                 "SLE",
//                 "Lupus Nephritis (LN)",
//                 "LN type I",
//                 "LN type II",
//                 "LN type III",
//                 "LN type III+V",
//                 "LN type IV",
//                 "LN type IV+V",
//                 "LN type V",
//                 "LN type II+V",
//                 "LN type VI",
//                 "Henoch Scholein Purpura",
//                 "DM and/or Diabetic nephropathy",
//                 "Amyloidosis",
//                 "Multiple myeloma (MM)",
//                 "Cast nephropathy",
//                 "Myeloma cast nephropathy",
//                 "Alport's syndrome",
//                 "Unclassifiled GN",
//                 "Tubulointerstitial disease",
//                 "Acute interstitial nephritis",
//                 "Chronic interstitial nephritis",
//                 "Acute tubular necrosis",
//                 "Diffuse cortical necrosis",
//                 "Miscellaneous",
//                 "Heavy chain deposition",
//                 "Normal biopsy",
//                 "End stage renal disease (ESRD)",
//                 "Renal insufficiency",
//                 "Chronic azotemia",
//                 "Unspecified CRF",
//                 "Acute ontop CRF",
//                 "Biopsy in Kidney Transplant (KT)",
//                 "Inadequate or Failed biopsy",
//                 "Autopsy",
//                 "Thromobotic Microangiopathy including Toxemia of Pregnancy",
//                 "Consistent with scleroderma renal disease",
//                 "Nephrotic Syndrome (NS)",
//                 "Obstructive (uropathy)",
//                 "Hydronephrosis",
//                 "Wegener's granulomatosis",
//                 "ANCA +ve GN",
//                 "Pauci-immune GN",
//                 "PAN"
//         ];
//     echo "$search\n";
//     foreach($diagList as $diag) {
//         // $found = strpos($diag, $search);
//         echo "$diag <==> $search\n";
//         $found = strpos($diag, $search);
//         echo "$found\n";
//         // echo "$found --> $diag\n";
//         if ( strpos($diag, $search) !== FALSE ) {
//             // echo strpos($diag, $search) . "\n";
//             $matches[] = $diag;
//         }
//     }
//     return $matches;//array_values($matches);
// }