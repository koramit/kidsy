@if ( Auth::user()->canUseResource('admin-panel') && url()->current() != url('/add-resident') )
<li class="hvr-bounce-to-top"><a href="/add-resident"><span class="fa fa-user-plus"></span> Add Resident</a></li>
@endif
@if ( Auth::user()->canUseResource('admin-panel') && url()->current() != url('/dashboard') )
<li class="hvr-bounce-to-top"><a href="/dashboard"><span class="fa fa-users"></span> Users List</a></li>
@endif