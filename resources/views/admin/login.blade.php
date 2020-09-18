<!DOCTYPE html>
<html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
        <title>{{ config('app.name', 'Admin') }}</title>
        <!-- Custom CSS -->
        <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>
        <div class="main-wrapper">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">

                <div class="auth-box bg-dark border-top border-secondary">
                    <div id="loginform">
                        @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('message.type') }}">
                            <i class="mdi mdi-check-circle-outline"></i> {{ Session::get('message.text') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="padding: 0px;margin: 0px;list-style-type: none;">
                                @foreach ($errors->all() as $error)
                                <li style="font-size:13px;"><i class="mdi mdi-alert-circle-outline"></i>  {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="text-center">
                            <h1 class="" style="color:#fff;">Sign In</h1>
                        </div>
                        <!-- Form -->
                        <form class="form-horizontal m-t-20" id="loginform" action="login" method="post">
                            {{ csrf_field() }}

                            <div class="row p-b-30">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" required="" name="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                        </div>
                                        <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" name="password">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success float-right" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row border-bottom border-secondary">

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- ============================================================== -->
        <!-- This page plugin js -->
        <!-- ============================================================== -->
        <script>

$('[data-toggle="tooltip"]').tooltip();
$(".preloader").fadeOut();
// ============================================================== 
// Login and Recover Password 
// ============================================================== 
$('#to-recover').on("click", function () {
    $("#loginform").slideUp();
    $("#recoverform").fadeIn();
});
$('#to-login').click(function () {

    $("#recoverform").hide();
    $("#loginform").fadeIn();
});
        </script>

    </body>

</html>