<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <style type="text/css">

            .gallery-title
            {
                font-size: 36px;
                color: #42B32F;
                text-align: center;
                font-weight: 500;
                margin-bottom: 70px;
            }
            .gallery-title:after {
                content: "";
                position: absolute;
                width: 7.5%;
                left: 46.5%;
                height: 45px;
                border-bottom: 1px solid #5e5e5e;
            }
            .filter-button
            {
                font-size: 18px;
                border: 1px solid #42B32F;
                border-radius: 5px;
                text-align: center;
                color: #42B32F;
                margin-bottom: 30px;

            }
            .filter-button:hover
            {
                font-size: 18px;
                border: 1px solid #42B32F;
                border-radius: 5px;
                text-align: center;
                color: #ffffff;
                background-color: #42B32F;

            }
            .btn-default:active .filter-button:active
            {
                background-color: #42B32F;
                color: white;
            }

            .port-image
            {
                width: 100%;
            }

            .gallery_product
            {
                margin-bottom: 30px;
            }

            .gallery_product img
            {
                margin: 0 auto;
            }


        </style>
    </head>
    <body>
        <div class="container">

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


        </div>
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
    </body>
</html>
