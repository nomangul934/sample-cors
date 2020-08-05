@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <style>
        .user-image{
            border-radius: 50%!important;
        }
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
            .link-btn-1{
                text-align: right;
            }
            .uni-bottom{
                /*border-right: #e0e0e0 solid 1px;*/
            }
        }

        .alone-university{
            padding:0px 20px 10px 20px;
        }
        .address-university{
            width:98%;
            margin:auto;
            padding-bottom: 5px;
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
        <span class="breadcrumb-item active">Manage Users</span>
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
        <h5>Manage Users</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40 trans-back">
        @foreach($users as $user)
            <div class="university">
                <div class="alone-university">
                    <div class="row  content-txt">
                        <div class="col-lg-2 col-md-3 img-tag p-0">
                            <div class="card " style="align-items: center;">
                                <img class="card-img-top img-fluid user-image university-logo " @if($user->logo) src="{{asset('images/user/'.$user->logo)}}" @else src="{{asset('images/user/user.png')}}" @endif alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <div class="row content-txt">
                                <div class="col-sm-9 text-left">
                                    <p class="university-content">
                                        Name: {{ $user->name }}
                                    </p>
                                </div>
                                <div class="col-sm-3 text-right">
                                    <p class="university-content">
                                        ID: {{ $user->id }}
                                    </p>
                                </div>
                            </div>
                            <div class="row content-txt">
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Type: {{ $user->role }}
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Email: {{ $user->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <p class="university-content">
                                        Contact Phone:
                                        @if(isset($user->phone) && $user->phone)
                                             {{ $user->phone }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="university-content">
                                        Contact Mobile: {{ $user->mobile }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="address-university">
                    <div class="row">
                        <div class="col-sm-3 col-xl-2 uni-bottom">
                            <p class="university-content">
                                Ext: {{ $user->ext }}
                            </p>
                        </div>
                        <div class="col-sm-3 col-xl-3 uni-bottom">
                            <p class="university-content">
                                Title: {{ $user->title }}
                            </p>
                        </div>
                        <div class="col-sm-2 col-xl-4 custom-width-sam">

                        </div>
                        <div class="col-sm-2 col-xl-1 link-btn-1">
                            <a href="{{ route('admin.edit_user', ['id' => $user->id]) }}"><button class="btn btn-info wd-80">View</button></a>
                        </div>
                        <div class="col-sm-1 col-xl-1 link-btn">
                            @if($user->state == 1)
                                <a href="{{ route('admin.user_suspend', ['id'=> $user->id]) }}" class="suspend btn btn-danger wd-80" >Suspend</a>
                            @else
                                <a href="{{ route('admin.user_unSuspend', ['id'=> $user->id]) }}" class="suspend btn btn-danger wd-80" style="background-color: #1caf9a;">Unsuspe</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if($users->count())
            <div class = "row" style="margin-top: 40px;text-align: center;" >
                <div class = "col-md-12">
                    <div >{{ $users->links() }}</div>
                </div>
            </div>
        @endif


        {{--<div class="table-wrapper">--}}
            {{--<table id="datatable1" class="table display responsive nowrap">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th class="wd-15p">ID</th>--}}
                    {{--<th class="wd-15p">Name</th>--}}
                    {{--<th class="wd-15p">Type</th>--}}
                    {{--<th class="wd-15p">Inst Name</th>--}}
                    {{--<th class="wd-15p">Contact Phone</th>--}}
                    {{--<th class="wd-15p">email</th>--}}
                    {{--<th class="wd-15p">city</th>--}}
                    {{--<th class="wd-15p">View&Edit</th>--}}
                    {{--<th class="wd-15p">Susber</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                    {{--@foreach ($users as $user)--}}
                        {{--<tr>--}}
                            {{--<td>{{ $user->id }}</td>--}}
                            {{--<td>{{ $user->name }}</td>--}}
                            {{--<td>{{ $user->role }}</td>--}}
                            {{--<td>Inst Name</td>--}}
                            {{--<td>{{ $user->phone }}</td>--}}
                            {{--<td>{{ $user->email }}</td>--}}
                            {{--<td>yes</td>--}}
                            {{--<td><button class="btn btn-info">View</button></td>--}}
                            {{--<td><button class="btn btn-danger">Suspend</button></td>--}}
                            {{----}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                {{--</tbody>--}}
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

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });


        });

    </script>
@endsection
