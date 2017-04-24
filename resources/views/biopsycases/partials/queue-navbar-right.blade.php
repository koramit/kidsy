@if( Auth::user()->canUseResource('post-complications') && strpos(url()->current(), 'incomplete-post-complications-list') === FALSE )
<li class="hvr-bounce-to-top"><a href="/biopsycases/incomplete-post-complications-list"><span class="fa fa-list-ol"></span> Post Biopsy List</a></li>
@endif
@if( strpos(url()->current(), 'biopsycases/queue') === FALSE )
<li class="hvr-bounce-to-top"><a href="/biopsycases/queue"><span class="fa fa-list-ol"></span> Queue</a></li>
@endif
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>