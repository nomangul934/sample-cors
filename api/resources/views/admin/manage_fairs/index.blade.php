@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('lib/jquery-timepicker/jquery.timepicker.min.css') }}" rel="stylesheet">

    <style>
        .approval-state{
            display: flex;
        }
        .university {
            width: 99.4%;
            margin: auto;
            border: #e0e0e0 solid 1px;
            margin-bottom: 15px;
            background: #fff;
            border-radius: 3px;
            box-shadow: 0 0 4px 0 rgba(0,0,0,.08), 0 2px 4px 0 rgba(0,0,0,.12);
        }
        .trans-back{
            background:transparent !important;
        }
        .div-select-row{
            margin:auto!important;
            margin-bottom: 30px!important;
        }

        .alone-university{
            padding:0px 20px 10px 20px;
        }
        .address-university{
            width:98%;
            margin:auto;
            padding-bottom: 5px;
        }
        .university-content{
            padding:10px 5px!important;
            margin-bottom: 0px!important;
            font-size:18px;
        }

        @media (max-width:1480px){
            .university-content{
                font-size:14px;
            }
        }
        @media (max-width: 860px) {
            .pagination .page-item .page-link{
                width:20px!important;
            }

        }
        @media (max-width:1600px){
            .university-content{
                font-size:14px;
            }
            .approval{
                font-size: 14px!important;
            }
        }

        .approval {
            display: block;
            position: relative;
            padding-left: 3px;
            width:80px;
            padding-top:10px;
            padding-bottom: 10px;
            padding-right:5px;
            text-align: left;

            cursor: pointer;
            font-size: 18px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .approval input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .approve {
            position: absolute;
            top: 8px;
            left: 35px;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }
        .approval:hover input ~ .approve {
            background-color: #ccc;
        }
        .approval input:checked ~ .approve {
            background-color: #16ce44;
        }
        .approve:after {
            content: "";
            position: absolute;
            display: none;
        }
        .approval input:checked ~ .approve:after {
            display: block;
        }
        .approval .approve:after {
            left: 10px;
            top: 5px;
            width: 7px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
        .unapprove{
            position: absolute;
            top: 8px;
            left: 35px;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }
        .approval:hover input ~ .unapprove {
            background-color: #ccc;
        }
        .approval input:checked ~ .unapprove {
            background-color: #ffffff;
        }
        .unapprove:after {
            content: "";
            position: absolute;
            display: none;
        }
        .approval input:checked ~ .unapprove:after {
            display: block;
        }
        .approval input:checked ~ .unapprove:before {
            content:'';
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%) rotate(45deg);
            background-color:#ff0000;
            width:20px;
            height:5px;
            border-radius:40px;
            transition:all .5s;
        }

        .approval input:checked ~ .unapprove:after {
            content:'';
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%) rotate(-45deg);
            background-color:#ff0000;
            width:20px;
            height:5px;
            border-radius:40px;
            transition:all .5s;
        }
        .waitapprove{
            position: absolute;
            top: 8px;
            left: 35px;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }
        .approval:hover input ~ .waitapprove {
            background-color: #ccc;
        }
        .approval input:checked ~ .waitapprove {
            background-color: #ffffff;
        }
        .waitapprove:after {
            content: "";
            position: absolute;
            display: none;
        }
        .approval input:checked ~ .waitapprove:after {
            display: block;
        }
        .approval input:checked ~ .waitapprove:after {
            content: '?';
            color:white;
            display:flex;
            position: absolute;
            top:0;
            left:0;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: #0071ff;
            justify-content: center;
            align-items: center;
        }
        @media (max-width: 860px) {
            .pagination .page-item .page-link{
                width:20px!important;
            }
        }

        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
            border-radius: 50%;
            background: #ffffff;
            font-weight: normal;
            border-color: #2f8ff2;
            color: #454545;
        }
        .ui-slider .ui-slider-range {
            font-size: .6em;
            background-color: #2f8ff2;
        }
        label{
            font-size:16px!important;
        }

    </style>
@endsection

@section('left-menu')
    @include('admin.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Manage Fairs</span>
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
        <h5>Manage Fairs</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40 trans-back">

        <form method="get" action = "{{ route('admin.manage_fairs') }}" id="frm_filter">
            <div class="row div-select-row">
                <div class="col-md-3">
                    <label class="form-control-label">Curriculum</label>
                    <select class="form-control cur-select2"  name="curriculum" id="curriculum">
                        <option value="0">ALL</option>
                        @foreach($curricula as $curriculum)
                            <option value="{{$curriculum->id}}" @if(old('curriculum')==$curriculum->id) selected @endif>{{$curriculum->label}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="filter-text">
                        <label class="form-control-label">Tuition Fees:&nbsp;&nbsp;</label>
                        <input type="text" style="width:100px; border-width: 0px;background-color: #D8DCE3;" id="tuition" data-slider-value="@if(old('tuition_start')||old('tuition_end'))[{{old('tuition_start')}},{{old('tuition_end')}}]@else[0,100000]@endif" >
                        <input type="hidden" name="tuition_start" id="hid_tui_start" value="{{old('tuition_start')}}">
                        <input type="hidden" name="tuition_end" id="hid_tui_end"  value="{{old('tuition_end')}}">
                    </p>
                    <div id="slider-range"></div>
                </div>
                <div class="col-md-3">
                    <p class="filter-text">
                        <label class="form-control-label">Student's Number:&nbsp;&nbsp;</label>
                        <input type="text" style="width:100px; border-width: 0px;background-color: #D8DCE3;" id="grade_12" data-slider-value="@if(old('g12_start') || old('g12_end'))[{{old('g12_start')}},{{old('g12_end')}}]@else[0,1000]@endif" >
                        <input type="hidden" name="g12_start" id="hid_g12_start" value="{{old('g12_start')}}">
                        <input type="hidden" name="g12_end" id="hid_g12_end" value="{{old('g12_end')}}">
                    </p>
                    <div id="grade12_slider_range"></div>
                </div>
                <div class="col-md-3">
                    <label class="form-control-label">Sort By: </label>
                    <select class="form-control select2"  name="sort-option" id="btn_sort"  value = "{{old('sort-option')}}" data-placeholder="Select" data-parsley-errors-container="#slErrorContainer3">
                        <option value="none">Select Option</option>
                        <option value="start" @if(old('sort-option')=='start')selected @endif>Start Date</option>
                        <option value="end" @if(old('sort-option')=='end')selected @endif>End Date</option>
                        <option value="student" @if(old('sort-option')=='student')selected @endif>Student</option>
                    </select>
                    <div id="slErrorContainer3"></div>
                    <input type="hidden" name="sort_name" class="sort_field">
                </div>
            </div>
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30" style="width: 98%; margin: auto; margin-bottom: 30px;">
                <div class="row align-items-center">

                    <div class="col-lg-3 col-md-9 col-sm-12" style="padding: 5px;">
                        <div class="input-group date" id="m_datepicker_2">
                            <input type="text" class="form-control m-input" value = "{{@$_GET['date_from']}}" name="date_from" id="date_from" placeholder="Date From">
                            <span class="input-group-addon">
                                <i class="icon ion-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-9 col-sm-12" style="padding: 2px;">
                        <div class="input-group date" id="m_datepicker_2">
                            <input type="text" class="form-control m-input" value = "{{@$_GET['date_to']}}" name="date_to" id="date_to" placeholder="Date To">
                            <span class="input-group-addon">
                                <i class="icon ion-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 " style="padding: 2px;">
                        <button type = "submit" class="btn btn-success btn-search" style="width:100px; border-radius: 20px;">
                            <span>
                                <i class="icon ion-search"></i>
                                <span>
                                    Search
                                </span>
                            </span>
                        </button>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                    <div class="col-lg-3 col-md-9 col-sm-12" style="padding: 2px;">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch" name = "search" value = "{{@$_GET['search']}}">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span>
                                    <i class="la la-search"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @foreach($fairs as $fair)
            <div class="university">
                <div class="alone-university">
                    <div class="row content-txt">
                        <div class="col-lg-2 col-md-3 img-tag">
                            <div class="card " style="align-items: center;">
                                <img class="card-img-top img-fluid university-logo "  @if(isset($fair->school_logo) && $fair->school_logo) src="{{asset('images/school/'.$fair->school_logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <div class="row content-txt">
                                <div class="col-sm-9 text-left">
                                    <p class="university-content">
                                        School Name: {{ $fair->school_name }}
                                    </p>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <p class="university-content">
                                        ID: {{ $fair->id }}
                                    </p>
                                </div>
                            </div>
                            <div class="row content-txt">
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Start Date: {{ $fair->start_date }}
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        End Date: {{ $fair->end_date }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        G12: {{ $fair->students_grade12_number }}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        Fee: {{ $fair->fees_12 }}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        G11: {{ $fair->students_grade11_number }}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        Fee: {{ $fair->fees_11 }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address-university">
                    <div class="row">
                        <div class="col-xl-2 col-sm-3 uni-bottom">
                            <p class="university-content">
                                Max Uni: {{  $fair->universities_max }}
                            </p>
                        </div>
                        <div class="col-xl-3 col-sm-3 text-left uni-bottom">
                            @php
                                $city_ary = json_decode($fair->school_city,true);
                            @endphp
                            <p class="university-content">
                                City: {{ $city_ary[0] }}
                            </p>
                        </div>
                        <div class="col-xl-2 col-sm-3">

                        </div>
                        <div class="col-xl-3 col-sm-3 text-right">
                            <a href="{{ route('admin.edit_fair', ['id' => $fair->id]) }}"><button class="btn btn-info">View</button></a>
                        </div>
                        <div class="col-xl-2 col-sm-3 text-right">
                            <div class="approval-state text-right">
                                <label class="approval">AP
                                    <input type="checkbox" class="chk-app" data-id="{{$fair->id}}" @if($fair->app_state == 1) checked @endif disabled >
                                    <span class="checkmark approve"></span>
                                </label>
                                <label class="approval">NP
                                    <input type="checkbox"  class="chk-npp" data-id="{{$fair->id}}" @if($fair->app_state == 2) checked @endif disabled >
                                    <span class="checkmark unapprove"></span>
                                </label>
                                <label class="approval">WP
                                    <input type="checkbox" class="chk-wpp" data-id="{{$fair->id}}" @if($fair->app_state == 0) checked @endif disabled >
                                    <span class="checkmark waitapprove"></span>
                                </label>
                                <input type="hidden" class="chk_hidden-{{$fair->id}}" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($fairs->count())
            <div class = "row" style="margin-top: 40px;text-align: center;" >
                <div class = "col-md-12">
                    <div >{{ $fairs->links() }}</div>
                </div>
            </div>
        @endif

    </div>
    
</div>
@endsection

@section('vendor-js')
        <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
        <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('lib/jquery-timepicker/jquery.timepicker.min.js') }}"></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                    lengthMenu: '_MENU_ items/page'
                }
            });
//            $('.cur-select2').select2({
//                "width": '100%'
//            });

//            $('select').select2({ minimumResultsForSearch: Infinity });

            $('#date_from').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#date_to').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            var range = $('#tuition').data('slider-value');
            var g12_range = $('#grade_12').data('slider-value');
//            console.log(range);
//            console.log(g12_range);
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 100000,
                values: [range[0], range[1]],
                slide: function( event, ui ) {
                    $( "#tuition" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                    $('#hid_tui_start').val(ui.values[ 0 ]);
                    $('#hid_tui_end').val(ui.values[ 1 ]);

                    setTimeout(function() {
                        $('#frm_filter').submit();
                    }, 500);

                }
            });
            $("#tuition" ).val( $("#slider-range" ).slider( "values", 0 ) +
                " - " + $("#slider-range" ).slider( "values", 1 ) );

            $("#grade12_slider_range" ).slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ g12_range[0], g12_range[1] ],
                slide: function( event, ui ) {
                    $( "#grade_12" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );

                    $('#hid_g12_start').val(ui.values[ 0 ]);
                    $('#hid_g12_end').val(ui.values[ 1 ]);

                    setTimeout(function() {
                        $('#frm_filter').submit();
                    }, 500);
                }
            });
            $("#grade_12" ).val( $("#grade12_slider_range" ).slider( "values", 0 ) +
                " - " + $("#grade12_slider_range" ).slider( "values", 1 ) );

        });

        $('#btn_sort').change(function () {
            var sort = $(this).val();
//            console.log(sort);
            $('.sort_field').val(sort);
            $('#frm_filter').submit();
        });

        $('#curriculum').change(function () {
            setTimeout(function() {
                $('#frm_filter').submit();
            }, 500);
        });
        $('#generalSearch').bind("keyup change", function(e) {
            setTimeout(function() {
                $('#frm_filter').submit();
            }, 800);
        });
    </script>

    <script src="{{ asset('lib/calendar/popper.js') }}"></script>
    <script src="{{ asset('lib/calendar/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/calendar/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/calendar/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/calendar/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/calendar/select2.min.js') }}"></script>
    <script src="{{ asset('lib/calendar/spectrum.js') }}"></script>
    <script>
        $(function() {

            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });

            $('.cur-select2').select2({
                "width": '100%',
                minimumResultsForSearch: Infinity
            });

            // Select2 by showing the search
            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });

            // Select2 with tagging support
            $('.select2-tag').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });

            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });

            // Color picker
            $('#colorpicker').spectrum({
                color: '#17A2B8'
            });

            $('#showAlpha').spectrum({
                color: 'rgba(23,162,184,0.5)',
                showAlpha: true
            });

            $('#showPaletteOnly').spectrum({
                showPaletteOnly: true,
                showPalette: true,
                color: '#DC3545',
                palette: [
                    ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                    ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
                ]
            });

            $('.chk-app').click(function(){
                var fair_id = $(this).data('id');
                $('.chk_hidden-'+fair_id).parent().find('.chk-npp').prop('checked',false);
                $('.chk_hidden-'+fair_id).parent().find('.chk-wpp').prop('checked',false);
                var app_state = '1';
                $.ajax({
                    url: "{{ url('/admin/change_app_state') }}",
                    method: 'get',
                    data: {
                        fair_id: fair_id,
                        app_state: app_state
                    },
                    success: function(data){
//                        console.log("Approved State",data.success);

                    }});
            });
            $('.chk-npp').click(function(){
                var fair_id = $(this).data('id');
                $('.chk_hidden-'+fair_id).parent().find('.chk-app').prop('checked',false);
                $('.chk_hidden-'+fair_id).parent().find('.chk-wpp').prop('checked',false);
                var app_state = '2';
                $.ajax({
                    url: "{{ url('/admin/change_app_state') }}",
                    method: 'get',
                    data: {
                        fair_id: fair_id,
                        app_state: app_state
                    },
                    success: function(data){
//                        console.log("Approved State",data.success);

                    }});
            });
            $('.chk-wpp').click(function(){
                var fair_id = $(this).data('id');
                $('.chk_hidden-'+fair_id).parent().find('.chk-npp').prop('checked',false);
                $('.chk_hidden-'+fair_id).parent().find('.chk-app').prop('checked',false);
                var app_state = '0';
                $.ajax({
                    url: "{{ url('/admin/change_app_state') }}",
                    method: 'get',
                    data: {
                        fair_id: fair_id,
                        app_state: app_state
                    },
                    success: function(data){
//                        console.log("Approved State",data.success);

                    }});
            });

        });
           $(document).ready(function(){
            
            $('input[type="search"]').css({"background-image": "url(https://www.w3schools.com/css/searchicon.png)", "background-position": " 10px 12px","background-repeat":"no-repeat","width":"100%","font-size":"16px","border-radius":"50px","padding":"9px 20px 9px 40px","border":"1px solid #ddd","margin-bottom":"12px"});
        });
       
    </script>
@endsection
