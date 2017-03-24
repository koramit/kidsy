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

    @include('design.partials.labs')

    <div class="panel panel-default panel-theme">
        <div class="panel-heading panel-theme"><label>Clinical Data</label></div>
        <div class="panel-body">
            @include('design.partials.weight_height_BP')
            <div class="col-xs-12"><hr/></div>
            
            <?php $preProcedureCheck = [
                'pre_HD_performed' => 'Pre Biopsy HD performed',
                'pre_PD_performed' => 'Pre Biopsy PD performed',
                'DDAVP_given' => 'DDAVP given',
                ] 
            ?>

            @foreach($preProcedureCheck as $name => $label)
            <!-- {{ $name }} datdatype byte -->
            <div class="col-xs-12">
                <div class="form-group">
                    <label class="control-lable" for="{{ $name }}">{{ $label }} :</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="0">NO</label>
                    <label class="radio-inline"><input type="radio" name="{{ $name }}" value="1">YES</label>
                </div>
            </div>
            @endforeach

            <div class="col-xs-12"><hr/></div>
            <?php $runDx = [1,2,3] ?>
            @foreach($runDx as $dxNo)
            <!-- clinical_dx_{{$dxNo}} datatype smallInteger -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-lable" for="clinical_dx_{{$dxNo}}">Clinical Diagnosis #{{$dxNo}} :</label>
                    <select class="form-control" name="clinical_dx_{{$dxNo}}">
                        <option selected disabled hidden value=""></option>
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @include('design.partials.note')

@endsection