@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/jquery-timepicker/jquery-timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <style>

        .university{
            width:99.4%;
            margin:auto;
            border: #e0e0e0 solid 1px;
            margin-bottom:40px;
        }
        @media (min-width: 860px) {
            .img-tag{
                border-right: #e0e0e0 solid 1px;
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
            border-bottom: #e0e0e0 solid 1px;
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
    @include('school.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('school.fairs_list') }}">Home</a>
        <span class="breadcrumb-item active">Edit Fair</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Edit Fair</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('school.update_fair', ['id' => $fair->id]) }}" method="post">
                @csrf
                @include('school.fair.form')
            </form>
        </div><!-- card -->
        <br>
        <div class="sl-page-title">
            <h5>Accepted University</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            @if(count($universities)>0)
                @foreach($universities as $university)
                    <div class="university">
                        <div class="alone-university">
                            <div class="row content-txt">
                                <div class="col-lg-2 col-md-3 img-tag">
                                    <div class="card  pd-sm-25" style="align-items: center;">
                                        <img class="card-img-top img-fluid university-logo wd-100" id="image_upload" @if($university->logo) src="{{asset('images/university/'.$university->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >
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
                                                @if(isset($university->user[0]->name) && $university->user[0]->name)
                                                    {{ $university->user[0]->name}}
                                                @endif

                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="university-content">
                                                Contact Phone:
                                                @if(isset($university->user[0]->phone) && $university->user[0]->phone)
                                                    {{ $university->user[0]->phone }}
                                                @endif

                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <p class="university-content">
                                                Contact Email:
                                                @if(isset($university->user[0]->email) && $university->user[0]->email)
                                                    {{ $university->user[0]->email }}
                                                @endif

                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <p class="university-content">
                                                Uni Email: {{ $university->email}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="address-university">
                            <div class="row">
                                @php
                                $city_ary = json_decode($university->city,true);
                                @endphp
                                <div class="col-sm-9">
                                    <p class="university-content">
                                        City:
                                        @if($university->city)
                                            {{ $city_ary[0] }}
                                        @endif
                                    </p>
                                </div>
                                {{--<div class="col-sm-3 text-right">--}}
                                {{--<button class="btn btn-info send_msg" @if($school->state == 0 || Auth::user()->state == 0) disabled @endif>Send message</button>--}}
                                {{--</div>--}}
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
            @else
                <div class="text-center">
                    <h1>Accepted University don't exist!</h1>
                </div>
            @endif

        </div>

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