<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->

<head>
    <meta charset="utf-8">
    @yield('title')

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Kanal Nuklir description" name="description">
    <meta content="Kanal Nuklir keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-KANAL NUKLIR-">
    <meta property="og:title" content="-KANAL NUKLIR-">
    <meta property="og:description" content="-KANAL NUKLIR-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-KANAL NUKLIR-"><!-- link to image for socio -->
    <meta property="og:url" content="-KANAL NUKLIR-">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Fonts START -->
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all"
        rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{ asset('assets/pages/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{ asset('assets/pages/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pages/css/slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pages/css/portfolio.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/corporate/css/themes/blue.css') }}" rel="stylesheet" id="style-color">
    <link href="{{ asset('assets/corporate/css/custom.css') }}" rel="stylesheet">
    <!-- Theme styles END -->

    {{-- Css Pribadi --}}
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, 'Roboto', Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('css')
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="corporate">
    <!-- Start Header Area -->
    @include('front.layouts.menu')
    <!-- End Header Area -->

    @yield('content')

    <!-- BEGIN PRE-FOOTER -->
    {{-- <div class="pre-footer">
        <div class="container xl:px-[160px]">
            <div class="row">
                <!-- BEGIN BOTTOM ABOUT BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2>About us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod
                        tincidunt ut laoreet dolore magna aliquarm erat sit volutpat.</p>


                </div>
                <!-- END BOTTOM ABOUT BLOCK -->

                <!-- BEGIN BOTTOM CONTACTS -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2>Our Contacts</h2>
                    <address class="margin-bottom-40">
                        35, Lorem Lis Street, Park Ave<br>
                        California, US<br>
                        Phone: 300 323 3456<br>
                        Fax: 300 323 1456<br>
                        Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                        Skype: <a href="skype:metronic">metronic</a>
                    </address>


                </div>
                <!-- END BOTTOM CONTACTS -->

                <!-- BEGIN TWITTER BLOCK -->
                <div class="col-md-4 col-sm-6 pre-footer-col">
                    <h2 class="margin-bottom-0">Latest Tweets</h2>
                    <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2"
                        data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961"
                        data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by
                        @keenthemes...</a>
                </div>
                <!-- END TWITTER BLOCK -->
            </div>
        </div>
    </div> --}}
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="container xl:px-[160px]">
            <div class="row">
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-4 col-sm-4 padding-top-10">
                    <p class="MsoNormal">Graduate Program on Nuclear Science and Engineering</p>
                    <p class="MsoNormal">Faculty of Mathematics and Natural Sciences</p>
                    <p class="MsoNormal">Institut Teknologi Bandung</p>

                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN PAYMENTS -->
                <div class="col-md-4 col-sm-4">
                    <ul class="social-footer list-unstyled list-inline pull-right">
                        <li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-skype"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-github"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="javascript:;"><i class="fa fa-dropbox"></i></a></li>
                    </ul>
                </div>
                <!-- END PAYMENTS -->
                <!-- BEGIN POWERED -->
                <div class="col-md-4 col-sm-4 text-right">
                    <p class="powered">Powered by: <a href="http://www.keenthemes.com/">KeenThemes.com</a> dengan
                        perubahan dan penyesuaian</p>
                </div>
                <!-- END POWERED -->
            </div>
        </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/plugins/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('assets/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/corporate/scripts/back-to-top.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script><!-- pop up -->
    <script src="{{ asset('assets/plugins/owl.carousel/owl.carousel.min.js') }}" type="text/javascript"></script><!-- slider for products -->

    <script src="{{ asset('assets/corporate/scripts/layout.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/bs-carousel.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('assets/pages/scripts/portfolio.js') }}" type="text/javascript"></script> --}}

    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initTwitter();


            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling(); 
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    @yield('js')
</body>
<!-- END BODY -->

</html>
