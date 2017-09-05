@extends('app.form-plain')

@section('title', 'Query folder number')

@section('second-brand', 'Query folder number')

@section('navbar-right')
@include('biopsycases.partials.post-biopsy-navbar-right')
@include('admin-panel.tools-navbar-right')
@include('app.navbar-right')
@endsection

@section('content')

<form method="POST" action="/casefolder/{{ $data['hn'] }}">
    <input type="hidden" name="_method" value="PATCH">
    {{-- <input type="hidden" name="_medthod" value="PATCH"> --}}
    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $data['patient'] }}" readonly />
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="remark" value="{{ $data['remark'] }}" placeholder="หมายเหตุ" />
        </div>
        <div class="form-group">
            <button class="btn btn-theme" type="submit">Add</button>
        </div>
        {{-- 
        <div class="col-xs-5">
            <div class="form-group">
                <label class="col-xs-4 control-label" for="hn_list">HN : </label>
                <div class="col-xs-8"><textarea class="form-control" name="hn_list" required rows="1"></textarea></div>
            </div>
        </div>
        <div class="col-xs-5">
            <div class="form-group">
                <label class="col-xs-4 control-label" for="datetime_clinic">Date clinic : </label>
                <div class="col-xs-8 input-group date datetimepicker-datetime">
                    <input type='text' class="form-control handle-datetime" name="datetime_clinic" id="datetime_clinic" value="" required />
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div> 
            </div>
        </div>
        <div class="col-xs-2">
            <button class="btn btn-theme" type="submit">Add</button>
        </div>
         --}}
    </div>
</form>

@endsection