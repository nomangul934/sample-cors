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
        <span class="breadcrumb-item active">Confirmed Universities List</span>
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
        <h5>Confirmed Universities</h5>
    </div><!-- sl-page-title -->


    <div class="card pd-20 pd-sm-40 trans-back">
        @if(count($universities)>0)
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
                                                {{ $university->user->name}}
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
        @else
            <div class="text-center">
                <h1>Accepted University don't exist!</h1>
            </div>
        @endif

        {{--<div class="table-wrapper">--}}
            {{--<div class="wd-200" style="float: right;">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control fc-datepicker" aria-controls="datatable1" name="date" style="border-radius: 3px;" placeholder="MM/DD/YYYY">--}}
                    {{--<span class="input-group-addon "><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<table id="datatable1" class="table display responsive nowrap">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th class="wd-15p">ID</th>--}}
                    {{--<th class="wd-15p">Uni Name</th>--}}
                    {{--<th class="wd-15p">Contact Name</th>--}}
                    {{--<th class="wd-15p">Contact Email</th>--}}
                    {{--<th class="wd-15p">Contact Phone</th>--}}
                    {{--<th class="wd-15p">City</th>--}}
                    {{--<th class="wd-15p">Edit</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                        {{--<tr>--}}
                        {{--<td>1</td>--}}
                        {{--<td>Dubai Uni</td>--}}
                        {{--<td>Ahmed</td>--}}
                        {{--<td>Ahmed@.com</td>--}}
                        {{--<td>11111111</td>--}}
                        {{--<td>dubai</td>--}}
                        {{--<td>Decline with Reason</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>2</td>--}}
                        {{--<td>Dubai Uni</td>--}}
                        {{--<td>Ahmed</td>--}}
                        {{--<td>Ahmed@.com</td>--}}
                        {{--<td>2223123123</td>--}}
                        {{--<td>dubai</td>--}}
                        {{--<td>Decline with Reason</td>--}}
                        {{--</tr>--}}
                {{--</tbody>--}}
                {{----}}
            {{--</table>--}}

        {{--</div><!-- sl-pagebody -->--}}

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
            // $('select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
    <script src="{{ asset('lib/calendar/popper.js') }}"></script>
    <script src="{{ asset('lib/calendar/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/calendar/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/calendar/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/calendar/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/calendar/select2.min.js') }}"></script>
    <script src="{{ asset('lib/calendar/spectrum.js') }}"></script>
    <script>
        $(function() {

            'use strict';

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });

            // Select2 by showing the search
            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });

            // Select2 with tagging support
            $('.select2-tag').select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });

            // Datepicker
            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('#datepickerNoOfMonths').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true,
                numberOfMonths: 2
            });

            // Color picker
            $('#colorpicker').spectrum({
                color: '#17A2B8'
            });

            $('#showAlpha').spectrum({
                color: 'rgba(23,162,184,0.5)',
                showAlpha: true
            });

            $('#showPaletteOnly').spectrum({
                showPaletteOnly: true,
                showPalette: true,
                color: '#DC3545',
                palette: [
                    ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                    ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
                ]
            });

        });
           $(document).ready(function(){
            
            $('input[type="search"]').css({"background-image": "url(https://www.w3schools.com/css/searchicon.png)", "background-position": " 10px 12px","background-repeat":"no-repeat","width":"100%","font-size":"16px","border-radius":"50px","padding":"9px 20px 9px 40px","border":"1px solid #ddd","margin-bottom":"12px"});
        });
       
    </script>
@endsection