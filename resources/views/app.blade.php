<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title : 'Flickr'}}</title>

        <!-- Scripts -->


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/jquery-minicolors/jquery.minicolors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/quill/dist/quill.snow.css') }}">

        <link href="{{ asset('dist/css/sweetalert.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->

        <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
    <![endif]-->
        <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.css" rel="stylesheet" />
        <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    </head>
    <style type="text/css">
        .page-breadcrumb {
            padding: 5px 15px 5px 15px;
        }
        /* datepicker css */

       
    </style>
    <body>
        <div id="app">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <button class="btn btn-default filter-button" data-filter="all">All</button>
                        <button class="btn btn-default filter-button" data-filter="hdpe">HDPE Pipes</button>
                        <button class="btn btn-default filter-button" data-filter="sprinkle">Sprinkle Pipes</button>
                        <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
                        <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>
                    </div>
                </div>
                <div class="col-8">
                    <div>
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-12 col-xs-12 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                        <div class="gallery_product col-lg-4 col-md-4 col-sm-12 col-xs-12 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-12 col-xs-12 filter hdpe">
                            <img src="http://fakeimg.pl/365x365/" class="img-responsive">
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row el-element-overlay">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="../../assets/images/big/img1.jpg" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/big/img1.jpg"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-0">Project title</h4> <span class="text-muted">subtitle of project</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="../../assets/images/big/img3.jpg" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/big/img3.jpg"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-0">Project title</h4> <span class="text-muted">subtitle of project</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="../../assets/images/big/img4.jpg" alt="user">
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="../../assets/images/big/img4.jpg"><i class="mdi mdi-magnify-plus"></i></a></li>
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-0">Project title</h4> <span class="text-muted">subtitle of project</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </body>
    <script type="text/javascript">
            $(document).ready(function () {

                $(".filter-button").click(function () {
                    var value = $(this).attr('data-filter');

                    if (value == "all")
                    {
                        //$('.filter').removeClass('hidden');
                        $('.filter').show('1000');
                    } else
                    {
                        $(".filter").not('.' + value).hide('3000');
                        $('.filter').filter('.' + value).show('3000');

                    }
                });

                if ($(".filter-button").removeClass("active")) {
                    $(this).removeClass("active");
                }
                $(this).addClass("active");

            });
        </script>
    
    <!--<script type="application/javascript" src="{{ asset('js/app.js') }}" ></script>-->

     <script type="application/javascript" src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> 

    <!-- Bootstrap tether Core JavaScript -->

    <script type="application/javascript" src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
     <script type="application/javascript" src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script> 

    <script type="application/javascript" src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script> -->
    <!--Wave Effects -->
    <script type="application/javascript" src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script type="application/javascript" src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script type="application/javascript" src="{{ asset('dist/js/custom.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script type="application/javascript" src="{{ asset('dist/js/pages/dashboards/dashboard1.js')}}"></script> -->
    <!-- Charts js Files -->
    <script type="application/javascript" src="{{ asset('assets/libs/flot/excanvas.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/libs/flot/jquery.flot.js')}}"></script> 
    <script type="application/javascript" src="{{ asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script> 
    <!--<script type="application/javascript" src="{{ asset('dist/js/pages/chart/chart-page-init.js')}}"></script>-->
    <!--<script type="application/javascript" src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>-->

<!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>-->

    <script type="application/javascript" src="{{ asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('js/custom_app.js')}}"></script>
  




</html>
