@extends('layouts.main')

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
                    flex: 0 0 33% !important;
                    max-width: 30% !important;
            }
        }
        @media (min-width: 860px) {
            .img-tag{
                /*border-right: #e0e0e0 solid 1px;*/
            }
            .uni-bottom{
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
            padding: 10px 0px 10px 0px!important;
            margin-bottom: 0px!important;
            font-size: 15px;
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
            }
            .link-btn{
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
        <h5>Manage Universities</h5>
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
        <h5>Manange Universities</h5>
    </div><!-- sl-page-title -->
    <form method = "get" action = "{{ route('admin.manage_university') }}" id = "frm_search">
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
                                <img class="card-img-top img-fluid university-logo" id="image_upload" @if($university->logo) src="{{asset('images/university/'.$university->logo)}}" @else src="{{asset('images/university/university.png')}}" @endif alt="Image" >
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9 ">
                            <div class="row content-txt">
                                <div class="col-sm-9 text-left">
                                    <p class="university-content">
                                        Uni Name: {{ $university->name }}
                                    </p>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <p class="university-content">
                                        ID: {{ $university->id }}
                                    </p>
                                </div>
                            </div>
                            <div class="row content-txt">
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Uni Email: {{ $university->email }}
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Uni Phone: {{ $university->phone }}
                                    </p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Contact Person:
                                        @if(isset($university->user[0]->name) && $university->user[0]->name)
                                            {{ $university->user[0]->name }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Contact Email:
                                        @if(isset($university->user[0]->email) && $university->user[0]->email)
                                            {{ $university->user[0]->email }}
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
                        <div class="col-sm-3 col-md-3 col-xl-2 uni-bottom">
                            <p class="university-content-bottom ">
                                City:
                                @if($university->city)
                                    {{ $city_ary[0] }}
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-3 col-md-4 col-xl-3 block-field">
                            <p class="university-content-bottom uni-bottom">
                                ACC:
                                @if($university->accredited == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </p>
                            <a target="_blank" href="{{$university->website}}" >
                                {{--<img src="/images/new-window-icon.png" style="width: 80%; padding:2px; margin-top:2px;" />--}}
                                <p class="university-content-bottom uni-bottom">
                                    <span>
                                        <i class="fa fa-external-link"></i>
                                    </span>
                                </p>
                            </a>
                        </div>

                        <div class="col-sm-0 col-md-0 col-xl-3 custom-width-sam">

                        </div>

                        <div class="col-sm-2 col-md-3 col-xl-1 link-btn text-center">
                            <button class="btn btn-warning wd-80">MSG</button>
                        </div>
                        <div class="col-sm-2 col-md-2 col-xl-1 link-btn text-center">
                            <a href="{{ route('admin.edit_univ', ['id' => $university->id]) }}"><button class="btn btn-info wd-80">View</button></a>
                        </div>
                        <div class="col-sm-1 col-md-1 col-xl-1 link-btn ">
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
        @endforeach

            @if($universities->count())
                <div class = "row" style="margin-top: 40px;text-align: center;" >
                    <div class = "col-md-12">
                        <div >{{ $universities->links() }}</div>
                    </div>
                </div>
            @endif
    </div>

    <div class="card pd-20 pd-sm-40 mg-t-50">

        <form action="{{ route('admin.update_packages') }}" id="selectForm" novalidate>
            <div class="d-md-flex">
                <div id="slWrapper1" class="parsley-select wd-200 wd-xs-250">
                    <select class="form-control" data-placeholder="Countries Worldwide" data-parsley-errors-container="#slErrorContainer1">
                        <option label="Choose one"></option>
                        <option value="Country1">United State</option>
                        <option value="Country2">Canada</option>
                        <option value="Country3">UK</option>
                    </select>
                
                    <div id="slErrorContainer1"></div>
                </div>

                <div class="mg-md-l-10 mg-t-10 mg-md-t-0"></div>

                <div id="slWrapper2" class="parsley-select wd-200 wd-xs-250">
                    <select class="form-control" data-placeholder="States If US or Canada" data-parsley-errors-container="#slErrorContainer2">
                        <option label="Choose one"></option>
                        <option value="Country1">United State</option>
                        <option value="Country2">Canada</option>
                        <option value="Country3">UK</option>
                    </select>
                
                    <div id="slErrorContainer2"></div>
                </div>

                <div class="mg-md-l-10 mg-t-10 mg-md-t-0"></div>

                <div id="slWrapper3" class="parsley-select wd-200 wd-xs-250">
                    <select class="form-control" data-placeholder="Cities of Selected country" data-parsley-errors-container="#slErrorContainer3">
                        <option label="Choose one"></option>
                        <option value="Country1">United State</option>
                        <option value="Country2">Canada</option>
                        <option value="Country3">UK</option>
                    </select>
                
                    <div id="slErrorContainer3"></div>
                </div>

                <div class="mg-md-l-10 mg-t-10 mg-md-t-0">
                    <button type="submit" class="btn btn-info pd-x-15" value="5">Edit Subscription</button>
                </div>
            </div><!-- d-flex -->
        </form>
    </div>
    
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
