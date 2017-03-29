@extends('design.index')

@section('second-brand')
Biopsy Queue
@endsection

@section('navbar-left')
@include('design.partials.queue-navbar-left')
@endsection


@section('navbar-right')
@include('design.partials.queue-navbar-right')
@endsection

@section('content')
<div class="well table-responsive" style="background: rgba(0, 0, 0, 0.2); margin-top: 70px;">
    <div class="panel">
        <table class="table table-striped table-bordered">
            <thead>
                <tr style="background-color: #CD9FCC!important;">
                    <th class="text-center">Patient</th>
                    <th class="text-center">Date Expected</th>
                    <th class="text-center">Task</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-indent: 20px;">52126345 สมใจ หมายปอง</td>
                    <td class="text-center">01-04-2016</td>
                    <td>
                        <a  role="button" style="margin-left: 10px; text-decoration: none;"><span class="fa fa-calendar"></span> Appoinment</a>
                        <a role="button" style="margin-left: 10px; text-decoration: none;"><span class="fa fa-file-text-o"></span> Pre-Biopsy Data</a>
                        <a role="button" style="margin-left: 10px; text-decoration: none;"><span class="fa fa-stethoscope"></span> Clinical Data</a>
                        <a role="button" style="margin-left: 10px; text-decoration: none;"><span class="fa fa-file-powerpoint-o"></span> Procedure Note</a>
                        <a role="button" style="margin-left: 10px; text-decoration: none;"><span class="fa fa-print"></span> Print</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection