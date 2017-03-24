<div class="panel panel-default panel-theme">
    <div class="panel-heading panel-theme"><label>Laboratory Data</label></div>
    <div class="panel-body">
        
        <!-- field date_chest_xray datatype date -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="date_chest_xray">Date Chest X-Ray : <a role="button"><span class="fa fa-link"></span></a></label>
                <div class="input-group date datetimepicker-date" id='datetimepicker_chest_xray'>
                    <input type='text' class="form-control handle-datetime" name="date_chest_xray" id="date_chest_xray" value="{{ displayDate($case->date_chest_xray) }}">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>                    
            </div>
        </div>

        <!-- field chest_xray_result datatype smallInt -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="chest_xray_result">Chest X-Ray result :</label>
                <select class="form-control" name="chest_xray_result">
                    <option selected disabled hidden value=""></option>
                    <option value="0" {{ isInputChecked($case->chest_xray_result,0,'s') }} >N/A</option>
                    <option value="1" {{ isInputChecked($case->chest_xray_result,1,'s') }} >Valid result</option>
                    <option value="2" {{ isInputChecked($case->chest_xray_result,2,'s') }} >Invalid result</option>
                </select>
            </div>
        </div>

        <?php 
            $viralLab = [
                        'HBV' => 'date_HBV',
                        'HCV' => 'date_HCV',
                        'HIV' => 'date_HIV',
                    ]; 
        ?>

        @foreach($viralLab as $lab => $dateLab)
        <!-- field date_{{ $lab }} datatype date -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="date_{{ $lab }}">Date {{ $lab }} : <a role="button"><span class="fa fa-link"></span></a></label>
                <div class="input-group date datetimepicker-date" id='datetimepicker_{{ $lab }}'>
                    <input type='text' class="form-control handle-datetime" name="date_{{ $lab }}" id="date_{{ $lab }}" value="{{ displayDate($case->$dateLab) }}">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>                    
            </div>
        </div>

        <!-- field {{ $lab }} datatype byte -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="{{ $lab }}">{{ $lab }} result :</label>
                <select class="form-control" name="{{ $lab }}">
                    <option selected disabled hidden value=""></option>
                    <option value="0" {{ isInputChecked($case->$lab,0,'s') }} >N/A</option>
                    <option value="1" {{ isInputChecked($case->$lab,1,'s') }} >Negative</option>
                    <option value="2" {{ isInputChecked($case->$lab,2,'s') }} >Positive</option>
                    <option value="3" {{ isInputChecked($case->$lab,3,'s') }} >Intermediate</option>
                    <option value="4" {{ isInputChecked($case->$lab,4,'s') }} >Undetermined</option>
                    <option value="5" {{ isInputChecked($case->$lab,5,'s') }} >Weakly Positive</option>
                </select>
            </div>
        </div>
        @endforeach

        <div class="col-md-12 col-sm-12 col-xs-12"><hr/></div>

        <!-- field lab_source datatype byte -->            
        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
            <label class="control-label" for="lab_source">Lab source : </label>
            <label class="radio-inline"><input type="radio" name="lab_source" value="1" {{ isInputChecked($case->lab_source,1) }} >eCLAIR</label>
            <label class="radio-inline"><input type="radio" name="lab_source" value="2" {{ isInputChecked($case->lab_source,2) }} >Ward</label>
            <label class="radio-inline"><input type="radio" name="lab_source" value="0" {{ isInputChecked($case->lab_source,0) }} >Other</label>
        </div>

        <?php $labList = [
            'Cr' => 'Cr [mg/dL]',
            'BUN' => 'BUN [mg/dL]',
            'Hct' => 'Hct [%]',
            'PT' => 'PT [sec.]',
            'PTT' => 'PTT [sec.]'
            ]
        ?>

        @foreach($labList as $name => $label)
        <!-- field date_{{ $name }} datatype date -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="date_{{ $name }}">Date {{ $name }} : <a role="button"><span class="fa fa-link"></span></a></label>
                <div class="input-group date datetimepicker-date" id='datetimepicker_{{ $name }}'>
                    <input type='text' class="form-control handle-datetime" name="date_{{ $name }}" id="date_{{ $name }}" value="{{ $case->displayDate('date_' . $name) }}">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>                    
            </div>
        </div>


        <!-- field {{ $name }} datatype decimal6.3 -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="{{ $name }}">{{ $label }} : </label>
                <input class="form-control" type="text" name="{{ $name }}" value="{{ $case->$name }}">
            </div>
        </div>
        @endforeach

        <!-- field date_platelet datatype date -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="date_platelet">Date Platelet : <a role="button"><span class="fa fa-link"></span></a></label>
                <div class="input-group date datetimepicker-date" id='datetimepicker_platelet'>
                    <input type='text' class="form-control handle-datetime" name="date_platelet" id="date_platelet" value="{{ displayDate($case->date_platelet) }}">
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>                    
            </div>
        </div>

        <!-- field platelet datatype bigInteger -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label" for="platelet">Platelet [/mm<sup>3</sup>] : </label>
                <input class="form-control" type="text" name="platelet" value="{{ $case->platelet }}">
            </div>
        </div>
        
    </div>
</div>