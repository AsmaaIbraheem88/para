
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Para-@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('uploads/settings/'.$settings->icon)}}">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v3.3.7 css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon.css')}}">
    <!-- magnific-popup.css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
    <!-- slicknav.min.css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slicknav.min.css')}}">
    <!-- slicknav.min.css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/styles.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header-area start -->
    <header class="header-area bg-1" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-9 col-sm-8 col-6">
                    <div class="logo">
                        <a href="{{url('')}}"><img src="{{asset('uploads/settings/'.$settings->logo)}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="mainmenu" id ="nav">
                        <ul class="navigation">
                            <li class="{{ Request::is('/') ? 'active' : '' }}" data-scroll="home"><a href="{{url('')}}">Home</a>
                               
                            </li>
                           
                            <li  data-scroll="about"><a href="{{ url(request()->is('/') ? '#' : '/#about') }}">About</a>
                               
                            </li>
                            <li data-scroll="projects"><a href="{{ url(request()->is('/') ? '#' : '/#projects') }}">Projects</a>
                            </li>
                           
                            <li data-scroll="services"><a href="{{ url(request()->is('/') ? '#' : '/#services') }}">Services</a></li>
                            @if($section->team =='open')   
                            <li class="{{ Request::is('team') ? 'active' : '' }}" ><a href="{{url('team')}}">Team</a></li>
                            @endif
                            <li class="{{ Request::is('contact') ? 'active' : '' }}" ><a href="{{url('contact')}}">Contact</a></li>

                          
                        </ul>
                    </div>
                </div>
               
                <div class="col-md-1 col-sm-1 col-2 d-lg-none d-sm-block">
                    <div class="responsive-menu-wrap floatright"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area end -->

   
    @yield('content')


     <!-- footer-area start -->
    <footer class="footer-area" >
        <div class="footer-top bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-12">
                        <div class="footer-widget footer-logo">
                            <img src="{{asset('uploads/settings/'.$settings->logo)}}" alt="">
                            <p>{{$settings->footer_msg}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer-widget footer-contact">
                            <h4 class="widget-title">GET IN TOUCH</h4>
                            <ul>
                                <li><i class="fa fa-home"></i> {{$settings->address}}</li>
                                <li><i class="fa fa-phone"></i> {{$settings->phone}}</li>
                                <li><i class="fa fa-fax"></i>{{$settings->fax}}</li>
                                <li><i class="fa fa-envelope"></i> {{$settings->email}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="footer-widget footer-menu">
                            <h4 class="widget-title">Services</h4>
                            <ul>
                            <li class="{{ Request::is('/') ? 'active' : '' }}" data-scroll="home"><a href="{{url('')}}">Home</a></li>
                            @if($section->team =='open') 
                               <li class="{{ Request::is('team') ? 'active' : '' }}" ><a href="{{url('team')}}">Team</a></li>
                            @endif     
                               <li class="{{ Request::is('contact') ? 'active' : '' }}" ><a href="{{url('contact')}}">Contact</a></li>
   
                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </footer>
    <!-- footer-area start -->

    <!-- /////////social media/////////// -->

    <div id="fixed-social">
        <div>
            <a href="{{$settings->facebook}}" class="fixed-facebook" target="_blank"><i class="fa fa-facebook"></i> <span>Facebook</span></a>
        </div>
        <div>
            <a href="{{$settings->twitter}}" class="fixed-twitter" target="_blank"><i class="fa fa-twitter"></i> <span>Twitter</span></a>
        </div>
    
        <div>
            <a href="{{$settings->linkedin}}" class="fixed-linkedin" target="_blank"><i class="fa fa-linkedin"></i> <span>LinkedIn</span></a>
        </div>
        <div>
            <a href="{{$settings->instgram}}" class="fixed-instagrem" target="_blank"><i class="fa fa-instagram"></i> <span>Instagram</span></a>
        </div>
    
    </div>

    <!-- /////////social media//////////// -->
   

    
    <!-- jquery latest version -->
    <script src="{{asset('frontend/assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- popper.min.js -->
    <script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <!-- slick.min.js -->
    <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
    
    <!-- plugins js -->
    <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

   
   
   

@stack('js') 
</body>

</html>