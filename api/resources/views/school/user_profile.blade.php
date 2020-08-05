@extends('layouts.main')
<?php

//dd($schools);exit;
?>
@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        .user-image{
            border-radius: 50%!important;
        }
        .error{
            color:red;
        }
    </style>
@endsection

@section('left-menu')
    @include('school.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('school.fairs_list') }}">Home</a>
        <span class="breadcrumb-item active">User Profile</span>
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
            <h5>Edit User Profile</h5>
        </div><!-- sl-page-title -->

        <div class="card mg-t-50">
            <form class="form-prevent-multiple-submits" role="form" enctype="multipart/form-data" action="{{ route('school.user_update',['id' => $user->id])}}" method="post" >
                @csrf
                <div class="row col-lg-12">
                    <div class="col-lg-2">
                        <div class="card pd-20 pd-sm-40">
                            <div class="card bd-0">
                                <img class="card-img-top img-fluid user-image" id="image_upload" @if($user->logo) src="{{asset('images/user/'.$user->logo)}}" @else src="{{asset('images/user/user.png')}}" @endif alt="Image" >
                                <input hidden type="file" id="my_file" name="avatar"  accept=".png, .jpg, .jpeg" value="@if(isset($user->logo)){{$user->logo}}@endif"/>
                                <input type="hidden" id="user_logo" name="user_logo" value="@if(isset($user->logo)){{$user->logo}}@endif" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                        <div class="card pd-20 pd-sm-40">
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control m-input" name="name" placeholder="Contact Name" type="text" value="@if(isset($user->name)){{$user->name}}@endif">
                                    @if ($errors->has('name'))
                                        <span class="error" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control m-input" name="mobile" placeholder="Mobile Number" type="text" value="@if(isset($user->mobile)){{$user->mobile}}@endif">
                                    @if ($errors->has('mobile'))
                                        <span class="error" >
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control m-input" name="email" placeholder="Email" type="text" value="{{$user->email}}">
                                    @if ($errors->has('email'))
                                        <span class="error" >
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control m-input" name="phone" placeholder="Phone" type="text" value="@if(isset($user->phone)){{$user->phone}}@endif">
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control m-input" name="ext" placeholder="Ext" type="text" value="@if(isset($user->ext)){{$user->ext}}@endif">
                                    @if ($errors->has('ext'))
                                        <span class="error" >
                                        <strong>{{ $errors->first('ext') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control m-input" name="title" placeholder="Title" type="text" value="@if(isset($user->title)){{$user->title}}@endif">
                                    @if ($errors->has('title'))
                                        <span class="error" >
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                    <div class="row">
                        <div class="col-md-3 select-row">
                            <select class="form-control sel-uni-sch" id="uni_sch_check" name="uni_school_check" >
                                {{--<option value="1" @if($user->school_id == 0 && $user->university_id !=0) selected @endif>University</option>--}}
                                <option value="2" @if($user->university_id == 0 && $user->school_id !=0) selected @endif>School</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-1 select-row"></div>
                        <div class="col-md-4 select-row">
                            <div class="div-select ">
                                <select class="form-control sel-uni" id="sel_university" name="university_id" >
                                    <option value="none">Select University</option>
                                    @foreach($universities as $university)
                                        <option value="{{ $university->id }}" @if($user->university_id == $university->id) selected @endif > {{ $university->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="div-select ">
                                <select class="form-control sel-sch" id="sel-school" name="school_id" >
                                    <option value="none">Select School</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school->id }}" @if($user->school_id == $school->id) selected @endif > {{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <br>
                    </div>
                </div>

                <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                    <div class="card pd-20 pd-sm-40">
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4" style="text-align:center">
                                <button type="submit" class="btn btn-success">Update Record</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
        $( document ).ready(function() {
            var check = $('.sel-uni-sch').val();
            console.log(check);
            if(check == 2){
                $('#sel_university').select2().parent().hide();
                $("#sel-school").select2().parent().show();
            }
            else{
                $("#sel-school").select2().parent().hide();
                $('#sel_university').select2().parent().show();
            }
        });
        $("#image_upload").click(function() {
            $("input[id='my_file']").click();
        });

        $(function(){
            $('#my_file').change(function(){
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image_upload').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $('#user_logo').val(null);
                }
                else
                {
                    $('#image_upload').attr('src', '/images/user/user.png');
                }
            });
        });

        $('#uni_sch_check').change(function () {
            var id = $('#uni_sch_check').val();

            if(id == 2){
                $('.sel-uni').select();
                $('#sel_university').select2().parent().hide();
                $("#sel-school").select2().parent().show();
                $('.sel-sch').select2();
            }
            else{
                $('.sel-sch').select();
                $("#sel-school").select2().parent().hide();
                $('#sel_university').select2().parent().show();
                $('.sel-uni').select2();
            }
        });


        $(function(){
            'use strict';

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endsection
