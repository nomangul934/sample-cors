@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/jquery-timepicker/jquery-timepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
@endsection

@section('left-menu')
    @include('admin.left-menu')
@endsection


@section('content')
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
            <h5>Create New Fair</h5>
        </div>

        <div class="card pd-20 pd-sm-40">
            <form class="form-prevent-multiple-submits" autocomplete="off" action="{{ route('admin.store_fair_admin') }}" method="post">
                @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group" >
                                    <label class="form-control-label" style="font-size:16px; padding-top:8px;">School:</label>
                                </div>
                            </div>
                            <div class="col-lg-5">                                    
                                    <select  class="form-control @error('school') is-invalid @enderror"  type="text" name="school" 
                               placeholder="Enter the start date">   
                                    <option value="">select school</option>
                                    @foreach($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                               <select>  
                                @error('school')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror                       
                            </div> 
                        </div>                                               
                    </div>                    
                </div>
                <div class="row mg-b-25">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group" >
                                    <label class="form-control-label" style="font-size:16px; padding-top:8px;">Start Date:</label>
                                </div>
                            </div><!-- col-6 -->
                            <div class="col-lg-5">
                                <div class="form-group " >
                                    <input class="form-control fc-datepicker @error('start_date') is-invalid @enderror"  type="text" name="start_date"
                                    placeholder="Enter the start date" value="@if(isset($start_date)) {{ $start_date }}@else{{ old('start_date') }} @endif">
                                    @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input class="form-control timepicker @error('start_time') is-invalid @enderror" type="text" name="start_time"
                                        placeholder="start time"   value="@if(isset($start_time)) {{ $start_time }}@else{{ old('start_time') }} @endif">
                                    @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div><!-- col-6 -->
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" style="font-size:16px; padding-top:8px;">End Date:</label>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control fc-datepicker @error('end_date') is-invalid @enderror"
                                        type="text" name="end_date" placeholder="Enter the end date"
                                        value="@if(isset($end_date)) {{ $end_date }}@else{{ old('end_date') }} @endif">
                                    @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input class="form-control timepicker @error('end_time') is-invalid @enderror"
                                            type="text" name="end_time" placeholder="Enter the end time"
                                            value="@if(isset($end_time)) {{ $end_time }}@else{{ old('end_time') }} @endif">
                                        @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row mg-b-25">
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="form-control-label" style="font-size:16px; padding-top:8px;">G12:</label>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control @error('students_grade12_number') is-invalid @enderror" type="number" name="students_grade12_number" placeholder="Enter number of grade 12 students"
                                        value="@if(isset($fair->students_grade12_number)){{ $fair->students_grade12_number}}@else{{ old('students_grade12_number') }}@endif">
                                @error('students_grade12_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="form-control-label" style="font-size:16px; padding-top:8px;">G11:</label>
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control @error('students_grade11_number') is-invalid @enderror"
                                        type="number" name="students_grade11_number" placeholder="Enter number of grade 11 students"
                                        value="@if(isset($fair->students_grade11_number)){{ $fair->students_grade11_number }}@else{{ old('students_grade11_number') }}@endif">
                                    @error('students_grade11_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-5">
                                <label class="form-control-label" style="font-size:16px; padding-top:8px;">Max University: </label>
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control @error('universities_max') is-invalid @enderror"
                                    type="number" name="universities_max" placeholder="Enter universities max number"
                                    value="@if(isset($fair->universities_max)){{ $fair->universities_max }}@else{{ old('universities_max') }}@endif">
                                @error('universities_max')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                </div>
                <br>
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Message from School to Universities </label>
                            <textarea id="about_us" class="form-control " name="to_university_message" placeholder="Message from School to Universities">
                                @if(isset($fair->to_univ_message))
                                    {{$fair->to_univ_message}}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
            
                <br>
                <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Request from Udros.com Team </label>
                            <textarea id="to_support" class="form-control " name="to_support_message" placeholder="Request from Udros.com Team">
                                @if(isset($fair->to_sup_message))
                                    {{$fair->to_sup_message}}
                                @endif
                            </textarea>
                        </div>
                    </div>
                </div>
            
            
                <div class="form-layout-footer">
                    <div class="row mg-b-25">
                        <div class="col-xl-6">
                            
                        </div>
                        <div class="col-xl-6 text-right">
                            <button type="submit" class="btn btn-success wd-180" >Update Record</button>
                            <a class="btn btn-secondary" href="{{ route('admin.manage_fairs') }}">Cancel</a>
                        </div>
                    </div>
            
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </form>
        </div>

    </div>
@endsection

@section('vendor-js')
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
@endsection

@section('custom-js')
    <script src="{{ asset('js/submit.js') }}"></script>
    <script>
        $(function(){
            'use strict';
            $('#about_us').summernote({
                height: 150
            });
            $('#to_support').summernote({
                height: 150
            });

            $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
            });

            $('.timepicker').timepicker({
                timeFormat: 'h:mm p',
                interval: 60,
                minTime: '8',
                maxTime: '18:00pm',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
@endsection