@if ( Auth::user()->canUseResource('view-biopsy-case-index') && url()->current() != url('biopsycases') )
<li class="hvr-bounce-to-top"><a href="/biopsycases"><span class="fa fa-list"></span> Biopsy Case Index</a></li>
@endif

@if ( Auth::user()->canUseResource('query-folder-number') && url()->current() != url('query-folder-number') )
<li class="hvr-bounce-to-top"><a href="/query-folder-number"><span class="fa fa-search"></span> Query Folder Number</a></li>
@endif