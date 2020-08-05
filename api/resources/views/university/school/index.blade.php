@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <style>
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
            .link-btn-1{
                text-align: right;
            }
            .uni-bottom{
                /*border-right: #e0e0e0 solid 1px;*/
            }
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
        .university-content-bottom{
            padding:10px 25px 10px 20px!important;
            margin-bottom: 0px!important;
            font-size:18px;
        }
        .content-txt{
            /*border-bottom: #e0e0e0 solid 1px;*/
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
            .link-btn{
                margin-bottom:10px;
                text-align: center;
            }
            .link-btn-1{
                margin-bottom:10px;
                text-align: center;
            }
            .university-content-bottom{
                border-bottom: #e0e0e0 solid 1px;
            }
        }
    </style>
@endsection

@section('left-menu')
    @include('university.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('university.invitations_list') }}">Home</a>
        <span class="breadcrumb-item active">Schools</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>School List</h5>
        </div><!-- sl-page-title -->
        <form method = "get" action = "{{ route('university.schools_list') }}" id = "frm_search">
            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-4">
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

                </div>
            </div>
        </form>
        <div class="card pd-20 pd-sm-40 trans-back">

            @foreach($schools as $school)
                <div class="university">
                    <div class="alone-university">
                        <div class="row content-txt">
                            <div class="col-lg-2 col-md-3  img-tag p-0">
                                <div class="card" style="align-items: center;">
                                    <img class="card-img-top img-fluid university-logo" @if($school->logo) src="{{asset('images/school/'.$school->logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image">

                                </div>
                            </div>
                            <div class="col-lg-10 col-md-9">
                                <div class="row content-txt">
                                    <div class="col-sm-9 text-left">
                                        <p class="university-content">
                                            School Name: {{ $school->name }}
                                        </p>
                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <p class="university-content">
                                            ID: {{ $school->id }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row content-txt">
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            School Email: {{ $school->email }}
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            School Phone: {{ $school->phone }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            Contact Person:
                                            @if(isset($school->user[0]->name) && $school->user[0]->name)
                                                {{ $school->user[0]->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="university-content">
                                            Contact Email:
                                            @if(isset($school->user[0]->email) && $school->user[0]->email)
                                                {{ $school->user[0]->email }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="address-university">
                        <div class="row">
                            @php
                            $city_ary = json_decode($school->city,true);
                            @endphp
                            <div class="col-sm-3 col-xl-2 uni-bottom">
                                <p class="university-content">
                                    City: {{ $city_ary[0] }}
                                </p>
                            </div>
                            <div class="col-sm-2 col-xl-1  text-left">
                                <a target="_blank" href="{{$school->website}}" >
                                    <p class="university-content uni-bottom">
                                    <span>
                                        <i class="fa fa-external-link"></i>
                                    </span>
                                    </p>
                                </a>
                            </div>
                            <div class="col-sm-3 col-xl-6"></div>
                            <div class="col-sm-2 col-xl-1 link-btn-1">

                            </div>
                            <div class="col-sm-2 col-xl-2 link-btn">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($schools->count())
                <div class = "row" style="margin-top: 40px;text-align: center;" >
                    <div class = "col-md-12">
                        <div >{{ $schools->links() }}</div>
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