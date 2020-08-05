@extends('layouts.main')

@section('vendor-css')
    <link href="{{ asset('lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('left-menu')
@foreach ($fairs as $fair)
        @if(isset($query))
            @foreach ($query as $q)
                    @if($q->school_suspend == $fair->school_id)
                        <style>
                        .nav-func {
                            display:none;
                        }
                            
                        </style>
                    @endif
                @endforeach
        @endif
           
        @endforeach
    @include('school.left-menu')
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Fairs List</span>
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
        <h5>View Universities</h5>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <div class="row">
            <div class="col-md-12" style="font-size: 35px;">
            {{$school->name}}
            </div>
        </div>
        <br>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-9">
                <a href="#" style="font-size: 30px;
    border-bottom: 1px solid;">Students registration link: <b id='copy_link'>school-fairs.udros.com/{{str_replace(" ","-",$school->name)}}</b></a>
                
            </div>
            <div class="col-md-3">
                <div class="row">
                     <div class="col-md-6">
                     <a href="#" style="    "><button class="btn btn-primary" style="width:100%;margin-top: 5px;" onclick="copy_link('#copy_link')">Copy Link</button></a>
                    <input type="hidden" id='temp'>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-wrapper">
          <div class="wd-200" style="float: right;">
                                <div class="input-group">
                                <button class="btn btn-primary" style="width:100%;">Message</button>
                                </div>
                            </div>
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ID</th>
                        <th class="wd-15p">Student Name</th>
                        <th class="wd-15p">Email</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Grade</th>
                        <th class="wd-15p">Gender</th>
                        <th class="wd-15p">Majar1</th>
                        <th class="wd-15p">Majar2</th>
                        <th class="wd-15p">Country of Interesting 1</th>
                        <th class="wd-15p">Country of Interesting 2</th>
                        <th class="wd-15p">Send Message</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            // echo '<pre>';
                            // $a = App\Models\Country::where('num_code',4)->first();
                            // var_dump($a);exit;

                            // if (count($students) > 0) {
                            //     $html = '';
                            //     foreach ($students as $student) {
                            //         $html .= '<tr>';
                            //         $html .= '<td>' .$student->id .'</td>';
                            //         $html .= '<td>' .$student->name .'</td>';
                            //         $html .= '<td>' .$student->email .'</td>';
                            //         $html .= '<td>' .$student->mobile .'</td>';
                                    
                            //         $grade = App\Models\Grade::where('id',$student->grade_id)->first()->grade;
                            //         $gender = App\Models\Gender::where('id',$student->gender_id)->first()->gender;
                            //         $spec_name1 = App\Models\Specialization::where('id',$student->specializations_1_id)->first()->spec_name;
                            //         $spec_name2 = App\Models\Specialization::where('id',$student->specializations_2_id)->first()->spec_name;
                            //         $study_destination_1_id = App\Models\Country::where('country_id',$student->study_destination_1_id)->first()->en_short_name;
                            //         $study_destination_2_id = App\Models\Country::where('country_id',$student->study_destination_2_id)->first()->en_short_name;

                            //         $html .= '<td>'. $grade .'</td>';
                            //         $html .= '<td>'. $gender .'</td>';
                            //         $html .= '<td>'. $spec_name1 .'</td>';
                            //         $html .= '<td>'. $spec_name2 .'</td>';
                            //         $html .= '<td>'. $study_destination_1_id .'</td>';
                            //         $html .= '<td>'. $study_destination_2_id .'</td>';
                            //         $html .= '<td><a><button class="btn btn-info send_msg">Send message</button></a></td>';
                            //         $html .= '</tr>';
                            //     }
                            //     echo $html;
                            // }
                        ?>

                        @if(count($students) > 0)
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->mobile }}</td>
                                    <td>{{ App\Models\Grade::where('id',$student->grade_id)->first()->grade }}</td>
                                    <td>{{ App\Models\Gender::where('id',$student->gender_id)->first()->gender }}</td>
                                    <td>{{ App\Models\Specialization::where('id',$student->specializations_1_id)->first()->spec_name }}</td>
                                    <td>{{ App\Models\Specialization::where('id',$student->specializations_2_id)->first()->spec_name }}</td>
                                    <td>@if($student->study_destination_1_id != 0){{ App\Models\Country::where('country_id',$student->study_destination_1_id)->first()->en_short_name }}@else{{ $student->study_destination_1_id }}@endif </td>
                                    <td>@if($student->study_destination_2_id != 0){{ App\Models\Country::where('country_id',$student->study_destination_2_id)->first()->en_short_name }}@else{{ $student->study_destination_2_id }}@endif</td>
                                    <td><a><button class="btn btn-info send_msg">Send message</button></a></td>
                                </tr>
                            @endforeach
                        @else
                        @endif
                    </tbody>
                </table>

            </div><!-- sl-pagebody -->
        </div>
        <div class="card pd-20 pd-sm-40 mg-t-50">
                <div class="sl-mainpanel" style="margin: 0;">
                    <div class="sl-pagebody">

                        
                        <!-- sl-page-title -->

                        <div class="row row-sm">
                            <div class="col-xl-6">
                                <div class="card pd-20 pd-sm-40">
                                    <canvas id="chartBar1" height="300"></canvas>
                                </div>
                                <!-- card -->
                            </div>
                                <div class="card pd-20 pd-sm-40">
                                    <canvas id="chartDonut" height="300"></canvas>
                                </div>
                            <!-- col-6 -->
                        </div>
                        <div class="row row-sm" >
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6"><button class="btn btn-primary" style="width:100%;">Export Report</button></div>
                                </div>
                                
                            </div>
                        </div>
            </div>

        </div>                           
    </div>
</div>
@endsection

@section('vendor-js')
        <script src="{{ asset('lib/highlightjs/highlight.pack.js') }}"></script>
        <script src="{{ asset('lib/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>
        <!-- <script src="{{ asset('lib/chart/jquery.js') }}"></script>
        <script src="{{ asset('lib/chart/popper.js') }}"></script>
        <script src="{{ asset('lib/chart/bootstrap.js') }}"></script>
        <script src="{{ asset('lib/chart/perfect-scrollbar.jquery.js') }}"></script> -->
        <script src="{{ asset('lib/chart/Chart.js') }}"></script>
        <!-- <script src="{{ asset('lib/chart/starlight.js') }}"></script> -->
        <!-- <script src="{{ asset('lib/chart/chart.chartjs.js') }}"></script> -->
        <script>
                var ctx1 = document.getElementById('chartBar1').getContext('2d');
                var data1 = "{{ json_encode($dest1) }}";
                var max_destination = '{{$max_destination}}' * 1;
                // alert(max_destination);
                //console.log(JSON.parse("{{ json_encode($countries) }}".replace(/&quot;/g,'')))
                var myChart1 = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($countries) ?>,
                        datasets: [{
                            label: '# of students',
                            data: JSON.parse("{{ json_encode($dest1) }}"),
                            backgroundColor: '#324463'
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                            labels: {
                                display: true
                            }
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 10,
                                    max: max_destination
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    fontSize: 11
                                }
                            }]
                        }
                    }
                });
        </script>
        
        <script>
                var coloR = [];
                var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgb(" + r + "," + g + "," + b + ")";
                };
                
                for (var i = 0; i < JSON.parse("{{ json_encode($sec1) }}").length; i++) {
                    coloR.push(dynamicColors());
                 }
                
                var datapie = {
                    datasets: [{
                        label:'# of students (specialization 1)',
                        data: JSON.parse("{{ json_encode($sec1) }}"),
                        backgroundColor: coloR
                    }],
                    labels:<?php echo json_encode($spp) ?>
                };
            
                var optionpie = {
                    responsive: false,
                    legend: {
                        display: false,
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                };
            
                // For a pie chart
                var ctx7 = document.getElementById('chartDonut');
                var myPieChart7 = new Chart(ctx7, {
                    type: 'pie',
                    data: datapie,
                    options: optionpie
                });
        </script>
</body>
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

            $(".send_msg").click(function() {
                alert("send message to university");
            });
            $("#textA").bind('copy', function() {
                $('span').text('copy behaviour detected!')
            });	
            // Select2
            $('select').select2({ minimumResultsForSearch: Infinity });
           
        });
    </script>
    <script>
         function copy_link(element){
            var $temp = $("<input>");
                $("body").append($temp);
                $temp.val($(element).html()).select();
                document.execCommand("copy");
                $temp.remove();
            }
    </script>
@endsection