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

    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Procedure Note</label></div>
        <div class="panel-body">

            <!-- field date_bx datatype date -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_bx">Date Biopsy :</label>
                    <div class="input-group date datetimepicker-date">
                        <input type='text' class="form-control handle-datetime" name="date_bx" id="date_bx" value="">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            <div class="col-xs-12"><hr/></div>

            <!-- field is_native datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="is_native">Kidney type :</label>
                    <label class="radio-inline"><input type="radio" name="is_native" value="1"> Native</label>
                    <label class="radio-inline"><input type="radio" name="is_native" value="0"> Graft</label>
                </div>
            </div>

            <!-- field kidney_side datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="kidney_side">Kidney side :</label>
                    <label class="radio-inline"><input type="radio" name="kidney_side" value="1"> Left</label>
                    <label class="radio-inline"><input type="radio" name="kidney_side" value="2"> Right</label>
                </div>
            </div>

            <!-- field ultrasound_echogenicity datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="ultrasound_echogenicity">Ultrasound Echogenicity :</label>
                    <select class="form-control" name="ultrasound_echogenicity">
                        <option selected disabled hidden value=""></option>
                        <option value="1">Normal</option>
                        <option value="2">Increase</option>
                        <option value="0">Other</option>
                    </select>
                </div>
            </div>

            <!-- field ultrasound_echogenicity_other datatype string -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="ultrasound_echogenicity_other">Ultrasound Echogenicity Other :</label>
                    <input class="form-control" type="text" name="ultrasound_echogenicity_other" placeholder="Please describe.">
                </div>
            </div>

            <!-- field left_kidney_length_cm datatype decimal2.2 -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="left_kidney_length_cm">Left Kidney Length (cm) :</label>
                    <input class="form-control" type="text" name="left_kidney_length_cm">
                </div>
            </div>

            <!-- field right_kidney_length_cm datatype decimal2.2 -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="right_kidney_length_cm">Right Kidney Length (cm) :</label>
                    <input class="form-control" type="text" name="right_kidney_length_cm">
                </div>
            </div>

            <!-- field xylocaine_ml datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="xylocaine_ml">Xylocaine (ml) :</label>
                    <input class="form-control" type="text" name="xylocaine_ml">
                </div>
            </div>

            <!-- field needle_type datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="needle_type">Needle type :</label>
                    <select class="form-control" name="needle_type">
                        <option selected disabled hidden value=""></option>
                        <option value="1">Gun</option>
                        <option value="2">Cook</option>
                        <option value="0">Other</option>
                    </select>
                </div>
            </div>

            <?php 
                $procedureNumberList = [
                    'needle_size' => 'Needle size',
                    'needle_reuse_times' => 'Needle reuse time(s)',
                    'punctured_times' => 'Punctured time(s)',
                    'no_cores_obtained' => 'Renal core(s) obtained',
                    'core_1_length_cm' => 'Core #1 length (cm)',
                    'core_2_length_cm' => 'Core #2 length (cm)',
                    'core_3_length_cm' => 'Core #3 length (cm)',
                ];
            ?>

            @foreach($procedureNumberList as $name => $label)
            <!-- field {{ $name }} datatype decimal -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }} :</label>
                    <input class="form-control" type="text" name="{{ $name }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <?php 
        $finishList = [
            'post_SBP_mmHg' => 'Post SBP (mmHg)',
            'post_DBP_mmHg' => 'Post DBP (mmHg)',
            'approximated_operation_lasts_minutes' => 'Approximated Operation lasts (minutes) :',
        ];
    ?>
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Finishing</label></div>
        <div class="panel-body">

            @foreach($finishList as $name => $label)
            <!-- field {{ $name }} datatype dicimal -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }}</label>
                    <input class="form-control" type="text" name="{{ $name }}">
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <?php
        $team = [
            'operation_attending' => 'Attending',
            'operator' => 'Operator',
            'assistant' => 'Assistant',
        ]
    ?>
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Operators</label></div>
        <div class="panel-body">
            
            @foreach($team as $name => $label)
            <!-- field {{ $name }} datatype smallInteger -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }} :</label>
                    <select class="form-control" name="{{ $name }}">
                        <option selected disabled hidden value=""></option>
                        <option>a</option>
                        <option>b</option>
                        <option>c</option>
                    </select>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <?php 
        $immedateComplication = [
            'hematoma' => 'Hematoma',
            'gross_hematuria' => 'Gross Hematuria',
            'abdominal_pain' => 'Abdominal pain',
            'hypotension' => 'Hypotension'
        ];
    ?>
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Immedate Complications</label></div>
        <div class="panel-body">
            
            @foreach($immedateComplication as $name => $label)
            <!-- field {{ $name }} datatype byte -->
            
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }} :</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}"> NO</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}"> YES</label>
                </div>

                @if($name === 'hematoma')
                <!-- field hematoma_lacation datatype string -->
                <div class="form-group">
                    <label class="control-label" for="hematoma_lacation">Hematoma location :</label>
                    <input class="form-control" type="text" name="hematoma_lacation">
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    @include('design.partials.note')

@endsection