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
        <span class="breadcrumb-item active">Counselors List</span>
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
        <h5>Counselors List</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">

        <div class="card mg-t-50">
            <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('school.update_counselor',['id'=>Auth::user()->school_id]) }}" method="post">
                @csrf

            
                <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                    <div class="card pd-10 pd-sm-40" id="add-article-area">
                        @if(isset($counselor[0]->full_name))
                            @php
                                $full_name_ary = json_decode($counselor[0]->full_name,true);
                                $mobile_ary = json_decode($counselor[0]->mobile,true);
                                $email_ary = json_decode($counselor[0]->email,true);
                            @endphp
                            @foreach ($full_name_ary as $key => $full_name)
                                <div class="add-article-row row mg-t-10" id="added-row-{{$key}}">
                                    <div class="col-lg">
                                        <input class="form-control @error('full_name') is-invalid @enderror" name="full_name[]" placeholder="Full Name" type="text" value="{{ $full_name_ary[$key] }}">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control @error('mobile') is-invalid @enderror" name="mobile[]" placeholder="Mobile Number" type="text" value="{{ $mobile_ary[$key] }}">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email[]" placeholder="Email" type="text" value="{{ $email_ary[$key] }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-lg">
                                        <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                        <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-{{$key}}" style="font-size:30px;color:red;" ></i>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="add-article-row row" id="added-row-0">
                                <div class="col-lg">
                                    <input class="form-control @error('full_name') is-invalid @enderror" name="full_name[]" placeholder="Counselor Full Name" type="text">
                                    @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-lg">
                                    <input class="form-control @error('mobile') is-invalid @enderror" name="mobile[]" placeholder="Mobile Number" type="text">
                                    @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="col-lg">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email[]" placeholder="Email" type="text">
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                
                                <div class="col-lg">
                                    <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                    <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-0" style="font-size:30px;color:red;" ></i>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                        <div class="card pd-20 pd-sm-40">
                            <div class="row">
                                <div class="col-lg">
                                </div>
                                <div class="col-lg">
                                </div>
                                <div class="col-lg" style="text-align:center">
                                    <button type="submit" class="btn btn-success" @if($school->state == 0 || Auth::user()->state == 0) disabled @endif>Update Record</button>
                                </div>
                                <div class="col-lg" style="text-align:center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        
        

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
            var addedRow = 0;

            $(document).on('click', '.add-article-row-btn', function(){
                addedRow++;
                var temp=0;
                $(".add-article-row").each(function(index, value){
                    temp++;
                });

                var attHtml = `<div class="add-article-row row mg-t-10" id='added-row-`+temp+`'>
                                    <div class="col-lg">
                                        <input class="form-control @error('full_name') is-invalid @enderror" name="full_name[]" placeholder="Counselor Full Name" type="text">
                                        @error('full_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control @error('mobile') is-invalid @enderror" name="mobile[]" placeholder="Mobile_number" type="text">
                                        @error('mobile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email[]" placeholder="Email" type="text">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                        <div class="col-lg">
                                            <i class='fa fa-plus-circle add-article-row-btn' style='font-size:30px;color:green;' ></i>
                                            <i class='fa fa-minus-circle remove-article-row-btn' attr-id='added-row-`+temp+`' style='font-size:30px;color:red;' ></i>
                                        </div>
                                    </div>
                                </div>`;

                $('#add-article-area').append(attHtml);
            });

            $(document).on('click', '.remove-article-row-btn', function(){
                var selector = "#add-article-area #" + $(this).attr('attr-id');
                $(selector).remove();
            });

            

        });
    </script>
@endsection