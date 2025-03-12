@extends('layouts.master')

@section('content') 
 
 
 
 <!-- Page Title -->
        <section class="page-title centred">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/images/background/page-title.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Холбоо барих</h2>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Нүүр</a></li>
                        <li>Холбоо барих</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- contact-style-three -->
        <section class="contact-style-three">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                        <div class="contact-info mr_70">
                            <h3>Get In Touch</h3>
                            <p>Give us a call or drop by anytime, we answer all enquiries within 24 hours.</p>
                            <ul class="info-list clearfix">
                                <li>Modesto, 629 12th St, CA 95354 United States</li>
                                <li><a href="mailto:infomain@gmail.com">infomain@gmail.com</a></li>
                                <li><a href="tel:123045615523">+1 (230)-456-155-23</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 form-column">
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
        </section>
        <!-- contact-style-three end -->


        <!-- google-map-section -->
        <section class="google-map-section">
            <div class="map-inner p_relative d_block">
                <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d293.2866614396653!2d106.89191737250135!3d47.91653551482014!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5d9692f8551b26e3%3A0x159ef01b16871d84!2zV1Y4UitKUFIgMTItMiwg0JHQk9CUIC0gMTYg0YXQvtGA0L7Qviwg0KPQu9Cw0LDQvdCx0LDQsNGC0LDRgCAxNjA0MA!5e1!3m2!1smn!2smn!4v1740557843088!5m2!1smn!2smn" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe>

                </div>
            </div>
        </section>
        <!-- google-map-section end -->

        @endsection
