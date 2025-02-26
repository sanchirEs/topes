@extends('layouts.master')

@section('content')
        <!-- banner-section -->
        <section class="banner-section banner-style-two p_relative">
            <div class="shape">
                <div class="shape-5 p_absolute l_0 b_0 z_2"></div>
                <div class="shape-4 p_absolute l_0 b_0 z_2"></div>
            </div>
            <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                <div class="slide-item p_relative pt_120">
                    <div class="image-layer p_absolute" style="background-image:url(/images/banner/banner-1.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box p_relative d_block z_5">
                            <h2 class="p_relative d_block fs_60 lh_70 fw_bold mb_9">Монголын <span>шилдэг </span> цахилгааны үйлчилгээ</h2>
                            <p class="p_relative d_block fs_18">Бид барилгын цахилгаан, холбоо дохиолол, автоматжуулалт, угсралтын дараах засвар үйлчилгээний цогц шийдлийг санал болгож байна. Бидний мэргэшсэн баг таны төсөлд хамгийн өндөр түвшний мэргэжлийн үйлчилгээг үзүүлнэ.</p>
                            <div class="btn-box"><a href="about.html" class="theme-btn btn-one">Компанийн тухай</a></div>
                        </div> 
                    </div>
                </div>
                <!-- <div class="slide-item p_relative pt_120">
                    <div class="image-layer p_absolute" style="background-image:url(/images/banner/banner-5.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box p_relative d_block z_5">
                        <h2 class="p_relative d_block fs_60 lh_70 fw_bold mb_9">Таны гэр бүлд зориулсан шилдэг <span>цахилгааны</span> үйлчилгээ</h2>
                        <p class="p_relative d_block fs_18">Энэ бол жишээний текст: туршлагатай баг таны гэр бүлд аюулгүй байдал, чанар, тав тухыг санал болгодог.</p>
                        <div class="btn-box"><a href="about.html" class="theme-btn btn-one">Компанийн тухай</a></div>
                        </div> 
                    </div>
                </div>
                <div class="slide-item p_relative pt_120">
                    <div class="image-layer p_absolute" style="background-image:url(/images/banner/banner-6.jpg)"></div>
                    <div class="auto-container">
                        <div class="content-box p_relative d_block z_5">
                            <h2 class="p_relative d_block fs_60 lh_70 fw_bold mb_9">Таны гэр бүлд зориулсан шилдэг <span>цахилгааны</span> үйлчилгээ</h2>
                            <p class="p_relative d_block fs_18">Энэ бол жишээний текст: туршлагатай баг таны гэр бүлд аюулгүй байдал, чанар, тав тухыг санал болгодог.</p>
                            <div class="btn-box"><a href="about.html" class="theme-btn btn-one">Компанийн тухай</a></div>
                        </div> 
                    </div>
                </div> -->
            </div>
        </section>
        <!-- banner-section end -->


        <!-- feature-style-two -->
        <section class="feature-style-two centred p_relative" id='service'>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                            <div class="feature-block-two wow fadeInUp" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="shape-1"></div>
                                    <div class="shape-2"></div>
                                    <div class="icon-box p_relative d_iblock w_100 h_100 lh_100 text-center b_radius_50 fs_50 z_1 tran_5"><i class="icon-12"></i></div>
                                    <h3 class="p_relative d_block"><a href="index-2.html">{!! $service->title !!}</a></h3>
                                    <p>{{$service->description}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-style-two end -->


        <!-- about-style-two -->
        <section class="about-style-two p_relative pb_120" id="about">
            <div class="auto-container">
                <div class="sec-title p_relative mb_50 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">БИДНИЙ ТУХАЙ</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">ТОП ЭЛЕКТРО СИГНАЛ ХХК  </h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_seven">
                            <div class="content-box">
                                <div class="text p_relative d_block mb_25">
                                    <p class="fw_medium bold-text mb_25">Бид бүх төрлийн цахилгаан угсралт, суурилуулалт, уггал шалгалтыг найдвартай гүйцэтгэдэг.</p>
                                    <p class="fw_medium bold-text mb_25">Таны аюулгүй байдал бидний тэргүүлэх зорилт тул туршлагатай инженер, цахилгаанчид манай танд найдвартай үйлчилгээг санал болгож байна.</p>
                                    <!-- <p class="fw_medium bold-text mb_25">Бид бүх төрлийн цахилгаан угсралт, суурилуулалт, уггал шалгалтыг найдвартай гүйцэтгэдэг.  </p> -->
                                    </div>
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 left-column">
                                            <div class="left-content">
                                                <h4>Үйлчилгээний онцлог:</h4>
                                                <ul class="list-style-one clearfix">
                                                    <li>Олон жилийн туршлагатай цахилгаан инженерүүд </li>
                                                    <li>Олон улсын стандартад нийцсэн угсралт, суурилуулалт</li>
                                                    <li>Цахилгааны иж бүрэн зураг төсөл, төлөвлөлт</li>
                                                </ul>
                                                <div class="btn-box"><a href="about.html" class="theme-btn btn-one">Дэлгэрэнгүй</a></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 right-column">
                                            <div class="right-content mt_8">
                                                <div class="single-item">
                                                    <div class="icon-box"><i class="icon-10"></i></div>
                                                    <h4>Шинэчлэн угсралт, үзлэг шалгалт</h4>
                                                </div>
                                                <div class="single-item">
                                                    <div class="icon-box"><i class="icon-9"></i></div>
                                                    <h4>Яаралтай засвар үйлчилгээ </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_eight">
                            <div class="content-box ml_30 pl_70 pb_40">
                                <figure class="image-box"><img src="/images/resource/project-4.jpg" alt=""></figure>
                                <div class="text centred">
                                    <div class="icon-box"><i class="icon-37"></i></div>
                                    <p class="fs_20 lh_30 fw_medium mb_10">Холбоо барих</p>
                                    <h3><a href="tel:0124357689">+976 91114532 </a></h3>
                                </div>
                                <div >
                                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="icon-27"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two -->


        <!-- service-style-two -->
        <!-- <section class="service-style-two sec-pad" id="service">
            <div class="auto-container">
                <div class="sec-title p_relative centred mb_50">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Our Services</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">We are a Full Service Electrical <br />Contractor</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    @foreach($services as $service)
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="air-conditioning.html"><img src="{{ '/storage/'.$service->picture }}" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-15"></i></div>
                                <h3><a href="air-conditioning.html">{!! $service->title !!}</a></h3>
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section> -->
        <!-- service-style-two end -->


        <!-- funfact-style-two -->
        <section class="funfact-style-two centred">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-38"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="90">0</span>
                                    </div>
                                    <p>Амжилттай төслүүд</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-39"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="2.6">0</span><span>m</span>
                                    </div>
                                    <p>Үйлчлүүлэгчид</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-40"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="35">0</span>
                                    </div>
                                    <p>Энжинерүүд</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 counter-block">
                            <div class="counter-block-two">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-41"></i></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text" data-speed="1500" data-stop="10">0</span>
                                    </div>
                                    <p>Ажилласан жил</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- funfact-style-two end -->


        <!-- chooseus-style-two -->
        <section class="chooseus-style-two p_relative">
            <div class="shape">
                <div class="shape-1"></div>
                <div class="shape-2"></div>
                <div class="shape-3" style="background-image: url(/images/shape/shape-14.png);"></div>
            </div>
            <figure class="image-layer"><img src="/images/resource/vector-1.png" alt=""></figure>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                        <div class="content-box p_relative d_block mr_30">
                            <div class="sec-title p_relative mb_20">
                                <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Why Choose Us</h5>
                                <h2 class="d_block fs_40 lh_50 fw_bold">Яагаад биднийг сонгох хэрэгтэй вэ?  </h2>
                            </div>
                            <div class="text p_relative d_block mb_40">
                                <p>Таны аюулгүй байдал бидний хамгийн чухал зорилт. Манай туршлагатай инженерүүд болон техникчид эелдэг харилцаатай, цаг баримталдаг бөгөөд таны сонирхсон асуултад бүрэн дүүрэн, ойлгомжтой байдлаар хариулна.</p>
                            </div>
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-21"></i></div>
                                            <h4>Бодит үнэлгээтэй, оновчтой шийдэл</h4>
                                            <!-- <p>Lorem ipsum dolor amet con adicing elit sed.</p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-22"></i></div>
                                            <h4>Мэргэжлийн цахилгаан инженерүүд</h4>
                                            <!-- <p>Lorem ipsum dolor amet con adicing elit sed.</p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-23"></i></div>
                                            <h4>Олон жилийн туршлагатай, найдвартай үйлчилгээ</h4>
                                            <!-- <p>Lorem ipsum dolor amet con adicing elit sed.</p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-25"></i></div>
                                            <h4>24/7 холбоо барих боломжтой</h4>
                                            <!-- <p>Lorem ipsum dolor amet con adicing elit sed.</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- chooseus-style-two end -->


        <!-- project-section -->
        <section class="project-section" id="gallery">
            <div class="outer-container">
                <div class="project-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    @foreach($blogs as $blog)
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ '/storage/'.$blog->picture }}" alt=""></figure>
                            <div class="view-btn"><a href="{{ '/storage/'.$blog->picture }}" class="lightbox-image" data-fancybox="gallery"><i class="icon-28"></i></a></div>
                            <div class="text">
                                <h4><a href="project-details.html">{{$blog->title}}</a></h4>
                                <span>{{$blog->name}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- project-section end -->


        <!-- working-section 
        <section class="working-section p_relative sec-pad">
            <div class="shape">
                <div class="shape-1" style="background-image: url(/images/shape/shape-15.png);"></div>
                <div class="shape-2" style="background-image: url(/images/shape/shape-16.png);"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title p_relative mb_35 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">How It’s Work</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">3 Easiest Step To Work <br />with Easton</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box centred">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1"><i class="icon-49"></i></li>
                            <li class="tab-btn" data-tab="#tab-2"><i class="icon-50"></i></li>
                            <li class="tab-btn" data-tab="#tab-3"><i class="icon-51"></i></li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="/images/resource/working-1.jpg" alt=""></figure>
                                        <div class="text centred">
                                            <h2>Step</h2>
                                            <h3>01</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box ml_30">
                                        <h3>Make An Appointment</h3>
                                        <p>Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="btn-box">
                                            <a href="appointment.html" class="theme-btn btn-one">Appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="/images/resource/working-2.jpg" alt=""></figure>
                                        <div class="text centred">
                                            <h2>Step</h2>
                                            <h3>02</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box ml_30">
                                        <h3>Select Your Service</h3>
                                        <p>Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident sunt in culpa.</p>
                                        <ul class="list-style-one clearfix">
                                            <li>Emergency power solutions</li>
                                            <li>Wiring and installation</li>
                                            <li>Full-service electrical layout</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab" id="tab-3">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                                    <div class="inner-box">
                                        <figure class="image-box"><img src="/images/resource/working-3.jpg" alt=""></figure>
                                        <div class="text centred">
                                            <h2>Step</h2>
                                            <h3>03</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                                    <div class="content-box ml_30">
                                        <h3>Handover Service</h3>
                                        <p class="mb_25">Adipisicing elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercition ulamco laboris nis aliquip commodo consequat duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                                        <p>Cillum dolore eu fugiat nulla pariatur. excepteur sint occaecat cup idatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        working-section end -->


        <!-- search-field-two -->
        <!-- <section class="search-field-two p_relative">
            <div class="pattern-layer" style="background-image: url(/images/shape/shape-17.png);"></div>
            <div class="auto-container">
                <div class="title-text centred p_relative d_block">
                    <h2>To Take Service Please Contact <br />with Our Expert</h2>
                </div>
                <div class="search-area">
                    <form action="index.html" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <input type="text" name="name" placeholder="Your name" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Your email" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <div class="icon"><i class="icon-8"></i></div>
                                <input type="text" name="date" placeholder="Date" id="datepicker">
                            </div>
                        </div>
                        <div class="btn-box">
                            <button type="submit" class="theme-btn btn-one">Get Services</button>
                        </div>
                    </form>
                </div>
            </div>
        </section> -->
        <!-- search-field-two end -->


        <!-- faq-section -->
        <section class="faq-section p_relative">
            <div class="bg-layer" style="background-image: url(/images/resource/faq-1.jpg);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_five">
                            <div class="content-box p_relative d_block mr_30">
                                <div class="sec-title p_relative mb_50">
                                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Түгээмэл асуултууд</h5>
                                    <h2 class="d_block fs_40 lh_50 fw_bold mb_25">Түгээмэл асуултууд</h2>
                                    <p class="fs_16">Манай бүх үйлчилгээ 100% сэтгэл ханамжийн баталгаатай.</p>
                                </div>
                                <ul class="accordion-box">
                                    <li class="accordion block active-block">
                                        <div class="acc-btn active">
                                            <div class="icon-outer"><i class="far fa-angle-down"></i></div>
                                            <h5>Орон сууцны цахилгааны засвар, угсралт хийдэг үү?</h5>
                                        </div>
                                        <div class="acc-content current">
                                            <div class="text">
                                                <p>Бид төрлийн обьектод цахилгааны бүх төрлийн үйлчилгээ үзүүлдэг. Мэргэжлийн инженер, техникийн баг нь стандартын дагуу монтаж, засварын ажлыг шуурхай гүйцэтгэнэ.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><i class="far fa-angle-down"></i></div>
                                            <h5>Та бүхэн албан ёсны зөвшөөрөлтэй, даатгалтай юу?</h5>
                                        </div>
                                        <div class="acc-content">
                                            <div class="text">
                                                <p>Тийм ээ. Манай компани холбогдох төрийн байгууллагаас олгосон тусгай зөвшөөрөлтэй бөгөөд бүх ажилтнууд мэргэжлийн даатгалтай.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><i class="far fa-angle-down"></i></div>
                                            <h5>Аж ахуйн нэгжийн цахилгааны засвар үйлчилгээ хийдэг үү?</h5>
                                        </div>
                                        <div class="acc-content">
                                            <div class="text">
                                                <p>Мэдээж. Үйлдвэр, оффис, үйлчилгээний газар, томоохон обьектуудад цахилгааны угсралт, өргөтгөл, засвар үйлчилгээний ажлуудыг хийдэг.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-section end -->


        <!-- clients-section -->
        <section class="clients-section p_relative">
            <div class="auto-container">
                <div class="five-item-carousel owl-carousel owl-theme owl-nav-none owl-dots-none">
                    @foreach($partners as $partner)
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="{{ '/storage/'.$partner->picture }}" alt=""></a></figure>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- clients-section end -->


        <!-- testimonial-style-two 
        <section class="testimonial-style-two p_relative" id="testimonial">
            <div class="auto-container">
                <div class="sec-title p_relative mb_50 centred">
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
        testimonial-style-two end -->


        <!-- cta-style-two -->
        <section class="cta-style-two p_relative">
            <div class="pattern-layer">
                <div class="pattern-1" style="background-image: url(/images/shape/shape-19.png);"></div>
                <div class="pattern-2" style="background-image: url(/images/shape/shape-20.png);"></div>
                <div class="pattern-3 float-bob-y" style="background-image: url(/images/shape/shape-21.png);"></div>
            </div>
            <div class="auto-container">
                <div class="row align-items-center clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image-box mr_70">
                            <div class="shape">
                                <div class="shape-1" style="background-image: url(/images/shape/shape-18.png);"></div>
                                <div class="shape-2"></div>
                            </div>
                            <figure class="image"><img src="/images/resource/vector-2.png" alt=""></figure>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content-box p_relative ml_70 mr_70">
                            <div class="sec-title light p_relative mb_13">
                                <h5 class="d_block fs_17 lh_25 fw_medium mb_13">Холбоо барих</h5>
                                <h2 class="d_block fs_40 lh_50 fw_bold">Бидэнтэй хамтран ажиллахыг хүсвэл</h2>
                            </div>
                            <div class="text p_relative d_block">
                                <p>Бид харилцагч байгууллагууддаа найдвартай, өндөр чанартай цахилгаан угсралт, засвар үйлчилгээний цогц шийдлийг санал болгож байна. Хэрэв та мэргэжлийн, баталгаатай хамтын ажиллагааг эрэлхийлж байгаа бол бидэнтэй холбогдоорой.</p>
                            </div>
                            <div class="support-box">
                                <div class="icon-box"><i class="icon-37"></i></div>
                                <p>Яаралтай тусламж хэрэгтэй юу?</p>
                                <h3><a href="tel:01243507689">+976-9911-4532</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-style-two end -->


        <!-- news-section 
        <section class="news-section p_relative sec-pad" id="news">
            <div class="auto-container">
                <div class="sec-title p_relative mb_50 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Latest News</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">Stay Update with <br />Easton News</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box p_relative d_block">
                                <figure class="image-box"><a href="blog-details.html"><img src="/images/news/news-1.jpg" alt=""></a></figure>
                                <div class="lower-content p_relative d_block">
                                    <h3><a href="blog-details.html">The Importance Of The Air Quality.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li><i class="icon-42"></i>10 Oct, 2021</li>
                                        <li><i class="icon-43"></i><a href="blog-details.html">Ashley Bronks</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consecte adipisicing sed eiusmod tempor incid idunt labore dolore.</p>
                                    <div class="link"><a href="blog-details.html">Read more<i class="icon-7"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box p_relative d_block">
                                <figure class="image-box"><a href="blog-details.html"><img src="/images/news/news-2.jpg" alt=""></a></figure>
                                <div class="lower-content p_relative d_block">
                                    <h3><a href="blog-details.html">How to Repair Electricity to Car Engine.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li><i class="icon-42"></i>09 Oct, 2021</li>
                                        <li><i class="icon-43"></i><a href="blog-details.html">Ashley Bronks</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consecte adipisicing sed eiusmod tempor incid idunt labore dolore.</p>
                                    <div class="link"><a href="blog-details.html">Read more<i class="icon-7"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box p_relative d_block">
                                <figure class="image-box"><a href="blog-details.html"><img src="/images/news/news-3.jpg" alt=""></a></figure>
                                <div class="lower-content p_relative d_block">
                                    <h3><a href="blog-details.html">Electrical Wiring For Home & Office.</a></h3>
                                    <ul class="post-info clearfix">
                                        <li><i class="icon-42"></i>08 Oct, 2021</li>
                                        <li><i class="icon-43"></i><a href="blog-details.html">Ashley Bronks</a></li>
                                    </ul>
                                    <p>Lorem ipsum dolor sit amet consecte adipisicing sed eiusmod tempor incid idunt labore dolore.</p>
                                    <div class="link"><a href="blog-details.html">Read more<i class="icon-7"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         news-section end -->


        <!-- subscribe-section 
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
        subscribe-section end -->

        @endsection