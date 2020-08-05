@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        @media (max-width: 1600px) {
            .school-logo{
                padding-top: 30px;
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
        <span class="breadcrumb-item active">School Profile</span>
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
            <h5>Edit School profile</h5>
        </div><!-- sl-page-title -->
        <div class="card mg-t-50">
            <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('school.edit_profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row col-lg-12">
                    <div class="col-lg-2">
                        <div class="card pd-20 pd-sm-40">
                            <div class="card bd-0">
                                <img class="card-img-top img-fluid school-logo" id="image_upload" @if($school->logo) src="{{asset('images/school/'.$school->logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image" >

                                <input hidden type="file" id="my_file" name="avatar"  accept=".png, .jpg, .jpeg" value = "{{old('avatar', $school->logo)  }}"/>
                                <input type="hidden" id="school_logo" name="school_logo" value="@if(isset($school->logo)){{ $school->logo}} @endif">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $school->user_id }}">
                    <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                        <div class="card pd-20 pd-sm-40">
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control @error('school_name') is-invalid @enderror" name="school_name" placeholder="School Name" type="text" value="@if(isset($school->name)){{$school->name}}@endif">
                                    @error('school_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" type="text" value="@if(isset($school->phone)){{$school->phone}}@endif">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="text" value="@if(isset($school->email)){{$school->email}}@endif">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Web Site" type="text" value="@if(isset($school->website)){{$school->website}}@endif">
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control " name="map_link" placeholder="Google map Link" type="text" value="@if(isset($school->map_link)){{$school->map_link}}@endif">

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control " type="text" name="latitude" value="{{ old('latitude',$school->latitude) }}" placeholder="Enter school latitude">

                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control " type="text" name="longitude" value="{{old('longitude',$school->longitude) }}" placeholder="Enter school longitude">

                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $compus_ary = json_decode($school->compus,true);
                    $country_ary = json_decode($school->country,true);
                    $city_ary = json_decode($school->city,true);
                    $address_ary = json_decode($school->address1,true);
                    $address_users = json_decode($school->users,true);
                    $address_emails = json_decode($school->emails,true);
                    @endphp
                    <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                        <div class="card pd-10 pd-sm-40" id="add-article-area">
                            @if(isset($compus_ary))
                                <div class="add-article-row row mg-t-10" id="added-row-0">
                                    <div class="col-lg">
                                        <input class="form-control" name="compus[]" placeholder="Compus" type="text" value="{{$compus_ary[0]}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="country[]" placeholder="Country" type="text" value="{{$country_ary[0]}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="city[]" placeholder="City" type="text" value="{{$city_ary[0]}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="address[]" placeholder="Address" type="text" value="{{$address_ary[0]}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="users[]" placeholder="User Name" type="text" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="emails[]" placeholder="Email" type="text" value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="col-lg">
                                        <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                        <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-0" style="font-size:30px;color:red;" ></i>
                                    </div>
                                </div>
                                @foreach ($compus_ary as $key => $compus)
                                    @if($key > 0)
                                        <div class="add-article-row row mg-t-10" id="added-row-{{$key}}">
                                            <div class="col-lg">
                                                <input class="form-control" name="compus[]" placeholder="Compus" type="text" value="{{ $compus_ary[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <input class="form-control" name="country[]" placeholder="Country" type="text" value="{{ $country_ary[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <input class="form-control" name="city[]" placeholder="City" type="text" value="{{ $city_ary[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <input class="form-control" name="address[]" placeholder="Address" type="text" value="{{ $address_ary[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <input class="form-control" name="users[]" placeholder="User Name" type="text" value="{{ $address_users[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <input class="form-control" name="emails[]" placeholder="Email" type="text" value="{{ $address_emails[$key] }}">
                                            </div>
                                            <div class="col-lg">
                                                <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                                <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-{{$key}}" style="font-size:30px;color:red;" ></i>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="add-article-row row" id="added-row-0">
                                    <div class="col-lg">
                                        <input class="form-control" name="compus[]" placeholder="Compus" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="country[]" placeholder="Country" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="city[]" placeholder="City" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="address[]" placeholder="Address" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="users[]" placeholder="User Name" type="text" value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="emails[]" placeholder="Email" type="text" value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="col-lg">
                                        <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                        <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-0" style="font-size:30px;color:red;" ></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 ">
                        <div class="row add-article-row" style="width:95%; margin:auto;">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-control-label">Curriculum: </label>
                                        <select class="form-control sel-curr " id="sel_curr" name="curriculum" >
                                            @foreach($curricula as $curriculum)
                                                <option value="{{$curriculum->id}}" @if($school->curriculum && $school->curriculum->id == $curriculum->id) selected @endif>{{$curriculum->label}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control n-grade-1 @error('number_grade12') is-invalid @enderror" name="number_grade12" placeholder="G12 Students" value="@if(isset($school->number_grade12)){{$school->number_grade12}}@endif">
                                @error('number_grade12')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control n-grade-2 @error('number_grade11') is-invalid @enderror" name="number_grade11" placeholder="G11 Students" value="@if(isset($school->number_grade11)){{$school->number_grade11}}@endif">
                                @error('number_grade11')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- row -->

                    </div>
                    <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 ">
                        <div class="row add-article-row" style="width:95%; margin:auto;">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control grade-1 @error('fees_grade11') is-invalid @enderror" name="fees_grade12" placeholder="G12 Fees" value="@if(isset($school->fees_grade12)){{$school->fees_grade12}}@endif">
                                @error('fees_grade11')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control grade-2 @error('fees_grade11') is-invalid @enderror" name="fees_grade11" placeholder="G11 Fees" value="@if(isset($school->fees_grade11)){{$school->fees_grade11}}@endif">
                                @error('fees_grade11')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- row -->

                    </div>
                </div>


                <div class="card mg-t-20 pd-20 pd-sm-40">
                    <div class="form-layout">

                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">About us: </label>
                                    <textarea id="about_us" class="form-control " name="about_us">
                                        {{ old('about_us',$school->about_us) }}
                                    </textarea>
                                </div>
                            </div><!-- col-12 -->
                        </div><!-- row -->


                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5 button-prevent-multiple-submits">Submit</button>
                            <a class="btn btn-secondary" href="{{ route('school.fairs_list') }}">Cancel</a>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->

                </div><!-- card -->
            </form>
        </div>
    </div><!-- sl-pagebody -->
@endsection

@section('vendor-js')
    <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('js/submit.js') }}"></script>
    <script>

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
                    };
                    reader.readAsDataURL(input.files[0]);
                    $('#school_logo').val(null);
                }
                else
                {
                    $('#image_upload').attr('src', '/images/school/school.png');
                }
            });

        });

        $('#sel_curr').change(function () {
            var curriculum_id = $('#sel_curr').val();

            if(curriculum_id==2){
                $('.grade-1').attr("placeholder", "Year 13 Fees");
                $('.grade-2').attr("placeholder", "Year 12 Fees");
                $('.n-grade-1').attr("placeholder", "Year 12 Students");
                $('.n-grade-2').attr("placeholder", "Year 13 Students");
            }
            else{
                $('.grade-1').attr("placeholder", "G12 Fees");
                $('.grade-2').attr("placeholder", "G11 Fees");
                $('.n-grade-1').attr("placeholder", "G12 Students");
                $('.n-grade-2').attr("placeholder", "G11 Students");
            }

        });

        $(function(){
            'use strict';

            $('#about_us').summernote({
                height: 150
            });

            $('#full_profile').summernote({
                height: 150
            });
            $('.sel-curr').select2({
                minimumResultsForSearch: Infinity
            });

            $(document).on('click', '.add-article-row-btn', function(){
                addedRow++;
                var temp=0;
                $(".add-article-row").each(function(index, value){
                    temp++;
                });

                var attHtml = `<div class="add-article-row row mg-t-10" id='added-row-`+temp+`'>
                                    <div class="col-lg">
                                        <input class="form-control" name="compus[]" placeholder="Compus" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="country[]" placeholder="Country" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="city[]" placeholder="City" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="address[]" placeholder="Address" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="users[]" placeholder="User Name" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="emails[]" placeholder="Address" type="text">
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