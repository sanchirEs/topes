@extends('layouts.master')

@section('content')

        <!-- Page Title -->
        <section class="page-title centred">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url{{ '/storage/'.$blog->featured_image }});"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Blog Details</h2>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.html">Home</a></li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- sidebar-page-container -->
        <section class="sidebar-page-container pt_120 pb_120">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="blog-details-content p_relative d_block">
                            <div class="news-block-one">
                                <div class="inner-box p_relative d_block">
                                    <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                                        @foreach($slides as $slide)
                                        <figure class="image-box">
                                            <img src="{{ '/storage/'.$slide->picture }}" alt="">
                                            <div class="category"><a href="blog-details.html">Installation</a></div>
                                        </figure>
                                        @endforeach
                                    </div>
                                    <div class="lower-content p_relative d_block">
                                        <h3>{{$blog->title}}</h3>
                                        <ul class="post-info clearfix">
                                            <li><i class="icon-42"></i>10 Oct, 2021</li>
                                            <li><i class="icon-43"></i><a href="blog-details.html">Ashley Bronks</a></li>
                                        </ul>
                                        {!! $blog->content !!}echo "# topes" >> README.md
                                    </div>
                                </div>
                            </div>
                            <div class="content-one">
                                <blockquote class="quote-box">
                                    <div class="icon-box"><i class="icon-31"></i></div>
                                    <p>Lorem ipsum dolor amet con sectur elitadicing elit sed do usmod tempor uincididunt enim minim veniam nostrud.</p>
                                    <h6>Kevin Spacey</h6>
                                </blockquote>
                                <div class="text">
                                    <h3>Home Electrical Repair</h3>
                                    <p>Aliqua enim ad minim veniam quis nostrud exercitation lamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                            <div class="content-two">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                                        <div class="text">
                                            <h5>Aliqua enim ad minim veniam quis nostrud exercitation.</h5>
                                            <p>Nostrud exerciation lamco laboris nis aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit.</p>
                                            <ul class="list-style-one clearfix">
                                                <li>Emergency power solutions</li>
                                                <li>Rapid response times</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                        <figure class="image-box"><img src="assets/images/news/news-17.jpg" alt=""></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="content-three">
                                <div class="text">
                                    <h3>Home Electrical Repair</h3>
                                    <p>Aliqua enim ad minim veniam quis nostrud exercitation lamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit anim id est laborum perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                            <div class="post-tags">
                                <ul class="tags-list clearfix">
                                    <li><h6>Tags:</h6></li>
                                    <li><a href="blog-details.html">Creative</a></li>
                                    <li><a href="blog-details.html">Marketing</a></li>
                                    <li><a href="blog-details.html">Idea</a></li>
                                </ul>
                            </div>
                            <div class="author-box">
                                <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                <h4>Gerard Butler</h4>
                                <p>Enim ad minim veniam quis nostrud exercitation lamco laboris nisi ex ea commodo consequat aute irure.</p>
                            </div>
                            <div class="comments-form-area">
                                <div class="group-title">
                                    <h3>Leave a Comment</h3>
                                </div>
                                <div class="form-inner">
                                    <form method="post" action="sendemail.php" id="contact-form"> 
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="text" name="username" placeholder="Your Name" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <input type="email" name="email" placeholder="Your email" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <input type="text" name="phone" required="" placeholder="Phone">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <textarea name="message" placeholder="Message"></textarea>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <div class="check-box">
                                                    <input class="check" type="checkbox" id="checkbox">
                                                    <label for="checkbox">I agree that my submitted data is being collected and stored. *</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0">
                                                <button class="theme-btn btn-one" type="submit" name="submit-form">Send Message <i class="far fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="blog-sidebar ml_20">
                            <div class="sidebar-widget search-widget">
                                <div class="widget-title">
                                    <h4>Search</h4>
                                </div>
                                <form action="blog-2.html" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Search" required="">
                                        <button type="submit"><i class="icon-63"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Power Tools</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Electrical & Lighting</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Measuring Tools</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Ware Accessories</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Hammer Drills</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Screw Driver</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Home Appliance</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>Accessories</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget post-widget">
                                <div class="widget-title">
                                    <h4>Recent Posts</h4>
                                </div>
                                <div class="post-inner">
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img src="assets/images/news/post-1.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">The Importance Of The Air Quality.</a></h5>
                                        <div class="post-date"><i class="icon-42"></i>Oct 20, 2022</div>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img src="assets/images/news/post-2.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">Best Basic Electric Safety Rules.</a></h5>
                                        <div class="post-date"><i class="icon-42"></i>Oct 19, 2022</div>
                                    </div>
                                    <div class="post">
                                        <figure class="post-thumb"><a href="blog-details.html"><img src="assets/images/news/post-3.jpg" alt=""></a></figure>
                                        <h5><a href="blog-details.html">Electric Wiring For Home & Office.</a></h5>
                                        <div class="post-date"><i class="icon-42"></i>Oct 18, 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-widget category-widget">
                                <div class="widget-title">
                                    <h4>Archives</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        <li><a href="blog-details.html"><i class="icon-7"></i>November 2016 (3)</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>December 2017 (8)</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>January 2018 (2)</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>February 2019 (10)</a></li>
                                        <li><a href="blog-details.html"><i class="icon-7"></i>March 2020 (2)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-widget tags-widget">
                                <div class="widget-title">
                                    <h4>Tags</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="tags-list clearfix">
                                        <li><a href="blog-details.html">Electrical</a></li>
                                        <li><a href="blog-details.html">Repairs</a></li>
                                        <li><a href="blog-details.html">Bulb</a></li>
                                        <li><a href="blog-details.html">Commercial</a></li>
                                        <li><a href="blog-details.html">Energy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sidebar-page-container end -->


        <!-- subscribe-section -->
        <section class="subscribe-section p_relative">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text p_relative d_block">
                                <h2>Subscribe to Our Newsletter</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner p_relative d_block">
                                <form action="index.html" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your email address" required="">
                                        <button type="submit">Subscribe Now<i class="icon-7"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->

        @endsection