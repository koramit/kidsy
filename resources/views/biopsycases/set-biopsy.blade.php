@extends('app.form')

@section('title', 'Set Biopsy')

@section('second-brand')
@include('biopsycases.partials.case-form-second-brand')
@endsection

@section('navbar-left')
@include('biopsycases.partials.case-form-navbar-left')
@endsection

@section('navbar-right')
@include('biopsycases.partials.case-form-navbar-right')
@endsection

@section('content')

    @include('biopsycases.partials.patient')
    
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Appointment Data</label></div>
        <div class="panel-body">
            <!-- field set_biopsy_at datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="set_biopsy_at">Set biopsy at :</label>
                    <label class="radio-inline">
                        <input type="radio" name="set_biopsy_at" value="1" {{ isInputChecked($case->set_biopsy_at,1) }} />OPD
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="set_biopsy_at" value="2" {{ isInputChecked($case->set_biopsy_at,2) }} />IPD
                    </label>
                </div>
            </div>

            <!-- field urgency_case datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="urgency_case">Urgency case :</label>
                    <label class="radio-inline">
                        <input type="radio" name="urgency_case" value="0" {{ isInputChecked($case->urgency_case,0) }}> NO
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="urgency_case" value="1" {{ isInputChecked($case->urgency_case,1) }}> YES
                    </label>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"><hr></div>

            <!-- field datetime_make_appointment datatype date -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="datetime_make_appointment">Date-Time Make Appointment (d-m-Y H:M) :</label>
                    <div class="input-group date datetimepicker-datetime">
                        <input type='text' class="form-control handle-datetime" name="datetime_make_appointment" value="{{ displayDate($case->datetime_make_appointment, 'd-m-Y H:i') }}" />
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"></div>

            <!-- field date_biopsy_expected datatype date -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="date_biopsy_expected">Date Biopsy (Expected d-m-Y) [<a title="เมื่อบันทึกแล้วจะแก้ไขไม่ได้ ลงข้อมูลเมื่อแน่ใจแล้วเท่านั้น" class="color-alert" role="button"><span class="fa fa-info-circle"></span></a>]: <a role="button" title="Click เพื่อลงเป็นวันจันทร์ที่จะถึงนี้" onclick="$('input[name=date_biopsy_expected]').val($('#next_monday').val()); $('select[name=case_open_status]').val(4)"><span class="fa fa-smile-o"></span></a></label>
                    <div class="input-group date datetimepicker-date">
                        <input type='text' class="form-control handle-datetime" name="date_biopsy_expected" id="date_biopsy_expected" value="{{ displayDate($case->date_biopsy_expected) }}" {{ $case->date_biopsy_expected !== NULL ? 'disabled' : '' }}>
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>
            <input type="hidden" id="next_monday" value="{{ $case->next_monday }}" />

            <!-- field case_open_status datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="case_open_status">Case Status [<a title="เมื่อบันทึกแล้วจะแก้ไขไม่ได้ ลงข้อมูลเมื่อแน่ใจแล้วเท่านั้น" class="color-alert" role="button"><span class="fa fa-info-circle"></span></a>]:</label>
                    <select class="form-control" name="case_open_status" {{ $case->case_open_status != NULL ? 'disabled' : '' }}>
                        <option selected disabled hidden value=""></option>
                        <option value="1" {{ isInputChecked($case->case_open_status,1,'s') }}>รอ ยังไม่ต้องนัด</option>
                        <option value="2" {{ isInputChecked($case->case_open_status,2,'s') }}>รอ ทำตามวันที่นัดไว้</option>
                        <option value="3" {{ isInputChecked($case->case_open_status,3,'s') }}>รอ ยังไม่ได้คิว</option>                        
                        <option value="4" {{ isInputChecked($case->case_open_status,4,'s') }}>รอ ทำจันทร์/พุธ ที่จะถึงนี้</option>
                    </select>
                </div>
            </div>

            <!-- field date_admit_expected datatype date -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="date_admit_expected">Date Admit (Expected d-m-Y) : </label>
                    <div class="input-group date datetimepicker-date">
                        <input type='text' class="form-control handle-datetime" name="date_admit_expected" id="date_admit_expected" value="{{ displayDate($case->date_admit_expected) }}" />
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            @include('biopsycases.partials.ward')

            <!-- field fellow_id datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="fellow_id">Fellow : <span class="fa fa-sort-alpha-asc"></span></label>
                    <select class="form-control" name="fellow_id">
                        <option selected disabled hidden value=""></option>
                        <?php $name = 'fellow_id' ?>
                        @include('biopsycases.partials.fellow-options')
                    </select>
                </div>
            </div>

            <!-- field case_attending_id datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="case_attending_id">Attending : <span class="fa fa-sort-alpha-asc"></span></label>
                    <select class="form-control" name="case_attending_id">
                        <option selected disabled hidden value=""></option>
                        <?php $name = 'case_attending_id' ?>
                        @include('biopsycases.partials.staff-options')
                    </select>
                </div>
            </div>

            <!-- field insurance_id datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="insurance_id">Insurance :</label>
                    <select class="form-control" name="insurance_id">
                        <option selected disabled hidden value=""></option>
                        <option {{ isInputChecked($case->insurance_id,1,'s') }} value="1">บัตรทอง ศิริราช</option>
                        <option {{ isInputChecked($case->insurance_id,2,'s') }} value="2">บัตรทอง โรงพยาบาลอื่น</option>
                        <option {{ isInputChecked($case->insurance_id,3,'s') }} value="3">ประกันสังคม ศิริราช</option>
                        <option {{ isInputChecked($case->insurance_id,4,'s') }} value="4">ประกันสังคม โรงพยาบาลอื่น</option>
                        <option {{ isInputChecked($case->insurance_id,5,'s') }} value="5">เบิกจ่ายตรง (ระบุชื่อต้นสังกัดที่ Insurance title ด้วย)</option>
                        <option {{ isInputChecked($case->insurance_id,6,'s') }} value="6">จ่ายเอง</option>
                        <option {{ isInputChecked($case->insurance_id,99,'') }} value="99">อื่นๆ (ระบุชื่อสิทธิที่ Insurance title ด้วย)</option>
                    </select>
                </div>
            </div>

            <!-- field insurance_title datatype string -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="insurance_title">Insurance title :</label>
                    <input class="form-control" type="text" name="insurance_title" value="{{ $case->insurance_title }}">
                </div>
            </div>

            
            <div class="collapse {{ ( $case->case_close_status !== 1 ) ? 'in':''}}">
            <div class="col-xs-12"><hr/></div>

            <!-- field case_close_status datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="case_close_status">Cancel case : [<a title="เมื่อบันทึกแล้วจะแก้ไขไม่ได้ ลงข้อมูลเมื่อแน่ใจแล้วเท่านั้น" class="color-alert" role="button"><span class="fa fa-info-circle"></span></a>]</label>
                    <select class="form-control" name="case_close_status" {{ $case->case_close_status != NULL ? 'disabled' : '' }}>
                        <option selected disabled hidden value=""></option>
                        
                        {{-- <option value="1" {{ isInputChecked($case->case_close_status,1,'s') }} >Biopsy แล้ว</option> --}}
                        
                        <option value="2" {{ isInputChecked($case->case_close_status,2,'s') }} >ยกเลิก ไปรักษาที่อื่น</option>
                        <option value="3" {{ isInputChecked($case->case_close_status,3,'s') }} >ยกเลิก ไม่ต้องทำแล้ว</option>
                        <option value="4" {{ isInputChecked($case->case_close_status,4,'s') }} >ยกเลิก นัดทำครั้งนี้</option>
                        <option value="5" {{ isInputChecked($case->case_close_status,5,'s') }} >ยกเลิก ในวันทำเนื่องจาก condition ของผู้ป่วย (ระบุเหตุผลที่ Cancel detail ด้วย)</option>
                        <option value="6" {{ isInputChecked($case->case_close_status,6,'s') }} >ยกเลิก ขอ Set ใหม่เนื่องจากต้องเลื่อนวันทำ</option>
                        <option value="7" {{ isInputChecked($case->case_close_status,7,'s') }} >ยกเลิก ขอ Set ใหม่เนื่องจากลงวันที่ผิด</option>
                    </select>
                </div>
            </div>

            <!-- field case_close_status_detail datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="case_close_status_detail">Cancel detail :</label>
                    <input class="form-control" type="text" name="case_close_status_detail" value="{{ $case->case_close_status_detail }}">
                </div>
            </div>
            </div>
        </div>
    </div>
    
    @include('biopsycases.partials.labs')
    
    @include('biopsycases.partials.note')

@endsection