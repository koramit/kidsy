HN : {{ $case->hn }} 
{{ $case->getPatientData('name') }} 
<span class="fa fa-{{ $case->getPatientData('gender') ? 'mars' : 'venus' }}"></span>