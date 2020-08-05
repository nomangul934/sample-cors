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
        <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('admin.update_univ',['id'=>$univ[0]->id]) }}" method="post">
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
                                <input class="form-control @error('univ_name') is-invalid @enderror" name="univ_name" placeholder="University Name" type="text" value="@if(isset($univ[0]->name)){{ $univ[0]->name}} @endif">
                                @error('univ_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row" style="    margin: 1px;">
                        <select class="form-control select2" data-placeholder="Select Uni Name">

                            <option value="Firefox">Uni 1</option>
                            <option value="Chrome">Uni 2</option>
                            <option value="Safari">Uni 3</option>
                            <option value="Opera">Uni4</option>
                            <option value="Internet Explorer">Uni 5</option>
                        </select>
                        </div>
                        <br>
                        <div class="row"  style="    margin: 1px;">
                        <select class="form-control select2" data-placeholder="Select Service">
                            <option value="Firefox">S1</option>
                            <option value="Chrome">S2</option>
                            <option value="Safari">S3</option>
                            <option value="Opera">S4</option>
                            <option value="Internet Explorer">S5</option>
                        </select>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control select2" data-placeholder="Select Package">
                                    <option value="Firefox">Listing</option>
                                    <option value="Chrome">Enhanced Listing</option>
                                    <option value="Safari">Lead Generation</option>
                                    <option value="Opera">School Fairs</option>
                                    <option value="Internet Explorer">Email Marketing</option>
                                    <option value="Internet Explorer">Marketing Support</option>
                                    <option value="Internet Explorer">Digital Media Promotion</option>
                                    <option value="Internet Explorer">Digital Media Promotion Weeks</option>
                                    <option value="Internet Explorer">SMS Marketing</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control select2" data-placeholder="Choose Browser">
                                    <option value="Firefox">Yes</option>
                                    <option value="Chrome">No</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                            <input class="form-control" placeholder="Input box" type="text">
                            </div>
                            <div class="col-md-3">
                                <select class="form-control select2" data-placeholder="Select Package">
                                    <option value="Firefox">Package 1</option>
                                    <option value="Chrome">Package 2</option>
                                    <option value="Safari">Package 3</option>
                                    <option value="Opera">Package 4</option>
                                    <option value="Internet Explorer">Package 5</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                 <select class="form-control select2" data-placeholder="Choose Browser">
                                    <option value="Firefox">If Service by number</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                    <button class="btn btn-primary active" style="width: 100%;" >Show number</button>
                                    </div>
                                    <div class="col-md-6">
                                         <input class="form-control" placeholder="50" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                                    <div class="col-md-6">
                                    <button class="btn btn-primary active" style="width: 100%;" >New number</button>
                                    </div>
                                    <div class="col-md-6">
                                         <input class="form-control" placeholder="50"  type="text">
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                            <textarea class="form-control" placeholder="Note..." ></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                            
                            </div>
                            <div class="col-md-3">
                            
                            </div>
                            <div class="col-md-3">
                            
                            </div>
                            <div class="col-md-3">
                            <button type="submit" class="btn btn-success" style="width: 100%;">Update Record</button>
                            </div>
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
                    <th class="wd-15p">Service</th>
                    <th class="wd-15p">Original Status</th>
                    <th class="wd-15p">Changed</th>
                    <th class="wd-15p">New Status</th>
                    <th class="wd-15p">Date</th>
                    <th class="wd-15p">Note</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Listing</td>
                        <td>Yes</td>
                        <td>No</td>
                        <td>no</td>
                        <td></td>
                        <td>any thing</td>
                    </tr>
                    <tr>
                        <td>fairs</td>
                        <td>80</td>
                        <td>-5</td>
                        <td>75</td>
                        <td></td>
                        <td>any thing</td>
                    </tr>
                    <tr>
                        <td>fairs</td>
                        <td>80</td>
                        <td>10</td>
                        <td>80</td>
                        <td></td>
                        <td>any thing</td>
                    </tr>
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
