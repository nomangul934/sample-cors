@extends('layouts.main') @section('vendor-css')
<link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
@endsection @section('left-menu') @include('school.left-menu') @endsection @section('content')
<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Manage Career Talks</span>
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
        <h5>Career Talk List</h5>
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">ID</th>
                        <th class="wd-15p">Start Date</th>
                        <th class="wd-15p">End date</th>
                        <th class="wd-15p">Day</th>
                        <th class="wd-15p">G12</th>
                        <th class="wd-15p">G11</th>
                        <th class="wd-15p">Sesh</th>
                        <th class="wd-15p">City</th>
                        <th class="wd-15p">L/uni</th>
                        <th class="wd-15p">View</th>
                        <th class="wd-15p">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10/8/2019</td>
                        <td>10/8/2019</td>
                        <td>22</td>
                        <td>50</td>
                        <td>70</td>
                        <td>20</td>
                        <td>dubai</td>
                        <td>3</td>
                        <td style="text-align: center;">
                            <button data-toggle="modal" data-target="#modaldemo1" class="btn btn-primary">
                                View
                            </button>
                        </td>
                        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>10/8/2019</td>
                        <td>10/8/2019</td>
                        <td>22</td>
                        <td>50</td>
                        <td>70</td>
                        <td>20</td>
                        <td>dubai</td>
                        <td>3</td>
                        <td style="text-align: center;">
                            <button data-toggle="modal" data-target="#modaldemo1" class="btn btn-primary">
                                View
                            </button>
                        </td>
                        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>10/8/2019</td>
                        <td>10/8/2019</td>
                        <td>22</td>
                        <td>50</td>
                        <td>70</td>
                        <td>20</td>
                        <td>dubai</td>
                        <td>3</td>
                        <td style="text-align: center;">
                            <button data-toggle="modal" data-target="#modaldemo1" class="btn btn-primary">
                                View
                            </button>
                        </td>
                        <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- sl-pagebody -->
      <div class="wrapper" style="margin-top: 20px;">
          <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-4"></div>
             
                      <div class="col-md-5"> </div>
                      <div class="col-md-3"><button class="btn btn-primary"  style="width:100%">Add Career Talk</button></div>
                  </div>
              </div>
          </div>
      </div>
        <div class="table-wrapper" style="    margin-top: 50px;" >
            <span style="font-size: 25px;"> Registered Students</span>
            <table id="datatable2" class="table display responsive nowrap" style="border: 1.5px solid;">
                <thead>
                    <tr>
                        <th class="wd-5p">ID</th>
                        <th class="wd-15p">Universtity Name</th>
                        <th class="wd-15p">Talk Topic</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Time</th>
                        <th class="wd-15p">Student name</th>
                        <th class="wd-15p">Grade</th>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Message</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Oct 2019</td>
                        <td>1~2 PM</td>
                        <td>Ahmed</td>
                        <td>10</td>
                        <td>000000000</td>
                        <td><a href="#"><button class="btn btn-info">Message</button></a></td>

                    </tr>
                    <tr>
                         <td>2</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Oct 2019</td>
                        <td>1~2 PM</td>
                        <td>Ahmed</td>
                        <td>10</td>
                        <td>000000000</td>
                        <td><a href="#"><button class="btn btn-info">Message</button></a></td>
                    </tr>
                      <tr>
                        <td>3</td>
                        <td>Dubai Uni</td>
                        <td>Design</td>
                        <td>2nd Oct 2019</td>
                        <td>1~2 PM</td>
                        <td>Ahmed</td>
                        <td>10</td>
                        <td>000000000</td>
                        <td><a href="#"><button class="btn btn-info">Message</button></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
       
    </div>

    <div id="modaldemo1" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Register</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-25">
                    <div class="row" style="    margin-bottom: 10px;">
                        <div class="col-md-6">Student Name</div>
                        <div class="col-md-6"><input class="form-control" placeholder="Student Name" type="text" /></div>
                    </div>
                    <div class="row" style="    margin-bottom: 10px;">
                        <div class="col-md-6">Grade</div>
                        <div class="col-md-6"><input class="form-control" placeholder="Grade" type="text" /></div>
                    </div>
                    <div class="row" style="    margin-bottom: 10px;">
                        <div class="col-md-6">Email</div>
                        <div class="col-md-6"><input class="form-control" placeholder="Email" type="text" /></div>
                    </div>
                    <div class="row" style="    margin-bottom: 10px;">
                        <div class="col-md-6">Number</div>
                        <div class="col-md-6"><input class="form-control" placeholder="Number" type="text" /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info pd-x-20">Save changes</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- modal -->
</div>
@endsection @section('vendor-js')
<script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
@endsection @section('custom-js')
<script>
    $(function() {
        "use strict";

        $("#datatable1").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page"
            }
        });

        $(".send_msg").click(function() {
            alert("send message to university");
        });

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
            "background-position": " 10px 10px",
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