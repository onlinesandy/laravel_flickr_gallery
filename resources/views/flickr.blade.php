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
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css') }}">
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
        <div id="app" style="background-color: #eeeeee">
                <div class="row">
                    <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title m-b-0"><span>Flickr Gallery</span> <a href="/login" class="float-right" target="_blank">Login</a></h5>
                                    </div>
                     </div>
                </div>
            </div>
            <div style="clear: both;"></div>

            
                <div class="row">
                    <div class="container">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0" id="SelectedCategoryLabel" style="text-align:center">Please click on Category</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 float-left" style="border-right: 1px solid #ddd;">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Categories</h5>
                            </div>
                            <ul class="list-style-none">
                                @foreach ($categories as $cat)
                                    <li class="d-flex no-block card-body border-top">
                                        <div>
                                            <a href="javascript:void(0);" onclick="getFlickrPhotos('{{ $cat->name }}','{{ $cat->tag }}')" class="m-b-0 font-medium p-0">{{ $cat->name }}</a>
                                        </div>
                                    </li>
                                @endforeach
                                
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col-md-9 float-left">
                        <div class="card">
                            <div class="el-element-overlay" id="FlickPicOuuterDiv" style="padding: 10px;height: 455px;overflow: auto;">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
    </div>
    </body>

    
    <!--<script type="application/javascript" src="{{ asset('js/app.js') }}" ></script>-->

     <script type="application/javascript" src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script> 

    <!-- Bootstrap tether Core JavaScript -->

    <!-- <script type="application/javascript" src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script> -->
     <script type="application/javascript" src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script> 

    <script type="application/javascript" src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('assets/extra-libs/sparkline/sparkline.js')}}"></script> 
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
    <script type="application/javascript" src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script> 
    <script type="application/javascript" src="{{ asset('assets/libs/magnific-popup/meg.init.js')}}"></script> 
    <!--<script type="application/javascript" src="{{ asset('dist/js/pages/chart/chart-page-init.js')}}"></script>-->
    <!--<script type="application/javascript" src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>-->

<!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>-->

    <script type="application/javascript" src="{{ asset('dist/js/sweetalert.min.js')}}"></script>
    <script type="application/javascript" src="{{ asset('js/custom_app.js')}}"></script>
  

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

            $(document).on('click','.getCurrentPic',function(){
                var p_url = $(this).attr('picUrl');
                $.magnificPopup.open({
                    items: {
                      src: p_url
                    },
                    type: 'image'
              });
            
            });
            function getFlickrPhotos(name,tag){
                $('#SelectedCategoryLabel').text(name);
                $('#FlickPicOuuterDiv').html('');
                 $.ajax({
                            url: "/getFlickrPics",
                            type: "GET",
                            data: {'tag': tag},
                            success: function (res) {
                                var data = res;
                                if(data.type=='success'){
                                    var flickrDiv = '';
                                    $.each(data.data, function(k, v) {
                                        var PicUrl = 'http://farm' +v.farm + '.static.flickr.com/'+v.server+ '/' +v.id+ '_' +v.secret+'.jpg';
                                        flickrDiv +='<div class="float-left col-lg-3 col-md-3 col-sm-12 col-xs-12"><div class="el-card-item" style="padding-bottom:0px;"><div class="el-card-avatar el-overlay-1"> ';
                                        flickrDiv+='<img style="height:125px; width:100%" src="'+PicUrl+'">';
                                        flickrDiv+='<div style="cursor:pointer" class="el-overlay getCurrentPic" picUrl = "'+PicUrl+'"></div></div></div></div>';
                                    });
                                    $('#FlickPicOuuterDiv').html(flickrDiv);
                                }else{
                                    swal({
                                    title: 'Opps...',
                                    text: data.text,
                                    type: 'error',
                                    timer: '1500'
                                });
                                }
                            },
                            error: function () {
                                swal({
                                    title: 'Opps...',
                                    text: 'Something Went Wrong',
                                    type: 'error',
                                    timer: '1500'
                                });
                            }
                        });

            }
            
        </script>


</html>
