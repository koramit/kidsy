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
        <div class="panel-heading panel-theme"><label>Pre-Biopsy Data</label></div>
        <div class="panel-body">
            <!-- field AN datatype string -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="AN">AN :</label>
                    <input class="form-control" type="text" name="AN">
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

            @include('design.partials.weight_height_BP')


            <!-- Required for woman -->
            @if(TRUE)
            <div class="col-xs-12"><hr/></div>    
            
            <!-- field pregnancy datatype byte -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="pregnancy">Pregnancy : </label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="0">No</label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="1">Yes</label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="2">Uncertain</label>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12"><br></div>

            <?php $GPA = ['gravida', 'para', 'abortus']; ?>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <label class="control-label">Gravida / Para / Abortus :</label>
                <div class="form-group">
                    @foreach($GPA as $name)
                    <!-- field {{ $name }} datatype byte -->
                    <div class="col-md-4 col-sm-4 col-xs-4"> 
                        <input class="form-control" type="text" name="{{ $name }}" placeholder="{{ $name }}">
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- field date_last_period datatype string -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_last_period">Date Last Period :</label>
                    <input class="form-control" type="text" name="date_last_period">
                </div>
            </div>
            @endif
        </div>   
    </div>

    @include('design.partials.note')
   

@endsection