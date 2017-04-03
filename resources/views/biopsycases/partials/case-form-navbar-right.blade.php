@if(Auth::user()->canUseResource('print-procedure') && $case->canPrint())
<li class="hvr-bounce-to-top"><a href="/biopsycases/report/{{ $case->id }}" target="_blank"><span class="fa fa-print"></span> Print</a></li>
@endif
<li class="hvr-bounce-to-top"><a href="/biopsycases/queue"><span class="fa fa-list-ol"></span> Queue</a></li>
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>