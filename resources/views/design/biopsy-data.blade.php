<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biopsy data</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Native</th>
                <th>HN</th>
                <th>date_bx</th>
                <th>Height</th>
                <th>Weight</th>
                <th>SBP</th>
                <th>DBP</th>
                <th>national_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>dob</th><!-- dd-mm-yyyy -->
                <th>gender</th>
                <th>address</th>
                <th>postcode</th>
                <th>tel_no</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cases as $case)
            <tr>
                <td>{{ $case->id }}</td>
                <td>{{ $case->is_native }}</td>
                <td>{{ $case->HN }}</td>
                <td>{{ $case->date_bx->format('d-M-Y') }}</td>
                <td>{{ $case->height_cm }}</td>
                <td>{{ $case->weight_kg }}</td>
                <td>{{ $case->pre_SBP_mmHg }}</td>
                <td>{{ $case->pre_DBP_mmHg }}</td>
                <td>{{ $case->getPatientData('document_id') }}</td>
                <td>{{ $case->getPatientData('first_name') }}</td>
                <td>{{ $case->getPatientData('last_name') }}</td>
                <td>{{ $case->getPatientData('dob') === NULL ? '' : date_create($case->getPatientData('dob'))->format('d-M-Y') }}</td><!-- dd-mm-yyyy -->
                <td>{{ $case->getPatientData('gender') }}</td>
                <td>{{ $case->getPatientData('address') }}</td>
                <td>{{ $case->getPatientData('postcode') }}</td>
                <td>{{ $case->tel_no === NULL ? $case->getPatientData('tel_no') : $case->tel_no }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>