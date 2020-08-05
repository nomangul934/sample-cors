@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        @media (max-width: 1600px) {
            .university-logo{
                padding-top: 30px;
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
        <span class="breadcrumb-item active">Profile</span>
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
            <h5>Edit University profile</h5>
        </div><!-- sl-page-title -->

        <div class="card mg-t-50">
            <form class="form-prevent-multiple-submits" autocomplete="off"  enctype="multipart/form-data" action="{{ route('university.edit_profile') }}" method="post">
                @csrf

                <div class="row col-lg-12">
                    <div class="col-lg-2">
                        <div class="card pd-20 pd-sm-40">
                            <div class="card bd-0">
                                <img class="card-img-top img-fluid university-logo" id="image_upload" @if($univ[0]->logo) src="{{asset('images/university/'.$univ[0]->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >

                                <input hidden type="file" id="my_file" name="avatar"  accept=".png, .jpg, .jpeg" value = "{{old('avatar', $univ[0]->logo)  }}"/>
                                <input type="hidden" id="university_logo" name="university_logo" value="@if(isset($univ[0]->logo)){{ $univ[0]->logo}} @endif">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{$university_user->id}}" >
                    <input type="hidden" name="university_id" value="{{$univ[0]->id}}" >
                    <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                        <div class="card pd-20 pd-sm-40">
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control @error('univ_name') is-invalid @enderror" name="univ_name" placeholder="University Name" type="text" value="@if(isset($univ[0]->name)){{ $univ[0]->name}} @endif">
                                    @error('univ_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" type="text" value="@if(isset($univ[0]->phone)){{ $univ[0]->phone}} @endif">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="text" value="@if(isset($univ[0]->email)){{ $univ[0]->email}} @endif">
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
                                    <input class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Web Site" type="text" value="@if(isset($univ[0]->website)){{ $univ[0]->website}} @endif">
                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <input class="form-control @error('map_link') is-invalid @enderror" name="map_link" placeholder="Google map Link" type="text" value="@if(isset($univ[0]->map_link)){{ $univ[0]->map_link}} @endif">
                                    @error('map_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $compus_ary = json_decode($univ[0]->compus,true);
                        $country_ary = json_decode($univ[0]->country,true);
                        $city_ary = json_decode($univ[0]->city,true);
                        $address_ary = json_decode($univ[0]->address,true);
                        $address_users = json_decode($univ[0]->users,true);
                        $address_emails = json_decode($univ[0]->emails,true);
                    @endphp
                    <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                        <div class="card pd-10 pd-sm-40" id="add-article-area">
                            @if(isset($compus_ary))
                                <div class="add-article-row row mg-t-10" id="added-row-0">
                                    <div class="col-lg">
                                        <input class="form-control" name="compus[]" placeholder="Compus" type="text" value="{{ $compus_ary[0] }}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="country[]" placeholder="Country" type="text" value="{{ $country_ary[0] }}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="city[]" placeholder="City" type="text" value="{{ $city_ary[0] }}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="address[]" placeholder="Address" type="text" value="{{ $address_ary[0] }}">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if($university_user->name){{$university_user->name}}@endif">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="emails[]" placeholder="User Email" type="text" value="@if($university_user->email){{$university_user->email}}@endif">
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
                                                <input class="form-control" name="emails[]" placeholder="User Email" type="text" value="{{ $address_emails[$key] }}">
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
                                        <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if($university_user->name){{$university_user->name}}@endif">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="emails[]" placeholder="Email" type="text"  value="@if($university_user->email){{$university_user->email}}@endif">
                                    </div>
                                    <div class="col-lg">
                                        <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                        <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-0" style="font-size:30px;color:red;" ></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-layout-footer mg-lg-t-0 mg-30" style="text-align:right;">
                    <button type="submit" class="btn btn-info mg-r-5 button-prevent-multiple-submits">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('university.invitations_list') }}">Cancel</a>
                </div><!-- form-layout-footer -->

            </form>
        </div>
    </div><!-- sl-pagebody -->
@endsection

@section('vendor-js')
    <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
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
                    $('#image_upload').attr('src', '/images/university/university.png');
                }
            });

        });

        $(function(){
            'use strict';
            var addedRow = 0;

            $('#full_profile').summernote({
                height: 150
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
                                        <input class="form-control" name="emails[]" placeholder="Email" type="text">
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