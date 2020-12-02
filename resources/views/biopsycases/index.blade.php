@extends('app.index')

@section('title', 'Biopsy cases index')

@section('second-brand')
Biopsy cases index
@endsection

@section('navbar-left')
{{-- @include('biopsycases.partials.queue-navbar-left') --}}
@endsection


@section('navbar-right')

@include('biopsycases.partials.post-biopsy-navbar-right')
@include('admin-panel.tools-navbar-right')
@include('app.navbar-right')

{{-- @include('biopsycases.partials.queue-navbar-right') --}}
{{--
@if ( Auth::user()->canUseResource('admin-panel') )
<li class="hvr-bounce-to-top"><a href="/dashboard"><span class="fa fa-users"></span> Users List</a></li>
<li class="hvr-bounce-to-top"><a href="/add-resident"><span class="fa fa-user-plus"></span> Add Resident</a></li>
@endif
<li class="active"><a role="button">{{ Auth::user()->getData('username') }}</a></li>
<li class="hvr-bounce-to-top"><a href="/logout"><span class="fa fa-sign-out"></span></a></li>

 --}}
@endsection

@section('content')
{{ $cases->links() }}
<div class="well table-responsive">
    <div class="panel">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="background-color-theme">
                    <th class="text-center">Date Biopsy</th>
                    <th class="text-center">Patient</th>
                    <th class="text-center">Kidney</th>
                    <th class="text-center">Fellow</th>
                    <th class="text-center">File No.</th>
                    <th class="text-center">Patho</th>
                    <th class="text-center">Diag</th>
                </tr>
            </thead>
            <tbody>

                @foreach($cases as $case)

                <tr>
                    <td class="text-center">{{ displayDate($case->date_bx, 'd-M-Y') }}</td>
                    <td class="table-text-indent">{{ $case->HN . ' ' . $case->getPatientData('name') }}</td>
                    <td class="table-text-indent">{{ $case->is_native ? 'Native' : 'Graft' }}</td>
                    <td class="table-text-indent">{{ $case->getDoctor($case->fellow_id, 'short') }}</td>
                    <td class="table-text-indent" id="case-{{ $case->id }}-folder">
                        @if ( $case->caseFolder() != NULL )
                        {{ $case->caseFolder()->getFolderNumber() }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if( $case->surgical_number != NULL )
                        <a href="/pathoreports/{{ $case->surgical_number }}.html" target="_blank"><span class="fa fa-external-link"></span></a>
                        @endif
                    </td>
                    <td>
                        @if ( $case->is_native )
                            @if ( Auth::user()->canUseResource('edit-closed-biopsy-case') )
                            <input class="form-control input-sm autocomplete-patho-diag" type="text" name="diag{{ $case->id }}" size="30" value="{{ $case->diagnosis() ? $case->diagnosis()->name : 'error' }}" /> <span class="fa fa-fw" id="diag-{{ $case->id }}-updating"></span>
                            @else
                            {{ $case->diagnosis() ? $case->diagnosis()->name : 'error' }}
                            @endif
                        @else
                        KT
                        @endif
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
