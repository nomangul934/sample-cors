@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('left-menu')
    @include('admin.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Manage Universities</span>
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
        <h5>Edit Subscripts</h5>
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
    <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('admin.save_packages')}}" method="post">
        @csrf
        <div class="card pd-20 pd-sm-40">
            <div class="row">
                <table class="table">
                    <tr>
                        <th class="wd-15p">Info</th>
                        @foreach($packages as $package)
                            <td class="wd-14p">{{$package->package_name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Listing</th>
                        @foreach($packages as $package)
                            <td>
                                <label class="ckbox">
                                    <input type="checkbox" name="listing_{{$package->id}}" @if($package->listing == 1) checked @endif>
                                    <span style=""></span>
                                </label>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Enhanced Listing</th>
                        @foreach($packages as $package)
                            <td>
                                <label class="ckbox">
                                    <input type="checkbox" name="enhanced_listing_{{$package->id}}" @if($package->enhanced_listing == 1) checked @endif>
                                    <span style=""></span>
                                </label>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Lead Generation</th>
                        @foreach($packages as $package)
                            <td>
                                <label class="ckbox">
                                    <input type="checkbox" name="lead_generation_{{$package->id}}" @if($package->lead_generation == 1) checked @endif>
                                    <span style=""></span>
                                </label>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">School Fairs</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="school_fairs_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->school_fairs){{$package->school_fairs}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">School Activities</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="school_activities_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->school_activities){{$package->school_activities}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Email Marketing</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="email_marketing_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->email_marketing){{$package->email_marketing}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Marketing Support</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="marketing_support_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->marketing_support){{$package->marketing_support}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Digital Media Promotion</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="digital_media_promotion_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->digital_media_promotion){{$package->digital_media_promotion}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">Digital Media Promotion Weeks</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="digital_media_promotion_weekly_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->digital_media_promotion_weekly){{$package->digital_media_promotion_weekly}}@endif">
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="wd-15p">SMS Marketing</th>
                        @foreach($packages as $package)
                            <td>
                                <input class="form-control" name="SMS_marketing_{{$package->id}}" placeholder="Input box" type="text" value="@if($package->SMS_marketing){{$package->SMS_marketing}}@endif">
                            </td>
                        @endforeach
                    </tr>

                </table>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <button class="btn btn-success" style="width: 320px;">update Record</button>
                </div>
            </div>
        </div>
        </form>
   
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
                  url: "{{ url('/admin/suspend1') }}",
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
