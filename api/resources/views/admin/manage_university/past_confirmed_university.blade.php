@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                flex: 0 0 33% !important;
                max-width: 30% !important;
            }
        }
        @media (min-width: 860px) {
            .img-tag{
                /*border-right: #e0e0e0 solid 1px;*/
            }
            .uni-bottom{
                /*border-right: #e0e0e0 solid 1px;*/
            }
        }

        .block-field{
            display: flex;
        }

        .alone-university{
            padding:0px 20px 20px 20px;
        }
        .address-university{
            width:98%;
            margin:auto;
            padding-bottom: 20px;
        }
        .link-field{
            margin-right: 20px;
        }
        .university-content{

            padding:10px 5px!important;
            margin-bottom: 0px!important;
            font-size:16px;
        }
        .university-header{
            margin-top:4px;
            padding:10px 5px!important;
            margin-bottom: 0px!important;
            font-size:18px;
            font-weight: 500;
        }
        .content-txt{
            /*border-bottom: #e0e0e0 solid 1px;*/
        }
        .block-name{
            margin-left:20px;
        }

        @media (max-width:1480px){
            .university-content{
                font-size:14px;
            }
            .university-header{
                font-size:16px;
            }
        }
        @media (max-width: 860px) {
            .pagination .page-item .page-link{
                width:20px!important;
            }
            .link-btn{
                margin-bottom:10px;
            }
            .link-btn{
                text-align: center;
            }
            .university-content-bottom{
                border-bottom: #e0e0e0 solid 1px;
            }
        }

    </style>
@endsection

@section('left-menu')
    @include('admin.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <h5>Past Confirmed Universities</h5>
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
            <h5>Past Confirmed Universities</h5>
        </div><!-- sl-page-title -->
        <form method = "get" action = "{{ route('admin.past_university') }}" id = "frm_search">
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
            @foreach($universities as $university)
                <div class="university">
                    <div class="alone-university">
                        <div class="row">
                            <div class="col-lg-7 col-sm-12">
                                <div class="row content-txt">
                                    <div class="col-lg-2 col-sm-12 img-tag p-0">
                                        <div class="card " style="align-items: center;">
                                            <img class="card-img-top img-fluid university-logo" id="image_upload" @if($university->logo) src="{{asset('images/university/'.$university->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-12 ">
                                        <div class="row content-txt">
                                            <div class="col-sm-12">
                                                <p class="university-header">
                                                    {{ $university->name }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row content-txt">
                                            <div class="col-sm-6">
                                                <p class="university-content">
                                                    Start Date: {{ $university->start_date }}
                                                </p>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="university-content">
                                                    End Date: {{ $university->end_date }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <p class="university-content">
                                                    Accepted By:
                                                    @if(isset($university->user[0]->name) && $university->user[0]->name)
                                                        {{ $university->user[0]->name }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="row content-txt">
                                    <div class="col-lg-2 col-sm-12 img-tag p-0">
                                        <div class="card " style="align-items: center;">
                                            <img class="card-img-top img-fluid university-logo" id="image_upload" @if($university->school_logo) src="{{asset('images/school/'.$university->school_logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image" >
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-sm-12 ">
                                        <div class="row content-txt">
                                            <div class="col-sm-12 block-name">
                                                <p class="university-header">
                                                    {{ $university->school_name }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($universities->count())
                <div class = "row" style="margin-top: 40px;text-align: center;" >
                    <div class = "col-md-12">
                        <div >{{ $universities->links() }}</div>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
@endsection

@section('custom-js')
    <script>
        $(document).ready(function(){

            $('input[type="search"]').attr("style","background-image: url(https://www.w3schools.com/css/searchicon.png)");
            $('select').select2({ minimumResultsForSearch: Infinity });
        });
        $(function(){
            'use strict';

        });
    </script>

@endsection
