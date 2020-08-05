@extends('layouts.main')
<?php

    //dd($schools);exit;
?>
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
        <span class="breadcrumb-item active">Add School</span>
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
        <h5>Add School</h5>
    </div><!-- sl-page-title -->

    <div class="card mg-t-50">
        <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('admin.store_school') }}" method="post">
            @csrf
            <div class="row col-lg-12">
                <div class="col-lg-2">
                    <div class="card pd-20 pd-sm-40">
                        <div class="card bd-0">
                            <img class="card-img-top img-fluid" src="/images/logo-option-2.png" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                    <div class="card pd-20 pd-sm-40">
                        <div class="row">
                            <div class="col-lg">
                                <input class="form-control @error('school_name') is-invalid @enderror" name="school_name" placeholder="School Name" type="text">
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
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" type="text">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="text">
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
                                <input class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Web Site" type="text">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <input class="form-control @error('map_link') is-invalid @enderror" name="map_link" placeholder="Google map Link" type="text">
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
                    <div class="card pd-10 pd-sm-40" id="add-article-area">
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
                                <i class="fa fa-plus-circle add-article-row-btn mg-t-5" style="font-size:30px;color:green;" ></i>
                                <i class="fa fa-minus-circle mg-t-5 remove-article-row-btn" attr-id="added-row-0" style="font-size:30px;color:red;" ></i>
                            </div>
                        </div>
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
                        </div>
                        <div class="col-lg" style="text-align:center">
                            <button type="submit" class="btn btn-success">Add Record</button>
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

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-15p">ID</th>
                    <th class="wd-15p">Contact Name</th>
                    <th class="wd-15p">Title</th>
                    <th class="wd-15p">Contact Email</th>
                    <th class="wd-15p">Contact Mobile</th>
                    <th class="wd-15p">View&Edit</th>
                    <th class="wd-15p">Suspend</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($school as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>name</td>
                            @if(isset($school->email))
                                <td>{{ $school->email }}</td>
                            @else
                                <td></td>
                            @endif

                            @if(isset($school->phone))
                                <td>{{ $school->phone }}</td>
                            @else
                                <td></td>
                            @endif
                            <td><a href="{{ route('admin.edit_school', ['id' => $data->id]) }}"><button class="btn btn-info">view</button></a></td>
                            <td><button class="btn btn-danger">Suspend</button></td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div><!-- sl-pagebody -->

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
