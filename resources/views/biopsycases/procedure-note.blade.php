@extends('app.form')

@section('title', 'Procedure Note')

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
    
    <style type="text/css">
        .need-for-print {
            color: #ff7070;
        }
    </style>

    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Procedure Note</label></div>
        <div class="panel-body">

            <!-- field date_bx datatype date -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_bx">Date Biopsy (d-m-Y) : [<span class="fa fa-print {{ $case->date_bx === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <div class="input-group date datetimepicker-date">
                        <input type='text' class="form-control handle-datetime" name="date_bx" id="date_bx" value="{{ displayDate($case->date_bx) }}">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                    </div> 
                </div>
            </div>

            <div class="col-xs-12"><hr/></div>

            <!-- field is_native datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="is_native">Kidney type : [<span class="fa fa-print {{ $case->is_native === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <label class="radio-inline"><input type="radio" name="is_native" value="1" {{ isInputChecked($case->is_native,1) }} > Native</label>
                    <label class="radio-inline"><input type="radio" name="is_native" value="0" {{ isInputChecked($case->is_native,0) }} > Graft</label>
                </div>
            </div>

            <!-- field kidney_side datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="kidney_side">Kidney side : [<span class="fa fa-print {{ $case->kidney_side === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <label class="radio-inline"><input type="radio" name="kidney_side" value="1" {{ isInputChecked($case->kidney_side,1) }} > Left</label>
                    <label class="radio-inline"><input type="radio" name="kidney_side" value="2" {{ isInputChecked($case->kidney_side,2) }} > Right</label>
                </div>
            </div>

            <!-- field ultrasound_echogenicity datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="ultrasound_echogenicity">Ultrasound Echogenicity :</label>
                    <select class="form-control" name="ultrasound_echogenicity">
                        <option selected disabled hidden value=""></option>
                        <option value="1" {{ isInputChecked($case->ultrasound_echogenicity,1,'s') }}>Normal</option>
                        <option value="2" {{ isInputChecked($case->ultrasound_echogenicity,2,'s') }}>Increase</option>
                        <option value="0" {{ isInputChecked($case->ultrasound_echogenicity,0,'s') }}>Other</option>
                    </select>
                </div>
            </div>

            <!-- field ultrasound_echogenicity_other datatype string -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="ultrasound_echogenicity_other">Ultrasound Echogenicity Other :</label>
                    <input class="form-control" type="text" name="ultrasound_echogenicity_other" placeholder="Please describe." value="{{ $case->ultrasound_echogenicity_other }}" />
                </div>
            </div>

            <!-- field left_kidney_length_cm datatype decimal2.2 -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="left_kidney_length_cm">Left Kidney Length (cm) :</label>
                    <input class="form-control" type="text" name="left_kidney_length_cm" value="{{ $case->left_kidney_length_cm }}" />
                </div>
            </div>

            <!-- field right_kidney_length_cm datatype decimal2.2 -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="right_kidney_length_cm">Right Kidney Length (cm) :</label>
                    <input class="form-control" type="text" name="right_kidney_length_cm" value="{{ $case->right_kidney_length_cm }}" />
                </div>
            </div>

            <!-- field xylocaine_ml datatype smallInt -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                <label class="control-label" for="xylocaine_ml">Xylocaine (ml) : [<span class="fa fa-print {{ $case->xylocaine_ml === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <input class="form-control" type="text" name="xylocaine_ml" value="{{ $case->xylocaine_ml }}" />
                </div>
            </div>

            <!-- field needle_type datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="needle_type">Needle type : [<span class="fa fa-print {{ $case->needle_type === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <select class="form-control" name="needle_type">
                        <option selected disabled hidden value=""></option>
                        <option value="1" {{ isInputChecked($case->needle_type,1,'s') }} >Gun</option>
                        <option value="2" {{ isInputChecked($case->needle_type,2,'s') }} >Cook</option>
                        <option value="0" {{ isInputChecked($case->needle_type,0,'s') }} >Other</option>
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
                    @if( strpos($label, '#') === FALSE )
                    <label class="control-label" for="{{ $name }}">{{ $label }} : [<span class="fa fa-print {{ $case->$name === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    @else
                    <label class="control-label" for="{{ $name }}">{{ $label }} :</label>
                    @endif
                    <input class="form-control" type="text" name="{{ $name }}" value="{{ $case->$name }}" />
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <?php 
        $finishList = [
            'post_SBP_mmHg' => 'Post SBP (mmHg)',
            'post_DBP_mmHg' => 'Post DBP (mmHg)',
            'approximated_operation_lasts_minutes' => 'Approximated Operation lasts (minutes)',
        ];
    ?>
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Finishing</label></div>
        <div class="panel-body">

            @foreach($finishList as $name => $label)
            <!-- field {{ $name }} datatype dicimal -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }} : [<span class="fa fa-print {{ $case->$name === NULL ? 'need-for-print' : '' }}"></span>]</label>
                    <input class="form-control" type="text" name="{{ $name }}" value="{{ $case->$name }}" />
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <?php
        $team = [
            'operation_attending_id' => 'Attending',
            'operator_id' => 'Operator',
            'assistant_id' => 'Assistant',
        ]
    ?>
    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Operators</label></div>
        <div class="panel-body">
            
            @foreach($team as $name => $label)
            <!-- field {{ $name }} datatype smallInteger -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="{{ $name }}">{{ $label }} : <span class="fa fa-sort-alpha-asc"></span>
                        @if( $name == 'operator_id' || $name == 'assistant_id' )
                             Staff <span class="fa fa-angle-double-right"></span> Fellow
                        @endif
                        @if( $name == 'operator_id' )
                             [<span class="fa fa-print {{ $case->operator_id === NULL ? 'need-for-print' : '' }}"></span>]
                        @endif
                    </label>
                    <select class="form-control" name="{{ $name }}">
                        <option selected disabled hidden value=""></option>
                        @if( $name == 'operation_attending_id' || $name == 'operator_id' || $name == 'assistant_id' )
                            <optgroup label="Staff">
                            @include('biopsycases.partials.staff-options')
                            </optgroup>
                        @endif
                        @if( $name == 'operator_id' || $name == 'assistant_id' )
                            <optgroup label="Fellow">
                            @include('biopsycases.partials.fellow-options')
                            </optgroup>
                        @endif
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
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="0" {{ isInputChecked($case->$name,0) }} > NO</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="1" {{ isInputChecked($case->$name,1) }} > YES</label>
                </div>

                @if($name === 'hematoma')
                <!-- field hematoma_location datatype string -->
                <div class="form-group">
                    <label class="control-label" for="hematoma_location">Hematoma location :</label>
                    <input class="form-control" type="text" name="hematoma_location" value="{{ $case->hematoma_location }}" />
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    @include('biopsycases.partials.note')

@endsection