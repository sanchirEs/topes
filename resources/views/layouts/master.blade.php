<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Easton - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<link rel="icon" href="/images/favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="/css/font-awesome-all.css" rel="stylesheet">
<link href="/css/flaticon.css" rel="stylesheet">
<link href="/css/owl.css" rel="stylesheet">
<link href="/css/bootstrap.css" rel="stylesheet">
<link href="/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="/css/animate.css" rel="stylesheet">
<link href="/css/color.css" rel="stylesheet">
<link href="/css/elpath.css" rel="stylesheet">
<link href="/css/jquery-ui.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link href="/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">


        <!-- preloader 
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">x</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
         preloader end -->


        <!--Search Popup 

        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="index.html"><img src="/images/logo.png" alt=""></a></figure>
                    <div class="close-search pull-right"><span class="far fa-times"></span></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="index.html">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required >
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         End Search Popup-->


        <!-- main header -->
        <header class="main-header header-style-two">
            <!-- header-top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner">
                        <div class="left-column">
                            <div class="text">
                                <p><i class="icon-45"></i>Best Electrical Service in USA.</p>
                            </div>
                        </div>
                        <div class="right-column">
                            <ul class="social-links clearfix">
                                <li><p>Follow Us:</p></li>
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-upper -->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="upper-inner">
                        <div class="logo-box">
                            <figure class="logo"><a href="/"><img src="/images/logo.png" alt=""></a></figure>
                        </div>
                        <!--
                        <ul class="info-list clearfix">
                            <li>
                                <div class="icon-box"><i class="icon-46"></i></div>
                                <h5>Sun-Thu: 8AM-5PM</h5>
                                <p>Friday Holiday</p>
                            </li>
                            <li>
                                <div class="icon-box"><i class="icon-47"></i></div>
                                <h5>Newyork, USA</h5>
                                <p>380 Albert St, Melborne</p>
                            </li>
                            <li>
                                <div class="icon-box"><i class="icon-48"></i></div>
                                <h5>Need Help?</h5>
                                <p><a href="tel:123045615523">+1 (230)-456-155-23</a></p>
                            </li>
                        </ul>
                        -->
                        <div class="header-lower">
                            <div class="auto-container">
                                <div class="outer-box">
                                    <div class="menu-area clearfix">
                                        <!--Mobile Navigation Toggler-->
                                        <div class="mobile-nav-toggler">
                                            <i class="icon-bar"></i>
                                            <i class="icon-bar"></i>
                                            <i class="icon-bar"></i>
                                        </div>
                                        <nav class="main-menu navbar-expand-md navbar-light">
                                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                                <ul class="navigation scroll-nav clearfix">
                                                    <li class="dropdown"><a href="/">Home</a>
                                                    </li>
                                                    <li><a href="#about">About</a></li>
                                                    <li><a href="#service">Services</a></li>
                                                    <li class="dropdown"><a href="/shop">Бүтээгдэхүүн</a>
                                                        <ul>
                                                            @foreach($categories as $category)
                                                            <li><a href="{{ url('shopcategory/'.$category->id) }}">{{ $category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li><a href="#gallery">Blog</a></li>
                                                    <li><a href="#testimonial">Testimonial</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="nav-right">
                                        <!--
                                        <div class="search-box-outer search-toggler">
                                            <i class="icon-5"></i>
                                        </div>
                                        -->
                                        <div class="btn-box">
                                            <a href="index.html" class="theme-btn btn-one">Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-lower -->

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="/"><img src="/images/logo.png" alt=""></a></figure>
                        </div>
                        <div class="menu-area clearfix">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="nav-right">
                            <!--
                            <div class="search-box-outer search-toggler">
                                <i class="icon-5"></i>
                            </div>
                            -->
                            <div class="btn-box">
                                <a href="index.html" class="theme-btn btn-one">Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
    </div>


        @yield('content')

            <!-- main-footer -->
            <footer class="main-footer p_relative bg-color-2">
            <div class="icon-layer"><img src="/images/icons/icon-5.png" alt=""></div>
            <div class="footer-top p_relative d_block">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="index.html"><img src="/images/footer-logo.png" alt=""></a></figure>
                                <div class="text">
                                    <p>Lorem ipsum dolor amet consecto adi pisicing elit sed eiusm tempor incididunt labore dolore magna aliqua enim ad minim.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_100">
                                <div class="widget-title">
                                    <h3>Links</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">Job</a></li>
                                        <li><a href="index.html">opportunities</a></li>
                                        <li><a href="index.html">Location</a></li>
                                        <li><a href="index.html">Article</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Services</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index.html">About</a></li>
                                        <li><a href="index.html">Services</a></li>
                                        <li><a href="index.html">Job</a></li>
                                        <li><a href="index.html">opportunities</a></li>
                                        <li><a href="index.html">Location</a></li>
                                        <li><a href="index.html">Article</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contacts</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li>Flat 20, Reynolds Neck, North Helenaville, FV77 8WS</li>
                                        <li><a href="tel:23055873407">+2(305) 587-3407</a></li>
                                        <li><a href="mailto:sample@example.com">sample@example.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom p_relative">
                <div class="auto-container">
                    <div class="bottom-inner p_relative">
                        <div class="copyright"><p><a href="index.html">Easton</a> &copy; 2022 All Right Reserved</p></div>
                        <ul class="footer-nav">
                            <li><a href="index.html">Terms of Service</a></li>
                            <li><a href="index.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
        
    </div>


    <!-- jequery plugins -->
    <script src="/js/jquery.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/owl.js"></script>
    <script src="/js/wow.js"></script>
    <script src="/js/validation.js"></script>
    <script src="/js/jquery.fancybox.js"></script>
    <script src="/js/appear.js"></script>
    <script src="/js/scrollbar.js"></script>
    <script src="/js/isotope.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/parallax-scroll.js"></script>
    <script src="/js/pagenav.js"></script>

    <!-- main-js -->
    <script src="/js/script.js"></script>

</body><!-- End of .page_wrapper -->
</html>