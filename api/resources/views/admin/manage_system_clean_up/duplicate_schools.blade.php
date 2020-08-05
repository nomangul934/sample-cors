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
        <span class="breadcrumb-item active">System Clean Up for School</span>
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
            <h5>System Clean Up for School</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">No</th>
                        <th class="wd-15p">School Name</th>
                        <th class="wd-15p">Duplicated Count</th>
                        {{--<th class="wd-15p">Contact Email</th>--}}
                        {{--<th class="wd-15p">Contact Mobile</th>--}}
                        {{--<th class="wd-15p">Website</th>--}}
                        {{--<th class="wd-15p">City</th>--}}
                        {{--<th class="wd-15p">View&Edit</th>--}}
                        {{--<th class="wd-15p">Delete</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @if($schools)
                        @foreach ($schools as $index => $school)
                            <tr>
                                <td>{{$index + 1 }}</td>
                                <td>{{ $school->name }}</td>
                                <td>{{ $school->count }}</td>
                                {{--<td>{{ $school->phone }}</td>--}}
                                {{--<td>www.domain.com</td>--}}
                                {{--<td>city</td>--}}
                                {{--<td><a href="{{ route('admin.edit_school', ['id' => $school->id]) }}"><button class="btn btn-info">view</button></a></td>--}}
                                {{--<td>--}}
                                    {{--<a href="{{ route('admin.school_list_delete', ['id' => $school->id]) }}"  class="btn btn-danger" onclick="return confirmDelete('{{$school->name}}')">--}}
                                        {{--Delete--}}
                                    {{--</a>--}}
                                {{--</td>--}}

                            </tr>
                        @endforeach
                    @endif
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

        function confirmDelete($name){
            var name = $name;
            return confirm('Are you sure to delete ' + name + '?');
        }
    </script>
@endsection
