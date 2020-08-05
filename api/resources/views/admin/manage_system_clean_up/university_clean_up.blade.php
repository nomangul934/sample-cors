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
        <span class="breadcrumb-item active">System Clean up for University</span>
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
            <h5>System Clean up for University</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Uni Name</th>
                        <th class="wd-15p">Contact Person</th>
                        <th class="wd-15p">Contact Email</th>
                        <th class="wd-15p">Contact Mobile</th>
                        <th class="wd-15p">City</th>
                        <th class="wd-15p">ACC</th>
                        <th class="wd-15p">View&Edit</th>
                        <th class="wd-15p">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($universities as $university)
                        <tr>
                            <td>{{ $university->id }}</td>
                            <td>{{ $university->name }}</td>
                            <td>&nbsp;</td>
                            <td>{{ $university->email }}</td>
                            <td>{{ $university->phone }}</td>
                            <td>{{ $university->city }}</td>
                            <td>yes</td>
                            <td><a href="{{ route('admin.edit_univ', ['id' => $university->id]) }}"><button class="btn btn-info">View</button></a></td>
                            <td>
                                <a onclick="return confirmDelete('{{$university->name}}')" href="{{ route('admin.university_list_delete', ['id' => $university->id]) }}"  class="btn btn-danger" >
                                    Delete
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div><!-- sl-pagebody -->

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

        function confirmDelete($name){
            var name = $name;
            return confirm('Are you sure to delete ' + name + '?');
        }
    </script>
@endsection
