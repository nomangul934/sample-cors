@extends('layouts.student')

@section('vendor-css')

    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="wrapper">

        <div class="formCol">

            <div class="titleStyle">

                <h1>SCHOOL FAIR</h1>

                <h6>Students</h6>
            </div>

            <div class="tab-content">
                <nav class="tabs tabsSection">
                    <p>Sigin Up</p>

                </nav>
                <div class="register-form">
                    <form class="form-prevent-multiple-submits" method="POST" action="{{ route('register_students') }}">
                        @csrf
                        <div class="field-wrap">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="text" placeholder="Full Name"/>

                            @error('name')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"/>

                            @error('email')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="text" placeholder="Mobile"/>

                            @error('mobile')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="school"  class="form-control sel-school @error('school_id') is-invalid @enderror" name="school_id"  required >

                                <option value="{{$school->id}}">{{$school->name}}</option>
                            </select>

                            @error('school_id')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="grade"  class="form-control sel-grade @error('grade_id') is-invalid @enderror" name="grade_id"  required>
                                <option value="">Grade</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}" @if(old('grade_id')==$grade->id) selected @endif>{{$grade->name}}</option>
                                @endforeach
                            </select>

                            @error('grade_id')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="social_network_1"  class="form-control sel-social @error('sm_1_id') is-invalid @enderror" name="sm_1_id"  required>
                                <option value="">Preferred Social Network 1</option>
                                @foreach($social_medias as $social_media)
                                    <option value="{{$social_media->id}}" @if(old('sm_1_id')==$social_media->id) selected @endif>{{$social_media->sm_name}}</option>
                                @endforeach
                            </select>
                            @error('sm_1_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <input id="social_url_1" type="text" class="form-control @error('sm_id_1') is-invalid @enderror" name="sm_id_1" value="{{ old('sm_id_1') }}" required autocomplete="text" placeholder="Social Network 1 ID"/>

                            @error('sm_id_1')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- <div class="field-wrap">
                            <select id="social_network_2"  class="form-control sel-social @error('sm_2_id') is-invalid @enderror" name="sm_2_id"  required>
                                <option value="">Preferred Social Network 2</option>
                                @foreach($social_medias as $social_media)
                                    <option value="{{$social_media->id}}" @if(old('sm_2_id')==$social_media->id) selected @endif>{{$social_media->sm_name}}</option>
                                @endforeach
                            </select>
                            @error('sm_2_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->
                        <!-- <div class="field-wrap">
                            <input id="social_url_2" type="text" class="form-control @error('sm_id_2') is-invalid @enderror" name="sm_id_2" value="{{ old('sm_id_2') }}" required autocomplete="text" placeholder="Social Network 2 ID"/>

                            @error('sm_id_2')

                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->
                        <div class="field-wrap">
                            <select id="specializations_1_id"  class="form-control sel-study @error('specializations_1_id') is-invalid @enderror" name="specializations_1_id"  required>
                                <option value="">Preferred Major 1</option>
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}" @if(old('specializations_1_id')==$specialization->id) selected @endif>{{$specialization->spec_name}}</option>
                                @endforeach
                            </select>
                            @error('specializations_1_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="specializations_2_id"  class="form-control sel-study @error('specializations_2_id') is-invalid @enderror" name="specializations_2_id"  required>
                                <option value="">Preferred Major 2</option>
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}" @if(old('specializations_2_id')==$specialization->id) selected @endif>{{$specialization->spec_name}}</option>
                                @endforeach
                            </select>
                            @error('specializations_2_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="study_destination_1_id"  class="form-control sel-study @error('study_destination_1_id') is-invalid @enderror" name="study_destination_1_id"  required>
                                <option value="">Study Destination 1</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_id}}" >{{$country->en_short_name}}</option>
                                @endforeach
                            </select>
                            @error('study_destination_1_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="study_destination_2_id"  class="form-control sel-study @error('study_destination_2_id') is-invalid @enderror" name="study_destination_2_id"  required>
                                <option value="">Study Destination 2</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_id}}" >{{$country->en_short_name}}</option>
                                @endforeach
                            </select>
                            @error('study_destination_2_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="gender_id"  class="form-control sel-social @error('gender_id') is-invalid @enderror" name="gender_id"  required>
                                <option value="">Gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{$gender->id}}" @if(old('gender_id')==$gender->id) selected @endif>{{$gender->gender}}</option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-wrap">
                            <select id="nationality_id"  class="form-control sel-study @error('nationality_id') is-invalid @enderror" name="nationality_id"  required>
                                <option value="">Nationality</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->country_id}}" >{{$country->en_short_name}}</option>
                                @endforeach
                            </select>
                            @error('nationality_id')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--<div class="field-wrap">-->
                        <!--    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"/>-->

                        <!--    @error('password')-->
                        <!--    <span class="invalid-feedback text-left" role="alert">-->
                        <!--        <strong>{{ $message }}</strong>-->
                        <!--    </span>-->
                        <!--    @enderror-->
                        <!--</div>-->
                        <!--<div class="field-wrap">-->
                        <!--    <input id="password-confirm" type="password" class="form-control"-->
                        <!--           name="password_confirmation" required autocomplete="new-password"-->
                        <!--           placeholder="Password confirmation" >-->
                        <!--</div>-->
                        <button type="submit" class="button button-block" style="width:200px;">Register</button>
                    </form>
                    {{--<div class="mg-t-40 tx-center" style="margin-top: 20px;">Already have an account? <a href="{{ route('login') }}" class="tx-info">{{ __('Login') }}</a></div>--}}
                </div>
            </div><!-- tab-content -->

        </div>

    </div> <!-- /form -->

@endsection

@section('vendor-js')
    <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('lib/summernote/summernote-bs4.min.js') }}"></script>
@endsection


@section('custom-js')

    <script>

        $(document).ready(function () {

            $(document).ready(function () {
                $('.sel-school').select2({

                });
                $('.sel-grade').select2({
                    minimumResultsForSearch: Infinity
                });
                $('.sel-social').select2({
                    minimumResultsForSearch: Infinity
                });
                $('.sel-study').select2({

                });
            })
        })
    </script>
@endsection