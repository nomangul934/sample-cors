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
        <span class="breadcrumb-item active">System Clean Up for Fairs</span>
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
            <h5>System Clean Up for Fairs</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <div class="wd-200" style="float: right;">
                    <div class="input-group">
                        <input type="text" class="form-control fc-datepicker" aria-controls="datatable1" name="date" style="border-radius: 3px;" placeholder="MM/DD/YYYY">
                        <span class="input-group-addon "><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>

                    </div>
                </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">School Name</th>
                        <th class="wd-15p">Start Date</th>
                        <th class="wd-15p">End Date</th>
                        <th class="wd-15p">G12</th>
                        <th class="wd-15p">G11</th>
                        <th class="wd-15p">Max Uni</th>
                        <th class="wd-15p">City</th>
                        <th class="wd-15p">View&Edit</th>
                        <th class="wd-15p">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($fairs as $fair)
                        <tr>
                            <td>{{ $fair->id }}</td>
                            @php
                            $temp =0;
                            @endphp
                            @foreach($schools as $school)
                                @if($school->id === $fair->school_id)
                                    <td>{{ $school->name }}</td>
                                    @php
                                    $temp =1;
                                    @endphp
                                @endif
                            @endforeach
                            @if($temp === 0)
                                <td></td>
                            @endif
                            <td>{{ $fair->start_date }}</td>
                            <td>{{ $fair->end_date }}</td>
                            <td>{{ $fair->students_grade12_number }}</td>
                            <td>{{ $fair->students_grade11_number }}</td>
                            <td>{{ $fair->universities_max }}</td>
                            <td>City</td>
                            <td><a href="{{ route('admin.fair_view', ['id' => $fair->id]) }}"><button class="btn btn-info">View</button></a></td>
                            <td>
                                <a href="{{ route('admin.fair_list_delete', ['id' => $fair->id]) }}">
                                    <button class="btn btn-danger" data-id="{{$fair->id}}" id="btn-delete" onclick="return confirmDelete('{{$fair->name}}')">Delete</button>
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

        function confirmDelete($name){
           var name = $name;

           return confirm('Are you sure to delete ' + name + '?');
        }
    </script>
@endsection
