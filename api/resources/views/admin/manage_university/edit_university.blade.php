@extends('layouts.main')
<?php
    
?>
@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        .col-form-label{
            font-size:16px!important;
        }
        .div-colum{
            display: flex;
        }
        @media (max-width: 1400px) {
            .col-form-label{
                font-size:14px!important;
            }
        }
        @media (min-width: 860px) {
            .div-nav{
                text-align: right;
            }

        }
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
    @include('admin.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">View & Edit University</span>
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
        <h5>View & Edit University</h5>
    </div><!-- sl-page-title -->
    <style>
        .ckbox span:after {
            top: 1px;
            left: 0;
            width: 16px;
            height: 16px;
            content: '\f00c';
            font-family: 'FontAwesome';
            font-size: 30px;
            text-align: center;
            color: #23bf08;
            background-color: #e9ecef;
            line-height: 17px;
            display: none;
        }
    </style>
    <div class="card mg-t-50">
        <form class="form-prevent-multiple-submits" autocomplete="off" enctype="multipart/form-data" action="{{ route('admin.update_univ',['id'=>$university->id]) }}" method="post">
            @csrf
            <div class="row col-lg-12">
                <div class="col-lg-2">
                    <div class="card pd-20 pd-sm-40">
                        <div class="card bd-0">
                            <img class="card-img-top img-fluid" id="image_upload" @if($university->logo) src="{{asset('images/university/'.$university->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >

                            <input hidden type="file" id="my_file" name="avatar"  accept=".png, .jpg, .jpeg" value = "{{old('avatar', $university->logo)  }}"/>
                            <input type="hidden" id="school_logo" name="university_logo" value="@if(isset($university->logo)){{ $university->logo}} @endif">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                    <div class="card pd-20 pd-sm-40">
                        <div class="row">
                            <div class="col-lg">
                                <input class="form-control @error('univ_name') is-invalid @enderror" name="univ_name" placeholder="University Name" type="text" value="@if(isset($university->name)){{ $university->name}} @endif">
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
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" type="text" value="@if(isset($university->phone)){{ $university->phone}} @endif">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="text" value="@if(isset($university->email)){{$university->email}}@endif">
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
                                <input class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Web Site" type="text" value="@if(isset($university->website)){{$university->website}}@endif">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('map_link') is-invalid @enderror" name="map_link" placeholder="Google map Link" type="text" value="@if(isset($university->map_link)){{$university->map_link}}@endif">
                                @error('map_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                    <div class="card pd-10 pd-sm-40">
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="col-form-label">
                                    Accredited
                                </label>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control sel-accredited" name="accredited">
                                    <option value="none">Select</option>
                                    <option value="1" @if($university->accredited==1)selected @endif>Yes</option>
                                    <option value="0" @if($university->accredited==0)selected @endif>No</option>
                                </select>
                            </div>
                            <div class="col-lg-3 div-nav">
                                <div class="div-colum">
                                    <label class="col-form-label">
                                        School Credit:&nbsp;
                                    </label>
                                    <div class="wd-40p">
                                        <input type="text" class="form-control school_credit" name="school_credit" value="{{$university->school_fairs}}/{{$university->package->school_fairs}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 div-nav">
                                <div class="div-colum">
                                    <label class="col-form-label">
                                        School Activity:&nbsp;
                                    </label>
                                    <div class="wd-40p">
                                        <input type="text" class="form-control school_activity_1" name="school_activity" value="{{$university->school_activities}}/{{$university->package->school_activities}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <select class="form-control sel-package" id="sel_package" name="package">
                                    <option value="none">Assign Package</option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}" @if($package->id == $university->package_id) selected @endif>
                                            {{$package->package_name}}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="university_id" value="{{$university->id}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                    <div class="card pd-10 pd-sm-40" >
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Listing</th>
                                        <th class="wd-15p">Enhanced Listing</th>
                                        <th class="wd-15p">Lead Generation</th>
                                        <th class="wd-15p">School Fairs</th>
                                        <th class="wd-15p">School Activities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox" class="listing" name="listing" @if($university->package->listing == 1) checked @endif disabled>
                                                <span style=""></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox" class="enhanced_listing" name="enhanced_listing" @if($university->package->enhanced_listing == 1) checked @endif disabled>
                                                <span style=""></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="ckbox">
                                                <input type="checkbox" class="lead_generation" name="lead_generation" @if($university->package->lead_generation == 1) checked @endif disabled>
                                                <span style=""></span>
                                            </label>
                                        </td>
                                        <td>
                                            <input class="form-control school_fair" name="school_fairs" placeholder="Input box" type="text" value="{{$university->school_fairs}}/@if($university->package->school_fairs){{$university->package->school_fairs}}@endif" disabled>
                                        </td>
                                        <td>
                                            <input class="form-control school_activity" name="school_activities" placeholder="Input box" type="text" value="{{$university->school_activities}}/@if($university->package->school_activities){{$university->package->school_activities}}@endif" disabled>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Email Marketing</th>
                                        <th class="wd-15p">Marketing Support</th>
                                        <th class="wd-15p">Digital Media Promotion</th>
                                        <th class="wd-15p">Digital Media Promotion Weeks</th>
                                        <th class="wd-15p">SMS Marketing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-control email_marketing" name="email_marketing" placeholder="Input box" type="text" value="{{$university->email_marketing}}/@if($university->package->email_marketing){{$university->package->email_marketing}}@endif" >
                                        </td>
                                        <td>
                                            <input class="form-control marketing_support" name="marketing_support" placeholder="Input box" type="text" value="{{$university->marketing_support}}/@if($university->package->marketing_support){{$university->package->marketing_support}}@endif" >
                                        </td>
                                        <td>
                                            <input class="form-control digital_media_promotion" name="digital_media_promotion" placeholder="Input box" type="text" value="{{$university->digital_media_promotion}}/@if($university->package->digital_media_promotion){{$university->package->digital_media_promotion}}@endif" >
                                        </td>
                                        <td>
                                            <input class="form-control digital_media_promotion_weekly" name="digital_media_promotion_weekly" placeholder="Input box" type="text" value="{{$university->digital_media_promotion_weekly}}/@if($university->package->digital_media_promotion_weekly){{$university->package->digital_media_promotion_weekly}}@endif" >
                                        </td>
                                        <td>
                                            <input class="form-control SMS_marketing" name="SMS_marketing" placeholder="Input box" type="text" value="{{$university->SMS_marketing}}/@if($university->package->SMS_marketing){{$university->package->SMS_marketing}}@endif" >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @php
                    $compus_ary = json_decode($university->compus,true);
                    $country_ary = json_decode($university->country,true);
                    $city_ary = json_decode($university->city,true);
                    $address_ary = json_decode($university->address,true);
                    $address_users = json_decode($university->users,true);
                    $address_emails = json_decode($university->emails,true);
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
                                    <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if($user->name){{$user->name}}@endif">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="emails[]" placeholder="User Email" type="text" value="@if($user->email){{$user->email}}@endif">
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
                                    <input class="form-control" name="users[]" placeholder="User Name" type="text" value="@if($user->name){{$user->name}}@endif">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="emails[]" placeholder="Email" type="text" value="@if($user->email){{$user->email}}@endif">
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

            
            <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                <div class="card pd-20 pd-sm-40">
                    <div class="row">
                        <div class="col-lg">
                        </div>
                        <div class="col-lg">
                        </div>
                        <div class="col-lg" style="text-align:center">
                            <button type="submit" class="btn btn-success">Update Record</button>
                        </div>
                        <div class="col-lg" style="text-align:center">
                            @if($university->state == 0)
                                <a class=" btn btn-danger wd-80" style="background-color:#1caf9a;" href="{{url('/admin/suspend1/' .$university->id)}}">
                                    Unsuspe
                                </a>
                            @else
                                <a class=" btn btn-danger wd-80" href="{{url('/admin/suspend2/'.$university->id)}}">
                                    Suspend
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
                            <img class="card-img-top img-fluid university-logo wd-100"  @if(!empty($university->user) && isset($university->user[0]->logo) && $university->user[0]->logo) src="{{ asset('/images/user/' . $university->user[0]->logo)}}"  @else src="{{ asset('/images/user/user.png') }}" @endif alt="Image">

                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <div class="row content-txt">
                            <div class="col-9 text-left">
                                <p class="university-content">
                                    Contact Name:
                                    @if(!empty($university->user) && isset($university->user[0]->name) && $university->user[0]->name)
                                        {{ $university->user[0]->name }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-3 text-right">
                                <p class="university-content">
                                    ID:
                                    @if(!empty($university->user) && isset($university->user[0]->id) && $university->user[0]->id)
                                        {{ $university->user[0]->id }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row content-txt">
                            <div class="col-6">
                                <p class="university-content">
                                    Contact Email:
                                    @if(!empty($university->user) && isset($university->user[0]->email) && $university->user[0]->email)
                                        {{ $university->user[0]->email }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="university-content">
                                    Mobile Number:
                                    @if(!empty($university->user) && isset($university->user[0]->mobile) && $university->user[0]->mobile)
                                        {{ $university->user[0]->mobile }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="university-content">
                                    Title:
                                    @if(!empty($university->user) && isset($university->user[0]->title) && $university->user[0]->title)
                                        {{ $university->user[0]->title }}
                                    @endif
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="university-content">
                                    Contact Phone:
                                    @if(!empty($university->user) && isset($university->user[0]->phone) && $university->user[0]->phone)
                                        {{ $university->user[0]->phone }}
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
                    $city_ary = json_decode($university->city,true);
                    @endphp
                    <div class="col-sm-3 col-xl-2 uni-bottom">
                        <p class="university-content">
                            City: {{ $city_ary[0] }}
                        </p>
                    </div>
                    <div class="col-sm-2 col-xl-1">
                        {{--<a target="_blank" href="{{$university->website}}" >--}}
                            {{--<p class="university-content uni-bottom">--}}
                                {{--<span>--}}
                                    {{--<i class="fa fa-external-link"></i>--}}
                                {{--</span>--}}
                            {{--</p>--}}
                        {{--</a>--}}
                    </div>
                    <div class="col-sm-5 col-xl-7 text-right">
                        {{--<a href="{{ route('admin.edit_school', ['id' => $school->id]) }}"><button class="btn btn-info">view</button></a>--}}
                    </div>
                    <div class="col-sm-2 col-xl-2 text-right">
                        @if(!empty($university->user) && $university->user[0]->state == 1)
                            <a class="btn btn-danger wd-80" href="{{ url('/admin/university/user/suspend/' . $university->user[0]->id)}}">
                                Suspend
                            </a>
                        @else
                            <a class="btn btn-danger wd-80" style="background-color:#1caf9a;" href="{{url('/admin/university/user/unsuspend/' . $university->user[0]->id)}}">
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
@endsection

@section('custom-js')
    <script>
        $('#sel_package').change(function(){
            var id = $('#sel_package').val();
            var university_id = $('#university_id').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ url("/admin/university/package") }}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, package_id:id, university_id: university_id },
                dataType: 'JSON',
                success: function (data) {
                    var school_fair = data.university['school_fairs'] + '/' + data.package['school_fairs'];
                    var school_activity =data.university['school_activities']  + '/' + data.package['school_activities'];
                    var email_marketing =data.university['email_marketing'] + '/' + data.package['email_marketing'];
                    var marketing_support = data.university['marketing_support'] + '/' + data.package['marketing_support'];
                    var digital_media_promotion =data.university['digital_media_promotion'] + '/' + data.package['digital_media_promotion'];
                    var digital_media_promotion_weekly =data.university['digital_media_promotion_weekly'] + '/' + data.package['digital_media_promotion_weekly'];
                    var SMS_marketing =data.university['SMS_marketing'] + '/' + data.package['SMS_marketing'];

                    if(data.package['listing'] == 1){
                        $('.listing').prop('checked',true);
                    }
                    else{
                        $('.listing').prop('checked',false);
                    }
                    if(data.package['enhanced_listing'] == 1){
                        $('.enhanced_listing').prop('checked',true);
                    }
                    else{
                        $('.enhanced_listing').prop('checked',false);
                    }
                    if(data.package['lead_generation'] == 1){
                        $('.lead_generation').prop('checked',true);
                    }
                    else{
                        $('.lead_generation').prop('checked',false);
                    }
                    $('.school_fair').val(school_fair);
                    $('.school_activity').val(school_activity);
                    $('.email_marketing').val(email_marketing);
                    $('.marketing_support').val(marketing_support);
                    $('.digital_media_promotion').val(digital_media_promotion);
                    $('.digital_media_promotion_weekly').val(digital_media_promotion_weekly);
                    $('.SMS_marketing').val(SMS_marketing);
                    $('.school_credit').val(school_fair);
                    $('.school_activity_1').val(school_activity);

                }
            });
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

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2

            $('.sel-accredited').select2({ minimumResultsForSearch: Infinity });
            $('.sel-package').select2({ minimumResultsForSearch: Infinity });

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
                                `;


                $('#add-article-area').append(attHtml);
            });

            $(document).on('click', '.remove-article-row-btn', function(){
                var selector = "#add-article-area #" + $(this).attr('attr-id');
                $(selector).remove();
            });

        });
    </script>
@endsection
