@extends('layouts.master')

@section('content')



<!-- Page Title -->
<section class="page-title centred">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/images/background/page-title.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>About Us</h2>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- about-section -->
        <section class="about-section sec-pad">
            <div class="pattern-layer-2" style="background-image: url(/images/shape/shape-24.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_eight">
                            <div data-animation-box class="image-box p_relative d_block">
                                <div class="shape">
                                    <div class="shape-1" style="background-image: url(/images/shape/shape-45.png);"></div>
                                    <div class="shape-2" style="background-image: url(/images/shape/shape-45.png);"></div>
                                </div>
                                <div class="icon-box float-bob-y"><img src="/images/icons/icon-1.png" alt=""></div>
                                <figure data-animation-text class="overlay-anim-black-bg image image-1" data-animation="overlay-animation"><img src="/images/resource/about-5.jpg" alt=""></figure>
                                <figure class="image image-2"><img src="/images/resource/about-6.jpg" alt=""></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box p_relative d_block ml_30">
                                <div class="sec-title p_relative mb_25">
                                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">About Us</h5>
                                    <h2 class="d_block fs_40 lh_50 fw_bold">Residential & Commercial Electrical Services</h2>
                                </div>
                                <div class="text p_relative d_block mb_30">
                                    <p>All of our services are backed by our 100% satisfaction guarantee. Our electricians can install anything from new security lighting for outdoors to a whole home generator that will keep your appliances working during a power outage.</p>
                                </div>
                                <div class="inner p_relative d_block mb_40">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><i class="icon-9"></i></div>
                                                <h4>Emergency Repairs</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                            <div class="single-item">
                                                <div class="icon-box"><i class="icon-10"></i></div>
                                                <h4>Rewiring and Check-up</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-style-one clearfix">
                                    <li>Emergency power solutions (generators)</li>
                                    <li>Wiring and installation/upgrades</li>
                                    <li>Full-service electrical layout, design</li>
                                </ul>
                                <figure class="signature"><img src="/images/icons/signature-1.png" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- service-style-three -->
        <section class="service-style-three p_relative sec-pad bg-color-3 centred">
            <div class="pattern-layer" style="background-image: url(/images/shape/shape-32.png);"></div>
            <div class="auto-container">
                <div class="sec-title p_relative mb_50">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Our Services</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">We are a Full Service Electrical <br />Contractor</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="air-conditioning.html"><img src="/images/service/service-9.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-15"></i></div>
                                </div>
                                <h3><a href="air-conditioning.html">Air Conditioning</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="air-conditioning.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="heating-service.html"><img src="/images/service/service-10.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-16"></i></div>
                                </div>
                                <h3><a href="heating-service.html">Heating Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="heating-service.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="electrical-panels.html"><img src="/images/service/service-11.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-17"></i></div>
                                </div>
                                <h3><a href="electrical-panels.html">Eectrical Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="electrical-panels.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="air-conditioning.html"><img src="/images/service/service-9.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-15"></i></div>
                                </div>
                                <h3><a href="air-conditioning.html">Air Conditioning</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="air-conditioning.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="heating-service.html"><img src="/images/service/service-10.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-16"></i></div>
                                </div>
                                <h3><a href="heating-service.html">Heating Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="heating-service.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="electrical-panels.html"><img src="/images/service/service-11.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-17"></i></div>
                                </div>
                                <h3><a href="electrical-panels.html">Eectrical Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="electrical-panels.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="air-conditioning.html"><img src="/images/service/service-9.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-15"></i></div>
                                </div>
                                <h3><a href="air-conditioning.html">Air Conditioning</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="air-conditioning.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="heating-service.html"><img src="/images/service/service-10.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-16"></i></div>
                                </div>
                                <h3><a href="heating-service.html">Heating Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="heating-service.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><a href="electrical-panels.html"><img src="/images/service/service-11.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                    <div class="icon-shape" style="background-image: url(/images/shape/shape-31.png);"></div>
                                    <div class="icon"><i class="icon-17"></i></div>
                                </div>
                                <h3><a href="electrical-panels.html">Eectrical Service</a></h3>
                                <p>Lorem ipsum dolor amet consectur adicing elit sed.</p>
                                <div class="link"><a href="electrical-panels.html"><span>Read more</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-style-three end -->


        <!-- testimonial-style-two -->
        <section class="testimonial-style-two about-page p_relative">
            <div class="bg-layer"></div>
            <div class="auto-container">
                <div class="sec-title light p_relative mb_50 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Testimonials</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">What Our Client Say <br />About Easton.</h2>
                </div>
                <div class="two-item-carousel owl-carousel owl-theme owl-nav-none">
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Adipisicing elit sed do eiusmod tempor incid labore et dolore magna aliqua enim minim quis veniam nostrud exercition ulamco laboris nis aliquip commodo.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Electrician</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-style-two end -->


        <!-- working-style-two -->
        <section class="working-style-two p_relative sec-pad">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 title-column">
                         <div class="sec-title p_relative">
                            <h5 class="d_block fs_17 lh_25 fw_medium mb_9">How It’s Work</h5>
                            <h2 class="d_block fs_40 lh_50 fw_bold">3 Easiest Step To Work with Easton</h2>
                        </div>
                    </div>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box centred">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn" data-tab="#tab-1"><i class="icon-49"></i></li>
                            <li class="tab-btn active-btn" data-tab="#tab-2"><i class="icon-50"></i></li>
                            <li class="tab-btn" data-tab="#tab-3"><i class="icon-51"></i></li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab" id="tab-1">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="text mr_30">
                                        <h3><i class="icon-45"></i>Make An Appointment</h3>
                                        <p>Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <a href="appointment.html" class="theme-btn btn-one">Appointment</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image-box ml_120">
                                        <div class="shape" style="background-image: url(/images/shape/shape-33.png);"></div>
                                        <figure class="image"><img src="/images/resource/working-5.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab active-tab" id="tab-2">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="text mr_30">
                                        <h3><i class="icon-45"></i>Select Your Service</h3>
                                        <p>Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <a href="appointment.html" class="theme-btn btn-one">Appointment</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image-box ml_120">
                                        <div class="shape" style="background-image: url(/images/shape/shape-33.png);"></div>
                                        <figure class="image"><img src="/images/resource/working-4.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-3">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="text mr_30">
                                        <h3><i class="icon-45"></i>Handover Service</h3>
                                        <p>Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <a href="appointment.html" class="theme-btn btn-one">Appointment</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="image-box ml_120">
                                        <div class="shape" style="background-image: url(/images/shape/shape-33.png);"></div>
                                        <figure class="image"><img src="/images/resource/working-6.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- working-style-two end -->


        <!-- project-style-two -->
        <section class="project-style-two">
            <div class="outer-container">
                <div class="project-carousel-2 owl-carousel owl-theme owl-dots-none nav-style-one">
                    <div class="project-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><img src="/images/project/project-5.jpg" alt=""></figure>
                            <div class="view-btn"><a href="/images/project/project-5.jpg" class="lightbox-image" data-fancybox="gallery"><i class="icon-28"></i></a></div>
                            <div class="text">
                                <h4><a href="project-details.html">House Wiring Repair</a></h4>
                                <span>Installation</span>
                            </div>
                        </div>
                    </div>
                    <div class="project-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><img src="/images/project/project-6.jpg" alt=""></figure>
                            <div class="view-btn"><a href="/images/project/project-6.jpg" class="lightbox-image" data-fancybox="gallery"><i class="icon-28"></i></a></div>
                            <div class="text">
                                <h4><a href="project-details.html">House Wiring Repair</a></h4>
                                <span>Installation</span>
                            </div>
                        </div>
                    </div>
                    <div class="project-block-two">
                        <div class="inner-box">
                            <figure class="image-box"><img src="/images/project/project-7.jpg" alt=""></figure>
                            <div class="view-btn"><a href="/images/project/project-7.jpg" class="lightbox-image" data-fancybox="gallery"><i class="icon-28"></i></a></div>
                            <div class="text">
                                <h4><a href="project-details.html">House Wiring Repair</a></h4>
                                <span>Installation</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- project-style-two end -->


        <!-- team-style-two -->
        <section class="team-style-two p_relative">
            <div class="auto-container">
                <div class="sec-title p_relative mb_45 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Our Staff</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">Our Professional Electrician <br />Staff</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-4.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Jack Nicholson</a></h3>
                                <span class="designation">Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-5.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Robert Downey</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-6.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Gerard Butler</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-4.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Jack Nicholson</a></h3>
                                <span class="designation">Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-5.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Robert Downey</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-6.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Gerard Butler</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-4.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Jack Nicholson</a></h3>
                                <span class="designation">Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-5.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Robert Downey</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                    <div class="team-block-two">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="/images/team/team-6.jpg" alt=""></figure>
                                <ul class="social-links clearfix">
                                    <li><a href="index-3.html"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="index-3.html"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="content-box">
                                <h3><a href="index-3.html">Gerard Butler</a></h3>
                                <span class="designation">Electrician</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-style-two end -->


        @endsection