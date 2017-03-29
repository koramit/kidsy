@extends('app.form')

@section('title', 'Clinical Data')

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

    @include('biopsycases.partials.labs')

    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Clinical Data</label></div>
        <div class="panel-body">
            @include('biopsycases.partials.weight_height_BP')
            <div class="col-xs-12"><hr/></div>
            
            <?php $preProcedureCheck = [
                'pre_HD_performed' => 'Pre Biopsy HD performed',
                'pre_PD_performed' => 'Pre Biopsy PD performed',
                'DDAVP_given' => 'DDAVP given',
                ] 
            ?>

            @foreach($preProcedureCheck as $name => $label)
            <!-- field {{ $name }} datdatype byte -->
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-lable" for="{{ $name }}">{{ $label }} :</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="0" {{ isInputChecked($case->$name,0) }} >NO</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="1" {{ isInputChecked($case->$name,1) }} >YES</label>
                </div>
            </div>
            @endforeach

            <div class="col-xs-12"><hr/></div>
            <?php $runDx = [
                'clinical_dx_1' => 'Clinical Diagnosis #1',
                'clinical_dx_2' => 'Clinical Diagnosis #2',
                'clinical_dx_3' => 'Clinical Diagnosis #3',
                ]
            ?>
            @foreach($runDx as $name => $label)
            <!-- field {{  $name  }} datatype smallInteger -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-lable" for="{{ $name }}">{{ $label }} : <span class="fa fa-sort-alpha-asc"></span></label>
                    @include('biopsycases.partials.select-diagnosis')
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('biopsycases.partials.note')

@endsection