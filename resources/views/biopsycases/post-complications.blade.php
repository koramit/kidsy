@extends('app.form')

@section('title', 'Post Biopsy Complications')

@section('second-brand')
@include('biopsycases.partials.case-form-second-brand')
{{ ' Date Biopsy : ' . displayDate($case->date_bx) }}
@endsection

@section('navbar-left')
{{-- @include('biopsycases.partials.case-form-navbar-left') --}}
<li class="hvr-bounce-to-bottom"><a role="button" onclick="$('select').removeAttr('disabled'); $('input').removeAttr('disabled'); $('#save_form').click();"><span class="fa fa-save"></span> Save</a></li>
@endsection

@section('navbar-right')
{{-- @include('biopsycases.partials.case-form-navbar-right') --}}
<li class="hvr-bounce-to-top"><a href="/biopsycases/incomplete-post-complications-list"><span class="fa fa-list-ol"></span> Post Biopsy List</a></li>
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>
@endsection

@section('content')
<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Biopsy data</div>
    <div class="panel-body form-horizontal row">

        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6">Date Biopsy (d-m-Y) : </label>
                <div class="col-sm-6">
                    <input type='text' class="form-control" value="{{ displayDate($case->date_bx) }}" readonly />
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6">Kidney : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="{{ $case->is_native ? 'Native' : 'Graft' }}" readonly />
                </div>
            </div>
        </div>

        <div class="col-sm-12"><hr /></div>

        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="col-sm-6 control-label" for="hematoma">Immediate Hematoma :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="hematoma" value="0" {{ isInputChecked($case->hematoma,0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="hematoma" value="1" {{ isInputChecked($case->hematoma,1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <!-- field hematoma_size_cm datatype decimal -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="col-sm-6 control-label" for="hematoma_size_cm">Hematoma Detail :</label>
                <div class="col-sm-3">
                    <input class="form-control input-neighbour" type="text" name="hematoma_size_cm" value="{{ $case->hematoma_size_cm }}" placeholder="size in cm." title="Immediate hematoma size" />
                </div>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="hematoma_location" value="{{ $case->hematoma_location }}" placeholder="location" title="Immediate hematoma location" />
                </div>
            </div>
        </div>

        <div class="col-sm-12"><hr /></div>

        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="col-sm-6 control-label" for="Hct">Hct pre-biopsy [%] :</label>
                <div class="col-sm-6"><input class="form-control" type="text" name="Hct" value="{{ $case->Hct }}" /></div>
            </div>
        </div>

        <!-- field post_Hct datatype decimal4.2 -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="col-sm-6 control-label" for="post_Hct">Hct post-biopsy [%] :</label>
                <div class="col-sm-6"><input class="form-control" type="text" name="post_Hct" value="{{ $case->post_Hct }}" /></div>
            </div>
        </div>
            
    </div>
</div>

<?php
    $postComplications = [
        'post_hematoma' => 'Hematoma',
        'post_gross_hematuria' => 'Gross Hematuria',
        'post_hypotension' => 'Hypotension',
        'post_abdominal_pain' => 'Abdominal Pain',
        'post_fever' => 'Fever',
    ];
?>

<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Post Biopsy Complications</div>
    <div class="panel-body form-horizontal row">
        @foreach($postComplications as $name => $label)
            <!-- field {{ $name }} datatype tinyInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="col-sm-6 control-label" for="{{$name}}">{{ $label }} :</label>
                    <div class="col-sm-6">
                        <label class="radio-inline"><input type="radio" name="{{ $name }}" value="0" {{ isInputChecked($case->$name ,0) }} /> No</label>
                        <label class="radio-inline"><input type="radio" name="{{ $name }}" value="1" {{ isInputChecked($case->$name ,1) }} /> Yes</label>
                    </div>
                </div>
            </div>

            <?php $tmpDatetimeName = 'datetime_' . $name; ?>
            <!-- field datetime_{{ $name }} datetime -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="col-sm-12">
                    <div class="input-group date datetimepicker-datetime">
                        <input type='text' class="form-control handle-datetime" name="datetime_{{ $name }}" value="{{ displayDate($case->$tmpDatetimeName, 'd-m-Y H:i') }}" placeholder="Datetime {{ $label }}" />
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div>
                    </div>
                </div>
            </div>

            @if( $name == 'post_hematoma' )
                <div class="col-sm-6 col-xs-12"></div>

                <!-- field post_hematoma_size_cm datatype decimal4.2 -->
                <!-- field post_hematoma_location datatype string -->
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type='text' class="form-control input-neighbour" name="post_hematoma_size_cm" value="{{ $case->post_hematoma_size_cm }}" placeholder="Hematoma size in cm." />
                        </div>
                        <div class="col-sm-6">
                            <input type='text' class="form-control" name="post_hematoma_location" value="{{ $case->post_hematoma_location }}" placeholder="Hematoma location." />
                        </div>
                    </div>
                </div>
            @endif

            @if($name == 'post_fever')
                <div class="col-sm-6 col-xs-12"></div>
                <!-- field post_fever_cause datatype string -->
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type='text' class="form-control" name="post_fever_cause" value="{{ $case->post_fever_cause }}" placeholder="Fever cause." />
                        </div>
                    </div>
                </div>
            @endif

            @if($name != 'post_fever')
                <div class="col-xs-12"><hr/></div>
            @endif
        @endforeach
    </div>
</div>

<?php
    $transfusions = [
        'post_rpc_transfusion' => 'PRC',
        'post_whole_blood_transfusion' => 'Whole Blood',
        'post_cryo_transfusion' => 'Cryo',
        'post_platlete_transfusion' => 'Platlete'
    ];
?>

<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Treatments</div>
    <div class="panel-body form-horizontal row">
        <!-- field post_ultrasound datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_ultrasound">Ultrasound :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_ultrasound" value="0" {{ isInputChecked($case->post_ultrasound, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_ultrasound" value="1" {{ isInputChecked($case->post_ultrasound, 1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <!-- field datetime_post_ultrasound datatype datetime -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <div class="col-sm-12">
                <div class="input-group date datetimepicker-datetime">
                    <input type='text' class="form-control handle-datetime" name="datetime_post_ultrasound" value="{{ displayDate($case->datetime_post_ultrasound, 'd-m-Y H:i') }}"" placeholder="Datetime Ultrasound" />
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12"><hr/></div>

        @foreach($transfusions as $name => $label)

            <!-- field {{ $name }} datatype tinyInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label col-sm-6" for="{{ $name }}">{{ $label }} :</label>
                    <div class="col-sm-6">
                        <label class="radio-inline"><input type="radio" name="{{ $name }}" value="0" {{ isInputChecked($case->$name, 0) }} /> No</label>
                        <label class="radio-inline"><input type="radio" name="{{ $name }}" value="1" {{ isInputChecked($case->$name, 1) }} /> Yes</label>
                    </div>
                </div>
            </div>

            <?php $tmpName = $name . '_unit'; ?>
            <!-- field {{ $name }}_unit datatype datetime -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <input type='text' class="form-control" name="{{ $name }}_unit" value="{{ $case->$tmpName }}" />
                            <span class="input-group-addon">UNIT</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12"><hr/></div>

        @endforeach

        <!-- field post_antifibrinolytic datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_antifibrinolytic">Antifibrinolytic :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_antifibrinolytic" value="0" {{ isInputChecked($case->post_antifibrinolytic, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_antifibrinolytic" value="1" {{ isInputChecked($case->post_antifibrinolytic, 1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <!-- field post_antifibrinolytic_detail datatype string -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="post_antifibrinolytic_detail" value="{{ $case->post_antifibrinolytic_detail }}" placeholder="Antifibrinolytic name and dose." />
                </div>
            </div>      
        </div>

        <div class="col-xs-12"><hr/></div>

        <!-- field post_antibiotic datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_antibiotic">Antibiotic :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_antibiotic" value="0" {{ isInputChecked($case->post_antibiotic, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_antibiotic" value="1" {{ isInputChecked($case->post_antibiotic, 1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <!-- field post_antibiotic_detail datatype string -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <div class="col-sm-12">
                    <input class="form-control" type="text" name="post_antibiotic_detail" value="{{ $case->post_antibiotic_detail }}" placeholder="Antibiotic name and dose." />
                </div>
            </div>      
        </div>

        <div class="col-xs-12"><hr/></div>

        <!-- field post_angiogram datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_angiogram">Angiogram :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_angiogram" value="0" {{ isInputChecked($case->post_angiogram, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_angiogram" value="1" {{ isInputChecked($case->post_angiogram, 1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <div class="col-xs-12"><hr/></div>

        <!-- field post_embolization datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_embolization">Embolization :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_embolization" value="0" {{ isInputChecked($case->post_embolization, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_embolization" value="1" {{ isInputChecked($case->post_embolization, 1) }} /> Yes</label>
                </div>
            </div>
        </div>

        <div class="col-xs-12"><hr/></div>

        <!-- field post_nephrectomy datatype tinyInt -->
        <div class="col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-sm-6" for="post_nephrectomy">Nephrectomy :</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="post_nephrectomy" value="0" {{ isInputChecked($case->post_nephrectomy, 0) }} /> No</label>
                    <label class="radio-inline"><input type="radio" name="post_nephrectomy" value="1" {{ isInputChecked($case->post_nephrectomy, 1) }} /> Yes</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Complication Outcome</div>
    <div class="panel-body form-horizontal row">

        <!-- field outcome_resolve datatype boolean -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label class="col-sm-12"><input type="checkbox" name="outcome_resolve" {{ isInputChecked($case->outcome_resolve, 1) }} /> Resolved, no deterioration of renal function</label>
            </div>
        </div>

        <!-- field outcome_arf datatype boolean -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label class="col-sm-12"><input type="checkbox" name="outcome_arf" {{ isInputChecked($case->outcome_arf, 1) }} /> ARF, reversible renal function</label>
            </div>
        </div>

        <!-- field outcome_crf_no_dialysis datatype boolean -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label class="col-sm-12"><input type="checkbox" name="outcome_crf_no_dialysis" {{ isInputChecked($case->outcome_crf_no_dialysis, 1) }} /> Turn CRF without dialysis</label>
            </div>
        </div>

        <!-- field outcome_ESRD datatype boolean -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label class="col-sm-12"><input type="checkbox" name="outcome_ESRD" {{ isInputChecked($case->outcome_ESRD, 1) }} /> ESRD</label>
            </div>
        </div>

        <!-- field outcome_dead datatype boolean -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label class="col-sm-12"><input type="checkbox" name="outcome_dead" {{ isInputChecked($case->outcome_dead, 1) }} /> DEAD</label>
            </div>
        </div>
                   
    </div>
</div>


<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme">Remark</div>
    <div class="panel-body form-horizontal row">

        <!-- field post_complication_completeed datatype boolean -->
        <div class="col-xs-12">
            <div class="checkbox">
                <label class="col-xs-12">
                    <input type="checkbox" name="post_complication_completed" {{ isInputChecked($case->post_complication_completed, 1) }} /> Data Completed <span class="fa fa-info-circle" title="หาก check แล้ว หลังจาก save จะกลับมาแก้ไขข้อมูลไม่ได้"></span>
                </label>
            </div>
        </div>

        <!-- field post_complication_note datatype string-->
        <div class="col-xs-12">
            <input class="form-control" type="text" name="post_complication_note" value="{{ $case->post_complication_note }}" placeholder="Complication note" />
        </div>
    </div>
</div> 

@endsection