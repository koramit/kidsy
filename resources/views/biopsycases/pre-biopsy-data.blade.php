@extends('app.form')

@section('title', 'Pre-Biopsy Data')

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
        <div class="panel-heading panel-theme"><label>Pre-Biopsy Data</label></div>
        <div class="panel-body">
            <!-- field an datatype string -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="an">AN :</label>
                    <input class="form-control" type="text" name="an" value="{{ $case->an }}">
                </div>
            </div>

            @include('biopsycases.partials.ward')

            @include('biopsycases.partials.weight_height_BP')

            <div class="col-xs-12"><hr/></div>
            <!-- field smoking datatype byte -->
            <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="smoking">Smoking :</label>
                    <label class="radio-inline"><input type="radio" name="smoking" value="0" {{ isInputChecked($case->smoking,0) }} > ไม่เคยสูบ</label>
                    <label class="radio-inline"><input type="radio" name="smoking" value="1" {{ isInputChecked($case->smoking,1) }} > เลิกสูบแล้ว</label>
                    <label class="radio-inline"><input type="radio" name="smoking" value="2" {{ isInputChecked($case->smoking,2) }} > ยังสูบอยู่</label>
                </div>
            </div>

            <!-- field smoke_per_day datatype decimal3.1 -->
            <div class="col-sm-3 col-xs-6">
                <div class="input-group">
                    <input class="form-control" type="text" name="smoke_per_day" placeholder="มวนต่อวัน" value="{{ $case->smoke_per_day }}" />
                    <span class="input-group-addon">มวน</span>
                </div>
            </div>

            <!-- field smoke_years datatype decimal3.1 -->
            <div class="col-sm-3 col-xs-6">
                <div class="input-group">
                    <input class="form-control" type="text" name="smoke_years" placeholder="สูบมา(แล้ว)" value="{{ $case->smoke_years }}" />
                    <span class="input-group-addon">ปี</span>
                </div>
            </div>


            <!-- Required for woman -->
            <div class="collapse {{ (! $case->getGender()) ? 'in' : '' }} ">
            <div class="col-xs-12"><hr/></div>
            
            <!-- field pregnancy datatype byte -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="pregnancy">Pregnancy : </label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="0" {{ isInputChecked($case->pregnancy,0) }}> No</label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="1" {{ isInputChecked($case->pregnancy,1) }}> Yes</label>
                    <label class="radio-inline"><input type="radio" name="pregnancy" value="2" {{ isInputChecked($case->pregnancy,2) }}> Uncertain</label>
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
                        <input class="form-control" type="text" name="{{ $name }}" placeholder="{{ $name }}" value="{{ $case->$name }}">
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- field date_last_period datatype string -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label" for="date_last_period">Date Last Period :</label>
                    <input class="form-control" type="text" name="date_last_period" placeholder="หากไม่ทราบวันที่ ให้ลงเป็น กี่เดือนหรือกี่ปีมาแล้ว" value="{{ $case->date_last_period }}" >
                </div>
            </div>
            </div>
        </div>   
    </div>

    @include('biopsycases.partials.note')
   
@endsection