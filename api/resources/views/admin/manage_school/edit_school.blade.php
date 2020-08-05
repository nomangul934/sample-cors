@extends('layouts.main')
<?php
    
?>
@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <style>
        .university-logo{
            border-radius: 50%!important;
        }
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
            .link-btn-1{
                text-align: right;
            }
            .uni-bottom{
                border-right: #e0e0e0 solid 1px;
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
        <span class="breadcrumb-item active">View & Edit School</span>
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
        <h5>View & Edit School</h5>
    </div><!-- sl-page-title -->

    <div class="card mg-t-50">
        <form class="form-prevent-multiple-submits" role="form" enctype="multipart/form-data" action="{{ route('admin.update_school',['id'=>$school->id]) }}" method="post" >
            @csrf
            <div class="row col-lg-12">
                <div class="col-lg-2">
                    <div class="card pd-20 pd-sm-40">
                        <div class="card bd-0">
                            <img class="card-img-top img-fluid" id="image_upload" @if($school->logo) src="{{asset('images/school/'.$school->logo)}}" @else src="{{asset('images/school/school.png')}}" @endif alt="Image" >

                            <input hidden type="file" id="my_file" name="avatar"  accept=".png, .jpg, .jpeg" value = "{{old('avatar', $school->logo)  }}"/>
                            <input type="hidden" id="school_logo" name="school-logo" value="@if(isset($school->logo)){{ $school->logo}} @endif">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="@if(isset($user)&& !empty($user)){{ $user->id }}@endif">
                <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                    <div class="card pd-20 pd-sm-40">
                        <div class="row">
                            <div class="col-lg">
                                <input class="form-control @error('school_name') is-invalid @enderror" name="school_name" placeholder="School Name" type="text" value="@if(isset($school->name)){{ $school->name}} @endif">
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
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" type="text" value="@if(isset($school->phone)){{ $school->phone}} @endif">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="text" value="@if(isset($school->email)){{ $school->email}} @endif">
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
                                <input class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Web Site" type="text" value="@if(isset($school->website)){{ $school->website}} @endif">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('map_link') is-invalid @enderror" name="map_link" placeholder="Google map Link" type="text" value="@if(isset($school->map_link)){{ $school->map_link}} @endif">
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
                    $compus_ary = json_decode($school->compus,true);
                    $country_ary = json_decode($school->country,true);
                    $city_ary = json_decode($school->city,true);
                    $address_ary = json_decode($school->address1,true);
                    $user_ary = json_decode($school->users,true);
                    $email_ary = json_decode($school->emails,true);
                @endphp
                <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                    <div class="card pd-10 pd-sm-40" id="add-article-area">
                        @if(isset($compus_ary)&&!empty($compus_ary))
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
                                    <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if(isset($user)&& !empty($user)){{$user->name}}@endif">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="emails[]" placeholder="Email" type="text" value="@if(isset($user)&& !empty($user)){{$user->email}}@endif">
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
                                            <input class="form-control" name="compus[]" placeholder="Compus" type="text" value="{{$compus_ary[$key]}}">
                                        </div>
                                        <div class="col-lg">
                                            <input class="form-control" name="country[]" placeholder="Country" type="text" value="{{$country_ary[$key]}}">
                                        </div>
                                        <div class="col-lg">
                                            <input class="form-control" name="city[]" placeholder="City" type="text" value="{{$city_ary[$key]}}">
                                        </div>
                                        <div class="col-lg">
                                            <input class="form-control" name="address[]" placeholder="Address" type="text" value="{{$address_ary[$key]}}">
                                        </div>
                                        <div class="col-lg">
                                            <input class="form-control" name="users[]" placeholder="User Name" type="text" value="{{$user_ary[$key]}}">
                                        </div>
                                        <div class="col-lg">
                                            <input class="form-control" name="emails[]" placeholder="Email" type="text" value="{{$email_ary[$key]}}">
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
                                    <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if(isset($user)&& !empty($user)){{$user->name}}@endif">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="emails[]" placeholder="Email" type="text" value="@if(isset($user)&& !empty($user)){{$user->email}}@endif">
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
                </div><!-- form-layout -->

            </div>


            
            <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                <div class="card pd-20 pd-sm-40">
                    <div class="row">
                        <div class="col-lg">
                        </div>
                        <div class="col-lg">
                        </div>
                        <div class="col-lg" style="text-align:center">
                            <button type="submit" class="btn btn-success">Add or Update Record</button>
                        </div>
                        <div class="col-lg" style="text-align:center">
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
        </form>
    </div>
    <div class="row row-sm mg-t-50">
        
    </div>
    <br>
                    
    <div class="sl-page-title">
        <h5>Contact Person</h5>
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <div class="university">
            <div class="alone-university">
                <div class="row content-txt">
                    <div class="col-lg-2 col-md-3 img-tag">
                        <div class="card pd-sm-25" style="align-items: center;">
                            <img class="card-img-top img-fluid university-logo wd-100"  @if(!empty($school->user) && isset($school->user[0]->logo) && $school->user[0]->logo) src="{{ asset('/images/user/' . $school->user[0]->logo)}}"  @else src="{{ asset('/images/user/user.png') }}" @endif alt="Image">

                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <div class="row content-txt">
                            <div class="col-9 text-left">
                                <p class="university-content">
                                    Contact Name:
                                    @if(!empty($school->user) && isset($school->user[0]->name) && $school->user[0]->name)
                                        {{ $school->user[0]->name }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-3 text-right">
                                <p class="university-content">
                                    ID:
                                    @if(!empty($school->user) && isset($school->user[0]->id) && $school->user[0]->id)
                                        {{ $school->user[0]->id }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row content-txt">
                            <div class="col-6">
                                <p class="university-content">
                                    Contact Email:
                                    @if(!empty($school->user) && isset($school->user[0]->email) && $school->user[0]->email)
                                        {{ $school->user[0]->email }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="university-content">
                                    Mobile Number:
                                    @if(!empty($school->user) && isset($school->user[0]->mobile) && $school->user[0]->mobile)
                                        {{ $school->user[0]->mobile }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="university-content">
                                    Title:
                                    @if(!empty($school->user) && isset($school->user[0]->title) && $school->user[0]->title)
                                        {{ $school->user[0]->title }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="university-content">
                                    Contact Phone:
                                    @if(!empty($school->user) && isset($school->user[0]->phone) && $school->user[0]->phone)
                                        {{ $school->user[0]->phone }}
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
                    <div class="col-sm-2 col-xl-1">
                        <a target="_blank" href="{{$school->website}}" >
                            <p class="university-content uni-bottom">
                                <span>
                                    <i class="fa fa-external-link"></i>
                                </span>
                            </p>
                        </a>
                    </div>
                    <div class="col-sm-5 col-xl-7 text-right">
                        {{--<a href="{{ route('admin.edit_school', ['id' => $school->id]) }}"><button class="btn btn-info">view</button></a>--}}
                    </div>
                    <div class="col-sm-2 col-xl-2 text-right">
                        @if(!empty($school->user) && $school->user[0]->state == 1)
                            <a class="btn btn-danger wd-80" href="{{ url('/admin/school/user/suspend/' . $school->user[0]->id)}}">
                                Suspend
                            </a>
                        @else
                            <a class="btn btn-danger wd-80" style="background-color:#1caf9a;" href="{{url('/admin/school/user/unsuspend/' . $school->user[0]->id)}}">
                                Unsuspe
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    
</div>
@endsection

@section('vendor-js')
        <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
        <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('custom-js')
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

//        function readURL(input, id) {
//            id = id || '#blah';
//            if (input.files &amp;&amp; input.files[0]) {
//                var reader = new FileReader();
//
//                reader.onload = function (e) {
//                    $(id)
//                        .attr('src', e.target.result)
//                        .width(200)
//                        .height(150);
//                };
//
//                reader.readAsDataURL(input.files[0]);
//            }
//        }
        $(function(){
            'use strict';
            var addedRow = 0;

            $('#about_us').summernote({
                height: 150
            });
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
