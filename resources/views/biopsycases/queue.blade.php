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

@section('content')
{{ $cases->links() }}
<div class="well table-responsive">
    <div class="panel">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="background-color-theme">
                    <th class="text-center">Patient</th>
                    <th class="text-center">Date Expected</th>
                    <th class="text-center">Ward</th>
                    <th class="text-center">Task</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $case)
                @if($case->isQueue())
                <tr>
                    <td class="table-text-indent">{{ $case->HN . ' ' . $case->getPatientData('name') }}</td>
                    <td class="text-center">{{ displayDate($case->date_biopsy_expected, 'd-M-Y') }}</td>
                    <td class="table-text-indent">{{ $case->getWard() }} <u>{{ $case->getDayAdmitShortName() }}</u></td>
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
