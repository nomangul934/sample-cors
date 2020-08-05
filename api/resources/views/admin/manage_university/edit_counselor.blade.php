@extends('layouts.main')
<?php
    
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

    <div class="card mg-t-50">
        <form class="form-prevent-multiple-submits" autocomplete="off" action="" method="post">
            @csrf
            <div class="row col-lg-12">
                <div class="col-lg-2">
                    <div class="card pd-20 pd-sm-40">
                        <div class="card bd-0">
                            <img class="card-img-top img-fluid" src="/images/logo-option-2.png" alt="Image">
                        </div>
                    </div>
                </div>
               

              
                <div class="col-lg-12 mg-t-25 mg-lg-t-0 mg-b-5 add-article-row">
                    <div class="card pd-10 pd-sm-40" id="add-article-area">
                        
                            <div class="add-article-row row" id="added-row-0">
                                <div class="col-lg">
                                    <input class="form-control" name="compus[]" placeholder="Counselor Full Name" type="text">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="country[]" placeholder="Mobile Number" type="text">
                                </div>
                                <div class="col-lg">
                                    <input class="form-control" name="city[]" placeholder="Email" type="text">
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
                            <button type="submit" class="btn btn-success">Update Record</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>
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
                                        <input class="form-control" name="compus[]" placeholder="Counselor Full Name" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="country[]" placeholder="Mobile Number" type="text">
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" name="city[]" placeholder="Email" type="text">
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
