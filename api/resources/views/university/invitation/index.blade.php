@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="{{ asset('lib/jquery-timepicker/jquery.timepicker.min.css') }}" rel="stylesheet">

    <style>
        .btn-state{
            margin-left: 10px;
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
        @media (min-width: 1200px){
            .custom-width-sam {
                    flex: 0 0 38% !important;
                    max-width: 38% !important;
            }
        }
        @media (min-width: 860px) {
            .img-tag{
                /*border-right: #e0e0e0 solid 1px;*/
            }
            .school-curr{
                /*border-right: #e0e0e0 solid 1px;*/
            }
        }



        .alone-university{
            padding:0px 20px 20px 20px;
        }
        .address-university{
            width:98%;
            margin:auto;
            padding-bottom: 20px;
        }

        .university-content{
            padding:10px 5px!important;
            margin-bottom: 0px!important;
            font-size:18px;
        }

        .content-txt{
            /*border-bottom: #e0e0e0 solid 1px;*/
        }

        .div-select-row{
            margin:auto!important;
            margin-bottom: 30px!important;
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
    @include('university.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Invitations</span>
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
            <h5>Invitations</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 trans-back">
            <form method="get" action="{{ route('university.invitations_list') }}" id="frm_filter">
                <div class="row div-select-row">
                    <div class="col-md-3">
                        <label class="form-control-label">Curriculum</label>
                        <select class="form-control cur-select2"  name="curriculum" id="curriculum">
                            <option value="0">All</option>
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
                        <select class="form-control"  name="sort-option" id="btn_sort"  value = "{{old('sort-option')}}" data-placeholder="Select" data-parsley-errors-container="#slErrorContainer3">
                            <option value="none">Select Option</option>
                            <option value="start" @if(old('sort-option')=='start')selected @endif>Start Date</option>
                            <option value="end" @if(old('sort-option')=='end')selected @endif>End Date</option>
                            <option value="student" @if(old('sort-option')=='student')selected @endif>Student</option>
                        </select>
                        <div id="slErrorContainer3"></div>
                        <input type="hidden" name="sort_name" class="sort_field">
                    </div>
                </div>
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30" style="width: 96%; margin: auto; margin-bottom: 30px;">
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
                            <div class="col-lg-2 col-md-3 img-tag p-0">
                                <div class="card" style="align-items: center;">
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
                                            ID: {{ $fair->school_id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row content-txt">
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            Start Date: {{date('Y-m-d h:i A',strtotime($fair->start_date)) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            End Date: {{date('Y-m-d h:i A',strtotime($fair->end_date))}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    @php
                                        $city_ary = json_decode($fair->school_city,true);
                                    @endphp
                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            City: {{ $city_ary[0] }}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            Grade 11: {{ $fair->students_grade11_number }}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            Fee: {{ $fair->fees_11 }}
                                        </p>
                                    </div>

                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            Grade 12: {{ $fair->students_grade12_number }}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            Fee: {{ $fair->fees_12 }}
                                        </p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="university-content">
                                            Total Student: {{ $fair->students_grade12_number + $fair->students_grade11_number }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="address-university">
                        <div class="row">
                            <div class="col-sm-4 col-xl-3">
                                <p class="university-content school-curr">
                                    Curriculum:{{$fair->label}}
                                </p>
                            </div>
                            <div class="col-sm-4 col-xl-3 text-left">
                                <p class="university-content school-curr">

                                </p>
                            </div>
                            <div class="col-sm-1 col-xl-3 text-right">

                            </div>
                            <div class="col-sm-3 col-xl-3 text-right">
                                <div class="approval-state text-right">
                                    @if($university->state == 1 && Auth::user()->state == 1)
                                        @if($fair->accepted == 0)
                                            <a class="btn btn-success btn-state" href="{{ route('university.accept_invitation', ['id' => $fair->invitation_id  ])}}">Accept</a>
                                        @endif
                                        @if($fair->rejected == 0)
                                            <a class="btn btn-danger btn-state" href="{{ route('university.reject_invitation', ['id' => $fair->invitation_id ]) }}">Reject</a>
                                        @endif
                                    @endif
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

    <script src="{{ asset('lib/d3/d3.js') }}"></script>
    <script src="{{ asset('lib/rickshaw/rickshaw.min.js') }}"></script>

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
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });

            $('#date_from').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#date_to').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

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
        $( function() {
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


        $('#generalSearch').bind("keyup change", function(e) {
            setTimeout(function() {
                $('#frm_filter').submit();
            }, 800);
        });


    </script>
@endsection