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
        <span class="breadcrumb-item active">System Clean Up for Users</span>
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
            <h5>System Clean Up for Users</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Type</th>
                        <th class="wd-15p">Inst Name</th>
                        <th class="wd-15p">Contact Phone</th>
                        <th class="wd-15p">email</th>
                        <th class="wd-15p">city</th>
                        <th class="wd-15p">View&Edit</th>
                        <th class="wd-15p">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role }}</td>
                            <td>Inst Name</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>yes</td>
                            <td><button class="btn btn-info">View</button></td>
                            <td>
                                <a href="{{ route('admin.user_list_delete', ['id' => $user->id]) }}">
                                    <button class="btn btn-danger" data-id="{{$user->id}}" id="btn-delete" onclick="return confirmDelete('{{$user->name}}')">Delete</button>
                                </a>
                            </td>
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
