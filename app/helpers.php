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