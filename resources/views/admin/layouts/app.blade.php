<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title : 'Money Transfer'}}</title>

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
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div id="main-wrapper">
                <!-- ============================================================== -->
                <!-- Topbar header - style you can find in pages.scss -->
                <!-- ============================================================== -->
                @include("admin.includes.header")
                <!-- ============================================================== -->
                <!-- End Topbar header -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                @include("admin.includes.left-sidebar")

                <!-- ============================================================== -->
                <!-- End Left Sidebar - style you can find in sidebar.scss  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page wrapper  -->
                <!-- ============================================================== -->

                <div class="page-wrapper">
                    @include("admin.includes.breadcrumb")

                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    @include("admin.includes.footer")
                </div>
            </div>
    </body>
    <script type="application/javascript" src="{{ asset('js/app.js') }}" ></script>

    <!-- <script type="application/javascript" src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> -->

    <!-- Bootstrap tether Core JavaScript -->

    <script type="application/javascript" src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
     <!--<script type="application/javascript" src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>--> 

    <script type="application/javascript" src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script> -->
    <!--Wave Effects -->
    <script type="application/javascript" src="{{ asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script type="application/javascript" src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script type="application/javascript" src="{{ asset('dist/js/custom.min.js')}}"></script>
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
    <script type="application/javascript" src="{{ asset('dist/js/pages/chart/chart-page-init.js')}}"></script>
    <!--<script type="application/javascript" src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>-->

<!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>-->

    <script type="application/javascript" src="{{ asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('js/custom_app.js')}}"></script>
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.js"></script>

    <!--<script src="http://demo.expertphp.in/js/jquery.js"></script>-->
    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>





</html>
