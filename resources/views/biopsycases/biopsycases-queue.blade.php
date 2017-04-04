@extends('app.index')

@section('title', 'Biopsy Queue')

@section('second-brand')
Biopsy Queue
@endsection

@section('navbar-left')
@include('biopsycases.partials.queue-navbar-left')
@endsection


@section('navbar-right')
@include('biopsycases.partials.queue-navbar-right')
@endsection

@section('style-js')
<style type="text/css">
    div.well.table-responsive {
        background: rgba(0, 0, 0, 0.2);
        margin-top: 70px;
    }

    div.panel table thead tr {
        background-color: #CD9FCC!important;
    }

    .table-text-indent {
        text-indent: 20px;
    }

    a.link-task {
        margin-left: 20px;
        text-decoration: none;
    }

    input.flash-error {
        -ms-transition: background-color 1s;
        -o-transition: background-color 1s;
        -moz-transition: background-color 1s;
        -webkit-transition: background-color 1s;
        transition: background-color 1s;
    }

    input.flash-error:focus {
        background-color: #FF7070;
    }
</style>

<script type="text/javascript">
    function chechHNForSetBiopsy() {
        isHnAlreadyInQueue($('input[name=hn]').val());
        $('#patient-name').collapse('show');
    }

    function isHnAlreadyInQueue(hn) {
        $.getJSON('/check-hn-in-queue/' + hn, function (result) {
            // console.log(result.resultCode);
            $('input[name=result]').val(result.resultText);
            if (result.resultCode == '0') {
                $('input[name=can-set-biopsy]').val(0);
                $('input[name=result]').removeClass('flash-error');
            } else {
                $('input[name=can-set-biopsy]').val(1);
                $('input[name=result]').addClass('flash-error');
            }
        });
    }

    function setBiopsy() {
        if ($('input[name=can-set-biopsy]').val() == 0) {
            $('#submit_form').click();
        } else {
            // $('input[name=result]').addClass('flash-error');
            $('input[name=result]').focus();
            // console.log('can not set bx');
        }
    }
</script>
@endsection

@section('content')
<div class="well table-responsive">
    <div class="panel">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Patient</th>
                    <th class="text-center">Date Expected</th>
                    <th class="text-center">Task</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                @if($case->isQueue())
                <tr>
                    <td class="table-text-indent">{{ $case->HN . ' ' . $case->getName() }}</td>
                    <td class="text-center">{{ displayDate($case->date_biopsy_expected) }}</td>
                    <td class="text-right">
                        @if(Auth::user()->canUseResource('print-procedure') && $case->canPrint())
                        <a href="/biopsycases/report/{{ $case->id }}" target="_blank" class="link-task"><span class="fa fa-print"></span> Print</a>
                        @endif
                        
                        @if(Auth::user()->canUseResource('set-biopsy'))
                        <a href="/biopsycases/set-biopsy/{{ $case->id }}/edit" class="link-task"><span class="fa fa-calendar"></span> Appoinment</a>
                        @endif

                        @if(Auth::user()->canUseResource('pre-biopsy-data'))
                        <a href="/biopsycases/pre-biopsy-data/{{ $case->id }}/edit" class="link-task"><span class="fa fa-file-text-o"></span> Pre-Biopsy Data</a>
                        @endif

                        @if(Auth::user()->canUseResource('clinical-data'))
                        <a href="/biopsycases/clinical-data/{{ $case->id }}/edit" class="link-task"><span class="fa fa-stethoscope"></span> Clinical Data</a>
                        @endif

                        @if(Auth::user()->canUseResource('procedure-note'))
                        <a href="/biopsycases/procedure-note/{{ $case->id }}/edit" class="link-task"><span class="fa fa-file-powerpoint-o"></span> Procedure Note</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection