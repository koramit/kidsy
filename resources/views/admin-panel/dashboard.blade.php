@extends('app.index')

@section('title', 'Dashboard')

@section('second-brand', 'Admin Panel')

@section('navbar-right')
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>
@endsection

@section('content')
<div class="well table-responsive">
    <div class="panel">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="background-color-theme">
                    <th class="text-center">User Name</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Tel. No.</th>
                    <th class="text-center">Task</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->permissions !== NULL && $user->id !== Auth::user()->id)
                <tr>
                    <td class="table-text-indent">{{ $user->getData('name') }}</td>
                    <td class="text-center">{{ $user->getData('position_title') }}</td>
                    <td class="text-center">{{ $user->getData('tel_no') }}</td>
                    <td class="text-right">
                        <a href="/users/{{ $user->id }}/edit" class="link-task"><span class="fa fa-key"></span> Grant Permissions</a>
                    </td>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td class="text-center">---</td><td class="text-center">---</td>
                    <td class="text-center">---</td><td class="text-center">---</td>
                </tr>
                @foreach($users as $user)
                @if($user->permissions === NULL && $user->id !== Auth::user()->id)
                <tr>
                    <td class="table-text-indent">{{ $user->getData('name') }}</td>
                    <td class="text-center">{{ $user->getData('position_title') }}</td>
                    <td class="text-center">{{ $user->getData('tel_no') }}</td>
                    <td class="text-right">
                        <a href="/users/{{ $user->id }}/edit" class="link-task"><span class="fa fa-key"></span> Grant Permissions</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection