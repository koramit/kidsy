<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Print Procedure Note</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/print.css') }}" type="text/css" media="print"  charset="utf-8">

    <style type="text/css">
        body {
            font-size: 10pt;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <!-- Head row -->
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="text-align: center; border: solid; width: 15%">HN ( {{ count($patients) }} ราย )</th>
                <th style="text-align: center; border: solid; width: 30%">ชื่อ</th>
                <th style="text-align: center; border: solid; width: 15%">เลขแฟ้ม</th>
                <th style="text-align: center; border: solid; width: 40%">หมายเหตุ ({{ $dateTimeClinic }})</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            @if($patient['folder_number'] !== NULL)
            <tr>
                <td style="border: solid; text-align: center; ">{{ $patient['hn'] }}</td>
                <td style="border: solid; "><span style="margin-left: 10pt; ">{{ $patient['name'] }}</span></td>
                <td style="border: solid; text-align: center; ">
                    @if($patient['folder_type'])
                        {{ $patient['folder_number'] }}
                    @else
                        <b><i>{{ $patient['folder_number'] }}</i></b>
                    @endif
                </td>
                <td style="border: solid; "><span style="margin-left: 10pt; ">{{ $patient['remark'] }}</span></td>
            </tr>
            @endif
            @endforeach

            @foreach($patients as $patient)
            @if($patient['folder_number'] === NULL)
            <tr>
                <td style="border: solid; text-align: center; ">{{ $patient['hn'] }}</td>
                <td style="border: solid; "><span style="margin-left: 10pt; ">{{ $patient['name'] }}</span></td>
                <td style="border: solid; text-align: center; ">ไม่มีแฟ้ม</td>
                <td style="border: solid; "><span style="margin-left: 10pt; "></span></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>