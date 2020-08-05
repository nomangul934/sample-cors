@extends('layouts.main')
@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('left-menu')
@foreach ($fairs as $fair)
        @if(isset($query))
            @foreach ($query as $q)
                    @if($q->school_suspend == $fair->school_id)
                        <style>
                        .nav-func {
                                        display:none;
                                        }

                        </style>
                    @endif
                @endforeach
        @endif

        @endforeach
    @include('school.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Fairs List</span>
    </nav>

@if(session('message'))
    <div class="alert @if(!session('error'))alert-success @else alert-danger @endif"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
            <i class="icon @if(!session('error')) ion-ios-checkmark @else ion-ios-close @endif alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
            <span>{{ session('message') }}</span>
        </div><!-- d-flex -->
    </div><!-- alert -->
@endif

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Fairs List</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="mg-b-20 mg-sm-b-30 wd-200">

            <a href="@if($school->state == 1 && Auth::user()->state == 1){{ route('school.create_fair') }}@endif" class="btn btn-outline-primary btn-block function" >
                <i class="fa fa-plus mg-r-10"></i>
                Create Fair
            </a>
        </div>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">Start Date</th>
                    <th class="wd-15p">End Date</th>
                    <th class="wd-15p">Number of grade 12 students</th>
                    <th class="wd-15p">Number of grade 11 students</th>
                    <th class="wd-15p">Universities Max Number</th>
                    <th class="wd-15p">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($fairs as $fair)
                        <tr>
                            <td>{{ $fair->start_date }}</td>
                            <td>{{ $fair->end_date }}</td>
                            <td>{{ $fair->students_grade12_number }}</td>
                            <td>{{ $fair->students_grade11_number }}</td>
                            <td>{{ $fair->universities_max }}</td>
                            <td><a class="fa fa-university"
                                href="{{ route('school.fair_participants', ['id' => $fair->id]) }}"></a>
                                <a class="fa fa-edit function"
                                   href="{{route('school.edit_fair', ['id' => $fair->id])}}"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div><!-- sl-pagebody -->

    </div>
</div>
@endsection

@section('vendor-js')
        <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
        <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
@endsection

@section('custom-js')
    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endsection