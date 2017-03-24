<?php 
    $fieldList = [
        'weight_kg' => 'Weight (kg)',
        'height_cm' => 'Height (cm)',
        'pre_SBP_mmHg' => 'Pre SBP (mmHg)',
        'pre_DBP_mmHg' => 'Pre DBP (mmHg)',
    ]
?>

@foreach($fieldList as $name => $label)
<!-- field {{ $name }} datatype decimal6.3 -->
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label class="control-label" for="{{ $name }}">{{ $label }} :</label>
        <input class="form-control" type="text" name="{{ $name }}" value="{{ $case->$name }}" />
    </div>
</div>
@endforeach