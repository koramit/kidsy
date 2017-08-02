@extends('app.index')

@section('title', 'Grant Permissions')

@section('second-brand', 'Grant Permissions')

@section('navbar-left')
@endsection

@section('navbar-right')
@include('biopsycases.partials.post-biopsy-navbar-right')
@include('admin-panel.tools-navbar-right')
@include('app.navbar-right')
{{-- 
<li class="hvr-bounce-to-top"><a href="/biopsycases"><span class="fa fa-list"></span> Biopsy case index</a></li>
<li class="hvr-bounce-to-top"><a href="/dashboard"><span class="fa fa-users"></span> Users List</a></li>
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>
 --}}
@endsection

@section('content')
<style type="text/css">
    .vertical-center {
        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
        min-height: 100vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
    }

    /* Override padding-top for bootstrap navbar */
    body {
        padding-top: 0px!important;
    }
</style>

<div class="vertical-center">
    <div class="col-sm-4 col-sm-offset-4 col-xs-12">
        <div class="panel panel-default panel-theme">
            <div class="panel-heading panel-theme">Create account for Resident</div>
            <div class="panel-body">
                <form method="POST" action="/auto-create-user">
                    <input type="hidden" name="_method" value="POST">
                    <div class="form-group">
                        <label for="org_id">SAP ID :</label>
                        <input class="form-control" type="text" name="org_id" autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Date expired : </label>
                        <div class="input-group date datetimepicker-date">
                            <input type='text' class="form-control handle-datetime" name="expiry_date" id="expiry_date" value="{{ \Carbon\Carbon::now()->addDays(30)->format('d-m-Y') }}" required />
                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        </div> 
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary btn-theme" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection