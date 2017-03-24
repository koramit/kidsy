@extends('design.form')

@section('second-brand')
@include('design.partials.case-form-second-brand')
@endsection

@section('navbar-left')
@include('design.partials.case-form-navbar-left')
@endsection

@section('navbar-right')
@include('design.partials.case-form-navbar-right')
@endsection

@section('content')

    @include('design.partials.patient')
    
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Appointment Data</label></div>
        <div class="panel-body">
            <!-- field set_biopsy_at datatype byte -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="set_biopsy_at">Set biopsy at :</label>
                    {{-- <div> --}}
                        <label class="radio-inline">
                            <input type="radio" name="set_biopsy_at" value="1">OPD
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="set_biopsy_at" value="2">IPD
                        </label>
                    {{-- </div> --}}
                </div>
            </div>

            <!-- field urgency_case datatype byte -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="urgency_case">Urgency case :</label>
                    {{-- <div> --}}
                        <label class="radio-inline">
                            <input type="radio" name="urgency_case" value="0">NO
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="urgency_case" value="1">YES
                        </label>
                    {{-- </div> --}}
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><hr></div>

            <!-- field date_time_make_appointment datatype date -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_time_make_appointment">Date-Time Make Appointment : <a role="button"><span class="fa fa-clock-o"></span></a></label>
                    <div class="input-group date datetimepicker-datetime">
                        <input type='text' class="form-control handle-datetime" name="date_time_make_appointment" value="">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            <!-- field date_biopsy_expected datatype date -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_biopsy_expected">Date Biopsy (Expected) : <a role="button"><span class="fa fa-smile-o"></span></a></label>
                    <div class="input-group date datetimepicker-date">
                        <input type='text' class="form-control handle-datetime" name="date_biopsy_expected" id="date_biopsy_expected" value="">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            <!-- field case_status datatype smallInt -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="case_status">Case Status :</label>
                    <select class="form-control" name="case_status">
                        <option selected disabled hidden value=""></option>
                        <option value="1">ตัดออก (รักษาที่อื่น/ไม่ต้องทำ Biopsy แล้ว)</option>
                        <option value="2">รอ ยังไม่ต้องนัด Biopsy</option>
                        <option value="3">รอ Biopsy ตามวันที่นัดไว้</option>
                        <option value="8">รอ ยังไม่ได้คิว Biopsy</option>                        
                        <option value="4">รอทำ Biopsy จันทร์/พุธ นี้</option>
                        <option value="5">ยกเลิกนัดทำ Biopsy</option>
                        <option value="6">ได้ทำ Biopsy แล้ว</option>
                        <option value="7">รอ clean</option>
                    </select>
                </div>
            </div>

            <!-- field ward_id datatype smallInt -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="ward_id">Ward :</label>
                    <select class="form-control" name="ward_id">
                        <option selected disabled hidden value=""></option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
            </div>

            <!-- field fellow_id datatype smallInt -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="fellow_id">Fellow :</label>
                    <select class="form-control" name="fellow_id">
                        <option selected disabled hidden value=""></option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
            </div>

            <!-- field attending_id datatype smallInt -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="attending_id">Attending :</label>
                    <select class="form-control" name="attending_id">
                        <option selected disabled hidden value=""></option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
            </div>

            <!-- field insurance_id datatype smallInt -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="insurance_id">Insurance :</label>
                    <select class="form-control" name="insurance_id">
                        <option selected disabled hidden value=""></option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
            </div>

            <!-- field insurance_titl datatype string -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="insurance_title">Insurance title :</label>
                    <input class="form-control" type="text" name="insurance_title">
                </div>
            </div>
        </div>
    </div>
    
    @include('design.partials.labs')
    
    @include('design.partials.note')


@endsection