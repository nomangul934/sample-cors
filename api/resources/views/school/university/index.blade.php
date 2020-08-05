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
        }
    </style>
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
        <h5>View Universities</h5>
    </div><!-- sl-page-title -->
    <form method = "get" action = "{{ route('school.univ_lists') }}" id = "frm_search">
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
                    <div class="row content-txt">
                        <div class="col-lg-2 col-md-3 img-tag p-0">
                            <div class="card " style="align-items: center;">
                                <img class="card-img-top img-fluid university-logo " id="image_upload" @if($university->logo) src="{{asset('images/university/'.$university->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <div class="row content-txt">
                                <div class="col-9 text-left">
                                    <p class="university-content">
                                        Uni Name: {{ $university->name }}
                                    </p>
                                </div>
                                <div class="col-3 text-right">
                                    <p class="university-content">
                                        ID: {{ $university->id }}
                                    </p>
                                </div>
                            </div>

                            <div class="row content-txt">
                                <div class="col-6">
                                    <p class="university-content">
                                        Contact Person:
                                        @if(isset($university->user->name) && $university->user->name)
                                            {{ $university->user->name }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="university-content">
                                        Contact Phone:
                                        @if(isset($university->user->phone) && $university->user->phone)
                                            {{ $university->user->phone }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                    $city_ary = json_decode($university->city,true);
                                @endphp
                                <div class="col-6">
                                    <p class="university-content">
                                        City:
                                        @if($university->city)
                                            {{ $city_ary[0] }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="university-content">
                                        Uni Email: {{ $university->email }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address-university">
                    <div class="row">
                        <div class="col-sm-9">

                        </div>
                        <div class="col-sm-3 text-right">
                            <button class="btn btn-info send_msg" @if($school->state == 0 || Auth::user()->state == 0) disabled @endif>Send message</button>
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
        {{--<div class="table-wrapper">--}}
            {{--<table id="datatable1" class="table display responsive nowrap">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th class="wd-15p">ID</th>--}}
                    {{--<th class="wd-15p">University Name</th>--}}
                    {{--<th class="wd-15p">Contact Name</th>--}}
                    {{--<th class="wd-15p">Contact Phone</th>--}}
                    {{--<th class="wd-15p">City</th>--}}
                    {{--<th class="wd-15p">Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                    {{--@foreach ($univ_lists as $univ)--}}
                        {{--<tr>--}}
                            {{--<td>{{ $univ->id }}</td>--}}
                            {{--<td>{{ $univ->name }}</td>--}}
                            {{--<td>{{ $univ->user_id }}</td>--}}
                            {{--<td>{{ $univ->phone }}</td>--}}
                            {{--<td>city</td>--}}
                            {{--<td><a><button class="btn btn-info send_msg">Send message</button></a></td>--}}
                                {{----}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}

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

            $(".send_msg").click(function() {
                alert("send message to university");
            });

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endsection