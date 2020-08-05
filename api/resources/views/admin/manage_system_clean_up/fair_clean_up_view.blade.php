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
        <span class="breadcrumb-item active">View Fair</span>
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

    @foreach($schools as $school)
        @if($school->id === $fair->school_id)
            @php
            $school_name = $school->name;
            $school_id = $school->id;
            @endphp
        @endif
    @endforeach

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>View Fair</h5>
        </div><!-- sl-page-title -->

        <div class="row pd-20 pd-sm-40">
            <div class="col-lg-12 mg-t-25 mg-lg-t-0" style="padding-left:0px">
                {{--<form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('admin.update_fair', ['id' => $fair->id]) }}" method="post">--}}
                    {{--@csrf--}}
                    <div class="card pd-20 pd-sm-40">
                        <div class="row">
                            <div class="col-lg-9">
                                <input class="form-control @error('school_name') is-invalid @enderror" name="school_name" placeholder="" type="text" value="{{ $school_name }}">
                                {{--@error('school_name')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                            {{--<strong>{{ $message }}</strong>--}}
                                        {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                            <input type="hidden" name="school_id" value="{{ $school_id }}" >

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="wd-200">
                                    <label class="form-control-label">Start Date: <span class="tx-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input class="form-control fc-datepicker @error('start_date') is-invalid @enderror"
                                           type="text" name="start_date" placeholder="Enter the start date"
                                           value="@if(isset($fair->start_date)) {{ date('Y-m-d',strtotime($fair->start_date)) }} @endif">
                                    {{--@error('start_date')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $message }}</strong>--}}
                                            {{--</span>--}}
                                    {{--@enderror--}}
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="wd-200">
                                    <label class="form-control-label">End Date: <span class="tx-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input class="form-control fc-datepicker @error('end_date') is-invalid @enderror"
                                           type="text" name="end_date" placeholder="Enter the end date"
                                           value="@if(isset($fair->end_date)) {{ date('Y-m-d',strtotime($fair->end_date)) }} @endif">
                                    {{--@error('end_date')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $message }}</strong>--}}
                                            {{--</span>--}}
                                    {{--@enderror--}}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="form-control-label">Number of grade 12 students: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control @error('students_grade12_number') is-invalid @enderror"
                                       type="number" name="students_grade12_number" placeholder="Enter number of grade 12 students"
                                       value="@if(isset($fair->students_grade12_number)){{ $fair->students_grade12_number}}@else{{ 0 }}@endif">
                                {{--@error('students_grade12_number')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                            {{--<strong>{{ $message }}</strong>--}}
                                        {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                            <div class="col-lg-1">
                                <label class="form-control-label">Number of grade 11 students: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control @error('students_grade11_number') is-invalid @enderror"
                                       type="number" name="students_grade11_number" placeholder="Enter number of grade 11 students"
                                       value="@if(isset($fair->students_grade11_number)){{ $fair->students_grade11_number }}@else{{ 0 }}@endif">
                                {{--@error('students_grade11_number')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                            {{--<strong>{{ $message }}</strong>--}}
                                        {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                            <div class="col-lg-1">
                                <label class="form-control-label">Universities Max Number: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-lg-2">
                                <input class="form-control @error('universities_max') is-invalid @enderror"
                                       type="number" name="universities_max" placeholder="Enter universities max number"
                                       value="@if(isset($fair->universities_max)){{ $fair->universities_max }}@else{{ 0 }}@endif">
                                {{--@error('universities_max')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                            {{--<strong>{{ $message }}</strong>--}}
                                        {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-1">
                                <label class="form-control-label">Accredited: </label>
                            </div>
                            <div class="col-lg-2">
                                <div id="slWrapper3" class="parsley-select wd-200 wd-xs-250">
                                    <select class="form-control" name="accredited" data-placeholder="Select" data-parsley-errors-container="#slErrorContainer3">
                                        <option value="All">All</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>

                                    <div id="slErrorContainer3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mg-t-25 mg-lg-t-0">
                            <div class="card pd-20 pd-sm-40">
                                <div class="row">
                                    <div class="col-lg-3">
                                    </div>
                                    <div class="col-lg-2" style="text-align:center">
                                        {{--<button type="submit" class="btn btn-success wd-200">Update Record</button>--}}
                                    </div>
                                    <div class="col-lg-2" style="text-align:center">
                                        {{--<button class="btn btn-success wd-200">Approve</button>--}}
                                    </div>
                                    <div class="col-lg-2" style="text-align:center">
                                        <a href="{{ route('admin.fair_list_delete', ['id' => $fair->id]) }}">
                                            <button class="btn btn-danger wd-200" data-id="{{$fair->id}}" id="btn-delete" onclick="return confirmDelete('{{$fair->name}}')">Delete</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>
        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Invitation University</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Uni Name</th>
                            <th class="wd-15p">Contact Email</th>
                            <th class="wd-15p">Contact Mobile</th>
                            <th class="wd-15p">City</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($universities)
                            @foreach ($universities as $university)
                                <tr>
                                    <td>{{ $university->id }}</td>
                                    <td>{{ $university->name }}</td>
                                    <td>{{ $university->email }}</td>
                                    <td>{{ $university->phone }}</td>
                                    <td>{{ $university->city }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div><!-- sl-pagebody -->

            </div>
        </div>
    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
@endsection

@section('custom-js')
    <script>
        $(function(){
            'use strict';

            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });

            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

        });

        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page'
            }
        });
        function confirmDelete($name){
            var name = $name;
            console.log(name);
            return confirm('Are you sure to delete ' + name + '?');
        }
    </script>
@endsection
