@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/jquery-timepicker/jquery-timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('left-menu')
    @include('school.left-menu')
@endsection

@section('content')
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
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('school.fairs_list') }}">Home</a>
        <span class="breadcrumb-item active">New Fair</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Create New Fair</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('school.store_fair') }}" method="post">
                @csrf
                @include('school.fair.form')
            </form>
        </div><!-- card -->

    </div><!-- sl-pagebody -->
@endsection

@section('vendor-js')
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('js/submit.js') }}"></script>
    <script>
        $(function(){
            'use strict';
            $('#about_us').summernote({
                height: 150
            });
            $('#to_support').summernote({
                height: 150
            });

            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '8',
                maxTime: '18:00pm',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
@endsection