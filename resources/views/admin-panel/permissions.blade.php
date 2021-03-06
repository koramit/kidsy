@extends('app.index')

@section('title', 'Grant Permissions')

@section('second-brand', 'Grant Permissions')

@section('navbar-left')
<li class="hvr-bounce-to-bottom"><a role="button" onclick="$('#save_form').click();"><span class="fa fa-save"></span> Save</a></li>
@endsection

@section('navbar-right')
@include('biopsycases.partials.post-biopsy-navbar-right')
@include('admin-panel.tools-navbar-right')
@include('app.navbar-right')
{{-- 
<li class="hvr-bounce-to-top"><a href="/dashboard"><span class="fa fa-users"></span> Users List</a></li>
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>
 --}}
@endsection

@section('content')

<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Grant permissions to <strong><u>{{ $user->getData('name') }}</u></strong></div>
    <div class="panel-body">
        <form method="POST" action="/users">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_id" value="{{ $user->id }}">
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('set-biopsy') ? 'checked':'' }} name="set-biopsy" /> Set Biopsy</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('pre-biopsy-data') ? 'checked':'' }} name="pre-biopsy-data" /> Pre Biopsy Data</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('clinical-data') ? 'checked':'' }} name="clinical-data" /> Clinical Data</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('procedure-note') ? 'checked':'' }} name="procedure-note" /> Procedure Note</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('print-procedure') ? 'checked':'' }} name="print-procedure" /> Print Procedure Note</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('post-complications') ? 'checked':'' }} name="post-complications" /> Post Biopsy Complication</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('view-biopsy-case-index') ? 'checked':'' }} name="view-biopsy-case-index" /> View Biopsy Case Index</label>  
                </div>
            </div>
{{-- 
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('edit-closed-biopsy-case') ? 'checked':'' }} name="post-complications" /> Edit Closed Biopsy Case</label>  
                </div>
            </div>
            <div class="col-sm-4 col-xs-6">
                <div class="form-group">
                    <label><input type="checkbox" {{ $user->canUseResource('query-folder-number') ? 'checked':'' }} name="post-complications" /> Query Folder Number</label>  
                </div>
            </div>
             --}}
            <input id="save_form" style="display:none;" type="submit" value="Save">
        </form>
    </div>
</div>
@endsection