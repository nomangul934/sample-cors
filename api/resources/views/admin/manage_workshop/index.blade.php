@extends('layouts.main') @section('vendor-css')
<link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
@endsection @section('left-menu') @include('admin.left-menu') @endsection @section('content')
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Manage Workshop</span>
</nav>

@if(session('message'))
<div class="alert @if(!session('error'))alert-success @else alert-danger @endif" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i
            class="icon @if(!session('error')) ion-ios-checkmark @else ion-ios-close @endif alert-icon tx-32 mg-t-5 mg-xs-t-0"
        ></i>
        <span>{{ session('message') }}</span>
    </div>
    <!-- d-flex -->
</div>
<!-- alert -->
@endif

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Manage Workshop</h5>
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
            
            <table id="datatable2" class="table display responsive nowrap" style="border: 1.5px solid;">
                <thead>
                    <tr>
                        <th class="wd-5p">ID</th>
                        <th class="wd-15p">Universtity Name</th>
                        <th class="wd-15p">Topic</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Time</th>
                        <th class="wd-15p">School</th>
                        <th class="wd-15p">Target grade</th>
                        <th class="wd-15p">Country</th>
                        <th class="wd-15p">City</th>
                        <th class="wd-15p">Descriptions</th>
                        <!-- <th class="wd-15p">Delete</th> -->
                        <th class="wd-15p">View & Edit</th>
                        <th class="wd-15p">AP</th>
                        <th class="wd-15p">NA</th>
                        <th class="wd-15p">PA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Oct 2019</td>
                        <td>1~2 PM</td>
                        <td>Ajman Provate</td>
                        <td>10-11-12-13</td>
                        <td>UAE</td>
                        <td>Dubai</td>
                        <td>Desc</td>
                        <td><a href="{{ route('admin.edit_talk') }}"><button class="btn btn-info">View</button></a></td>
                        <td>
                            <label class="ckbox tx-20 mg-t-7">
                                <input type="checkbox" checked="" />
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-close tx-20"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-help-circled tx-20"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Nov 2019</td>
                        <td>1~2 PM</td>
                        <td>Ajman Provate</td>
                        <td>10-11-12-13</td>
                        <td>UAE</td>
                        <td>Dubai</td>
                        <td>Desc</td>
                        <td><a href="{{ route('admin.edit_talk') }}"><button class="btn btn-info">View</button></a></td>
                        <td>
                            <label class="ckbox tx-20 mg-t-7">
                                <input type="checkbox" checked="" />
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-close tx-20"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-help-circled tx-20"></i></a>
                        </td>
                    </tr>
                      <tr>
                        <td>3</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Jan 2019</td>
                        <td>1~2 PM</td>
                        <td>Ajman Provate</td>
                        <td>10-11-12-13</td>
                        <td>UAE</td>
                        <td>Dubai</td>
                        <td>Desc</td>
                        <td><a href="{{ route('admin.edit_talk') }}"><button class="btn btn-info">View</button></a></td>
                        <td>
                            <label class="ckbox tx-20 mg-t-7">
                                <input type="checkbox" checked="" />
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-close tx-20"></i></a>
                        </td>
                        <td>
                            <a href="#"><i class="icon ion-help-circled tx-20"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- sl-pagebody -->
    </div>
</div>
@endsection @section('vendor-js')
<script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
@endsection @section('custom-js')
<script>
    $(function() {
        "use strict";

        $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
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
        "use strict";

        $(".select2").select2({
            minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $(".select2-show-search").select2({
            minimumResultsForSearch: ""
        });

        // Select2 with tagging support
        $(".select2-tag").select2({
            tags: true,
            tokenSeparators: [",", " "]
        });

        // Datepicker
        $(".fc-datepicker").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $("#datepickerNoOfMonths").datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });

        // Color picker
        $("#colorpicker").spectrum({
            color: "#17A2B8"
        });

        $("#showAlpha").spectrum({
            color: "rgba(23,162,184,0.5)",
            showAlpha: true
        });

        $("#showPaletteOnly").spectrum({
            showPaletteOnly: true,
            showPalette: true,
            color: "#DC3545",
            palette: [
                ["#1D2939", "#fff", "#0866C6", "#23BF08", "#F49917"],
                ["#DC3545", "#17A2B8", "#6610F2", "#fa1e81", "#72e7a6"]
            ]
        });
    });
    $(document).ready(function() {
        $('input[type="search"]').css({
            "background-image": "url(https://www.w3schools.com/css/searchicon.png)",
            "background-position": " 10px 12px",
            "background-repeat": "no-repeat",
            width: "100%",
            "font-size": "16px",
            "border-radius": "50px",
            padding: "9px 20px 9px 40px",
            border: "1px solid #ddd",
            "margin-bottom": "12px"
        });
    });
</script>
@endsection