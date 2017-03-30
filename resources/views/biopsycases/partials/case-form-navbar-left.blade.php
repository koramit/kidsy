@if($case->part != 'set-biopsy' && Auth::user()->canUseResource('set-biopsy'))
<li class="hvr-bounce-to-bottom"><a href="/biopsycases/set-biopsy/{{ $case->id }}/edit"><span class="fa fa-calendar"></span> Appointment</a></li>
@endif

@if($case->part != 'pre-biopsy-data' && Auth::user()->canUseResource('pre-biopsy-data'))
<li class="hvr-bounce-to-bottom"><a href="/biopsycases/pre-biopsy-data/{{ $case->id }}/edit"><span class="fa fa-file-text-o"></span> Pre-Data</a></li>
@endif

@if($case->part != 'clinical-data' && Auth::user()->canUseResource('clinical-data'))
<li class="hvr-bounce-to-bottom"><a href="/biopsycases/clinical-data/{{ $case->id }}/edit"><span class="fa fa-stethoscope"></span> Clinical Data</a></li>
@endif

@if($case->part != 'procedure-note' && Auth::user()->canUseResource('procedure-note'))
<li class="hvr-bounce-to-bottom"><a href="/biopsycases/procedure-note/{{ $case->id }}/edit"><span class="fa fa-file-powerpoint-o"></span> Procedure Note</a></li>
@endif

<li class="hvr-bounce-to-bottom"><a role="button" onclick="$('select').removeAttr('disabled'); $('input').removeAttr('disabled'); $('#save_form').click();"><span class="fa fa-save"></span> Save</a></li>