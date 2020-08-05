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
    @include('student.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Welcome Ahmed</span>
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
<style>
.select2-container{
    width: 100%!important;
}
</style>
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>View & Edit Profile</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
            <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-3" style="    text-align: center;">
                    
                            <img class="card-img-top img-fluid" style="    width: 290px;" src="{{ asset('img/img2.jpg') }}" alt="Image">
                            
                        
                    </div>
                    <div class="col-md-7">
                        <div class="row" style="margin-top: 8%;">
                            <div class="col-md-12"> <input class="form-control" placeholder="Input box" type="text"></div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6" style="margin-top: 40px;"><input class="form-control" placeholder="Input box" type="text"></div>
                            <div class="col-md-6" style="margin-top: 40px;"><input class="form-control" placeholder="Input box" type="text"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
            </div>
            <div class="row"  style="margin-top: 40px;margin-bottom: 45px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="row"> 
                            <div class="col-md-8">
                            <input class="form-control" placeholder="Input box" type="text">
                            </div>
                            <div class="col-md-4">
                            <select class="form-control select2" data-placeholder="Choose Browser">
                            <option value="Firefox">25</option>
                            <option value="Chrome">26</option>
                            <option value="Safari">27</option>
                            <option value="Opera">28</option>
                            <option value="Internet Explorer">29</option>
                            <option value="Internet Explorer">30</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
            </div>
            <div class="row"  style="margin-bottom: 20px;">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                    <input class="form-control" placeholder="Input box" type="text">
                        
                    </div>
                    <div class="col-md-5">
                    <input class="form-control" placeholder="Input box" type="text">
                    </div>
                    <div class="col-md-1"></div>
            </div>
            <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3"><button class="btn btn-primary" style="    width: 100%;">Update Record</button></div>
                    <div class="col-md-1">

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


       
        $(document).ready(function(){
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
                  url: "{{ url('/admin/suspend') }}",
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
