@extends('layouts.main') @section('vendor-css')
<link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
<style>
    #tabs {
        overflow: hidden;
        width: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    span {
        font-size: 0.875rem;
    }
    #tabs li {
        float: left;
        margin: 0 0.5em 0 0;
    }

    #tabs a {
        position: relative;
        background: #ddd;
        background-image: linear-gradient(to bottom, #fff, #ddd);
        padding: 0.7em 3.5em;
        float: left;
        text-decoration: none;
        color: #444;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.8);
        border-radius: 5px 0 0 0;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
    }

    #tabs a:hover,
    #tabs a:hover::after,
    #tabs a:focus,
    #tabs a:focus::after {
        background: #eee;
    }

    #tabs a:focus {
        outline: 0;
    }

    #tabs a::after {
        content: "";
        position: absolute;
        z-index: 1;
        top: 0;
        right: -0.5em;
        bottom: 0;
        width: 1em;
        background: #ddd;
        background-image: linear-gradient(to bottom, #fff, #ddd);
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
        transform: skew(10deg);
        border-radius: 0 5px 0 0;
    }

    #tabs #current a,
    #tabs #current a::after {
        background: #dee2e6;
        z-index: 3;
    }

    #content {
        background: #fff;
        padding: 2em;
        height: 220px;
        position: relative;
        z-index: 2;
        border-radius: 0 5px 5px 5px;
        box-shadow: 0 -2px 3px -2px rgba(0, 0, 0, 0.5);
    }
    dl,
    ol,
    ul {
        margin: 0px !important;
    }
</style>
@endsection @section('left-menu') @include('admin.left-menu') @endsection @section('content')
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
        <h5>Add Career Talks</h5>
    </div>
    <!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
        <div class="row" style="    margin-bottom: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-5">
                        <button class="btn btn-primary disabled" style="width:100%">Select Date From</button>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-primary disabled" style="width:100%">To</button>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" />
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <div class="col-md-2"><input class="form-control" placeholder="Number of Days Ex4" type="text" /></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary disabled" style="width:100%">G12</button>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="50" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary disabled" style="width:100%">G11</button>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="50" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary disabled" style="width:100%">Limit/uni</button>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" placeholder="3" type="text" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row" style="    margin-top: 60px;">
            <ul id="tabs">
                <li><a href="#" name="tab1">Day One</a></li>
                <li><a href="#" name="tab2">Day Two</a></li>
                <li><a href="#" name="tab3">Day Three</a></li>
                <li><a href="#" name="tab4">Day Four</a></li>
            </ul>

            <div id="content" style=" width: 100%;height: auto; border: 1px solid;">
                <div id="tab1">
                    <div class="card pd-10 pd-sm-40" id="add-article-area">
                        <div class="add-article-row row" id="added-row-0">
                            <div class="col-lg">
                                <!-- <input class="form-control " name="full_name[]" placeholder="Full Name" type="text" /> -->
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                                    </span>
                                    <input
                                        type="text"
                                        class="form-control fc-datepicker"
                                        placeholder="Select Starting Time"
                                    />
                                </div>
                            </div>
                            <div class="col-lg">
                                <input
                                    class="form-control "
                                    name="mobile[]"
                                    min="6"
                                    max="20"
                                    placeholder="Select Hour"
                                    type="number"
                                    pattern="[6-20]"
                                    minlength="1"
                                    maxlength="2"
                                    onKeyUp="if(this.value>20){this.value='20';}else if(this.value<5){this.value='6';}"
                                />
                            </div>
                            <div class="col-lg">
                                <input
                                    class="form-control "
                                    name="email[]"
                                    min="0"
                                    max="45"
                                    step="15"
                                    pattern="[0,15,30,45]"
                                    placeholder="Select Minute"
                                    type="number"
                                    minlength="1"
                                    maxlength="2"
                                    onKeyUp="if(this.value>45){this.value='45';}else if(this.value<0){this.value='0';}"
                                />
                            </div>
                            <div class="col-lg">
                                <select class="form-control select2" data-placeholder="Choose Majar">
                                    <option label="Choose one"></option>
                                    <option value="Firefox">Majar</option>
                                    <option value="Chrome">Chrome</option>
                                    <option value="Safari">Safari</option>
                                    <option value="Opera">Opera</option>
                                    <option value="Internet Explorer">Internet Explorer</option>
                                </select>
                            </div>

                            <div class="col-lg">
                                <i
                                    class="fa fa-plus-circle add-article-row-btn mg-t-5"
                                    style="font-size:30px;color:green;"
                                ></i>
                                <i
                                    class="fa fa-minus-circle mg-t-5 remove-article-row-btn"
                                    attr-id="added-row-0"
                                    style="font-size:30px;color:red;"
                                ></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="row">
                                 <div class="col-md-2"></div>
                                   <div class="col-md-2"><button class="btn btn-success" style="    width: 100%;">Update Record</button></div>
                                    <div class="col-md-2"><button class="btn btn-success" style="    width: 100%;">Approve</button></div>
                                    <div class="col-md-2"><button class="btn btn-danger"style="    width: 100%;">DisApprove</button></div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2"></div>
                            </div>
                                      
                                   
                        </div>
                    </div>
                </div>
                <div id="tab2">Day Two</div>
                <div id="tab3">Day Three</div>
                <div id="tab4">Day Four</div>
            </div>
            <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#content")
                        .find("[id^='tab']")
                        .hide(); // Hide all content
                    $("#tabs li:first").attr("id", "current"); // Activate the first tab
                    $("#content #tab1").fadeIn(); // Show first tab's content

                    $("#tabs a").click(function(e) {
                        e.preventDefault();
                        if (
                            $(this)
                                .closest("li")
                                .attr("id") == "current"
                        ) {
                            //detection for current tab
                            return;
                        } else {
                            $("#content")
                                .find("[id^='tab']")
                                .hide(); // Hide all content
                            $("#tabs li").attr("id", ""); //Reset id's
                            $(this)
                                .parent()
                                .attr("id", "current"); // Activate this
                            $("#" + $(this).attr("name")).fadeIn(); // Show content for the current tab
                        }
                    });
                });
            </script>
        </div>
        <script>
            $(function() {
                "use strict";
                var addedRow = 0;

                $(document).on("click", ".add-article-row-btn", function() {
                    addedRow++;
                    var temp = 0;
                    $(".add-article-row").each(function(index, value) {
                        temp++;
                    });

                    var attHtml =
                        `<div class="add-article-row row mg-t-10" id='added-row-` +
                        temp +
                        `'>

                            <div class="col-lg">
                            <!-- <input class="form-control " name="full_name[]" placeholder="Full Name" type="text" /> -->
                            <div class="input-group">
                                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                <input type="text" class="form-control fc-datepicker" placeholder="Select Starting Time" />
                            </div>
                        </div>
                            <div class="col-lg">
                            <input
                                class="form-control "
                                name="mobile[]"
                                min="6"
                                max="20"
                                placeholder="Select Hour"
                                type="number"
                                pattern="[6-20]"
                                minlength="1" maxlength="2"
                                onKeyUp="if(this.value>20){this.value='20';}else if(this.value<5){this.value='6';}"
                            />
                        </div>
                        <div class="col-lg">
                            <input
                                class="form-control "
                                name="email[]"
                                min="0"
                                max="45"
                                step="15"
                                pattern="[0,15,30,45]"
                                placeholder="Select Minute"
                                type="number"
                                minlength="1" maxlength="2"
                                onKeyUp="if(this.value>45){this.value='45';}else if(this.value<0){this.value='0';}"
                            />
                        </div>
                                <div class="col-lg">
                                    <select class="form-control select2" data-placeholder="Choose Majar">
                                    <option label="Choose one"></option>
                                    <option value="Firefox">Majar</option>
                                    <option value="Chrome">Chrome</option>
                                    <option value="Safari">Safari</option>
                                    <option value="Opera">Opera</option>
                                    <option value="Internet Explorer">Internet Explorer</option>
                                    </select>
                                </div>
                                        <div class="col-lg">
                                            <i class='fa fa-plus-circle add-article-row-btn' style='font-size:30px;color:green;' ></i>
                                            <i class='fa fa-minus-circle remove-article-row-btn' attr-id='added-row-` +
                        temp +
                        `' style='font-size:30px;color:red;' ></i>
                                        </div>
                                    </div>
                                </div>`;

                    $("#add-article-area").append(attHtml);
                });

                $(document).on("click", ".remove-article-row-btn", function() {
                    var selector = "#add-article-area #" + $(this).attr("attr-id");
                    $(selector).remove();
                });
            });
        </script>
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

        $("#datatable1").DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Search...",
                sSearch: "",
                lengthMenu: "_MENU_ items/page"
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