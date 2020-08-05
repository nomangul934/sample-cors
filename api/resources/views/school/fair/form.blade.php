<div class="form-layout">
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
                <a href=" @if($school->state == 0 || Auth::user()->state == 0)#@endif" class="btn btn-success wd-260">
                    Student Registration Page
                </a>
            </div>
            <div class="col-xl-6 text-right">
                <button type="submit" class="btn btn-success wd-180" @if($school->state == 0 || Auth::user()->state == 0) disabled @endif>Update Record</button>
                <a class="btn btn-secondary" href="{{ route('school.fairs_list') }}">Cancel</a>
            </div>
        </div>

    </div><!-- form-layout-footer -->
</div><!-- form-layout -->