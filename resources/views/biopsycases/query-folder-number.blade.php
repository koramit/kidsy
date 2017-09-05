@extends('app.form-plain')

@section('title', 'Query folder number')

@section('second-brand', 'Query folder number')

@section('navbar-right')
@include('biopsycases.partials.post-biopsy-navbar-right')
@include('admin-panel.tools-navbar-right')
@include('app.navbar-right')
@endsection

@section('content')
<div class="col-xs-12 col-lg-10 col-lg-offset-1 form-horizontal">
    <div class="col-xs-12"><hr/></div>
    <div class="col-xs-5">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="hn_list">Quick Search : </label>
            <div class="col-xs-8"><input type="text" class="form-control" placeholder="HN" id="hn-search-folder-number"></div>
        </div>
    </div>
    <div class="col-xs-5">
        <div class="form-group">
            <label class="col-xs-4 control-label" for="datetime_clinic">Folder No. : </label>
            <div class="col-xs-8 input-group">
                <span class="input-group-addon"><span class="fa fa-folder-o"></span></span>
                <input type='text' class="form-control" id="folder-number-result" />
            </div> 
        </div>
    </div>
    <div class="col-xs-2">
        <a class="btn btn-theme" type="submit" href="#" id="edit-folder">Edit</a>
    </div>
</div>
<script type="text/javascript">
    $('#hn-search-folder-number').on('keyup', function () {
        if ( $(this).val().length == 8 ) {
            $.get("/get-folder-number/" + $(this).val(), function( data ) {
                $("#folder-number-result").val(data.resultText);
                if ( data.resultCode ) {
                    $("#edit-folder").attr("href", "/casefolder/" + $('#hn-search-folder-number').val() + "/edit");
                }
            });
        } else {
            $("#folder-number-result").val('');
            $("#edit-folder").attr("href", "#");
        }
    });
</script>
<div class="col-xs-12 col-lg-10 col-lg-offset-1 form-horizontal">
<div class="col-xs-12"><hr/></div>
</div>
<div class="col-xs-12 col-lg-10 col-lg-offset-1">
    <ol>
        @foreach($schedules as $schedule)
        <a href="/nephro-clinic-schedule/{{ $schedule->id }}" target="_blank" >
            <li>{{ $schedule->datetime_clinic->format('d-M-Y H:i') }} <span class="fa fa-search"></span></li>
        </a>
        @endforeach
    </ol>
</div>
<form method="POST" action="/query-folder-number">
    <div class="col-xs-12 col-lg-10 col-lg-offset-1 form-horizontal">
        <div class="col-xs-12"><hr/></div>
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
    </div>
</form>

@endsection