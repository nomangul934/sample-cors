@extends('layouts.main')
<?php

    //dd($schools);exit;
?>
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
    @include('admin.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Manage School</span>
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
        <h5>Manage School</h5>
    </div><!-- sl-page-title -->
    <form method = "get" action = "{{ route('admin.manage_school') }}" id = "frm_search">
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
                            <div class="card " style="align-items: center;">
                                <img class="card-img-top img-fluid university-logo " @if($school->logo) src="{{asset('images/school/'.$school->logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image">

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
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        G12: {{$school->number_grade12}}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        Fee: {{$school->fees_grade12}}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        G11: {{$school->number_grade11}}
                                    </p>
                                </div>
                                <div class="col-sm-3">
                                    <p class="university-content">
                                        Fee: {{$school->fees_grade11}}
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
                        <div class="col-sm-3 col-xl-6 custom-width-sam">
                            <p class="university-content">
                                Total Students: {{$school->number_grade11 + $school->number_grade12}}
                            </p>
                        </div>
                        <div class="col-sm-2 col-xl-1 link-btn-1">
                            <a href="{{ route('admin.edit_school', ['id' => $school->id]) }}"><button class="btn btn-info wd-80">view</button></a>
                        </div>
                        <div class="col-sm-2 col-xl-2 link-btn">
                            @if($school->state == 1)
                                <a class="btn btn-danger wd-80" href="{{ url('/admin/school/suspend/' . $school->id)}}">
                                    Suspend
                                </a>
                            @else
                                <a class="btn btn-danger wd-80" style="background-color:#1caf9a;" href="{{url('/admin/school/unsuspend/' . $school->id)}}">
                                    Unsuspe
                                </a>
                            @endif
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
        $(document).ready(function(){
            $(".suspend").click(function(e){
                var values =  $(this).attr("value");
                $(this).attr("style","background-color:#1caf9a");
                $(".suspend1" + values).text("Unsuspe");
                e.preventDefault();
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN':'{{ csrf_token() }}'
                  }
              });
               $.ajax({
                  url: "{{ url('/admin/suspend') }}",
                  method: 'post',
                  data: {
                     name: values
                  },
                  success: function(result){
                     console.log(result.success);
                     if(result.success == "add"){
                     }else{
                        $("#suspend"+values).attr("style","background-color:#dc3545");
                        $("#suspend2"+values).attr("style","background-color:#dc3545");
                        $(".suspend1"+values).text("Suspend")
                     }
                     
                  }});
            });            
        });
    </script>
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
