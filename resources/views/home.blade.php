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
        <section class="feature-style-two centred p_relative">
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
        <section class="about-style-two p_relative pb_60 ">
            <div class="auto-container">
                <div class="sec-title p_relative mb_50 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Бидний тухай</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">ТОП ЭЛЕКТРО СИГНАЛ ХХК</h2>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_seven">
                            <div class="content-box">
                                <div class="text p_relative d_block mb_25">
                                    <p class="fw_medium bold-text mb_25">Бид бүх төрлийн цахилгаан угсралт, суурилуулалт, үзлэг шалгалтыг найдвартай гүйцэтгэнэ.</p>
                                    <p class="mb_25">Таны аюулгүй байдал бидний тэргүүлэх зорилт тул туршлагатай инженер, цахилгаанчид маань танд найдвартай үйлчилгээг санал болгож байна.</p>
                                    <!-- <p>Бид таны цагийг үнэ цэнэтэй гэж үздэг тул товлосон цагтаа ирж, ажлыг хамгийн түргэн, зөвөөр гүйцэтгэхийг эрмэлздэг.</p> -->
                                </div>
                                <div class="inner-box">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-6 col-sm-12 left-column">
                                            <div class="left-content">
                                                <h4>Манай үйлчилгээний онцлог:</h4>
                                                <ul class="list-style-one clearfix">
                                                    <li>Олон жилийн туршлагатай цахилгааны инженерүүд</li>
                                                    <!-- <li>Түргэн шуурхай, чанартай үйлчилгээ</li> -->
                                                    <li>Олон улсын стандартын дагуу угсралт, суурилуулалт</li>
                                                    <!-- <li>Ажлын баталгаат хугацаа</li> -->
                                                </ul>
                                                <div class="btn-box"><a href="index-2.html" class="theme-btn btn-one">Дэлгэрэнгүй</a></div>
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
                                                    <h4>Яаралтай засвар үйлчилгээ</h4>
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
                                <figure class="image-box"><img src="/images/resource/about-2.jpg" alt=""></figure>
                                <div class="text centred">
                                    <div class="icon-box"><i class="icon-37"></i></div>
                                    <p class="fs_20 lh_30 fw_medium mb_10">Холбоо барих</p>
                                    <h3><a href="tel:97691114532">+976 91114532</a></h3>
                                </div>
                                <div class="video-btn">
                                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption=""><i class="icon-27"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two end -->


        <!-- service-style-two -->
        <!-- <section class="service-style-two sec-pad">
            <div class="auto-container">
                <div class="sec-title p_relative centred mb_50">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Манай үйлчилгээ</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">Бид цахилгааны бүрэн үйлчилгээ үзүүлэгч</h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme owl-nav-none">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="air-conditioning.html"><img src="/images/service/service-3.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-15"></i></div>
                                <h3><a href="air-conditioning.html">Агааржуулалт</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="air-conditioning.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="heating-service.html"><img src="/images/service/service-4.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-16"></i></div>
                                <h3><a href="heating-service.html">Халаалтын үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="heating-service.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="power-outlets.html"><img src="/images/service/service-5.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-17"></i></div>
                                <h3><a href="power-outlets.html">Цахилгааны үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="power-outlets.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="air-conditioning.html"><img src="/images/service/service-3.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-15"></i></div>
                                <h3><a href="air-conditioning.html">Агааржуулалт</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="air-conditioning.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="heating-service.html"><img src="/images/service/service-4.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-16"></i></div>
                                <h3><a href="heating-service.html">Халаалтын үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="heating-service.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="power-outlets.html"><img src="/images/service/service-5.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-17"></i></div>
                                <h3><a href="power-outlets.html">Цахилгааны үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="power-outlets.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="air-conditioning.html"><img src="/images/service/service-3.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-15"></i></div>
                                <h3><a href="air-conditioning.html">Агааржуулалт</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="air-conditioning.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="heating-service.html"><img src="/images/service/service-4.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-16"></i></div>
                                <h3><a href="heating-service.html">Халаалтын үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="heating-service.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="image-box p_relative d_block">
                                <div class="shape-1 p_absolute l_0 b_0"></div>
                                <div class="shape-2 p_absolute l_0 b_0"></div>
                                <figure class="image p_relative d_block"><a href="power-outlets.html"><img src="/images/service/service-5.jpg" alt=""></a></figure>
                            </div>
                            <div class="lower-content p_relative d_block">
                                <div class="icon-box p_absolute r_30 w_90 h_90 lh_90 fs_40 b_radius_50 centred"><i class="icon-17"></i></div>
                                <h3><a href="power-outlets.html">Цахилгааны үйлчилгээ</a></h3>
                                <p>Энэ бол жишээ текст</p>
                                <div class="link"><a href="power-outlets.html">Дэлгэрэнгүй унших<i class="icon-7"></i></a></div>
                            </div>
                        </div>
                    </div>
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
                                    <p>Гүйцэтгэсэн ажил</p>
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
                                    <p>Хамтрагч байгууллага</p>
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
                                    <p>Баг хамт олон</p>
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
                                    <p>Тогтмол ажилласан жил</p>
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
            <figure class="image-layer"><img src="/images/resource/chooseus-1.png" alt=""></figure>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-9 col-md-12 col-sm-12 content-column">
                        <div class="content-box p_relative d_block mr_30">
                            <div class="sec-title p_relative mb_20">
                                <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Яагаад биднийг сонгох вэ?</h5>
                                <h2 class="d_block fs_40 lh_50 fw_bold">Яагаад биднийг сонгох хэрэгтэй вэ?</h2>
                            </div>
                            <div class="text p_relative d_block mb_40">
                                <p>Энэ бол жишээ текст: бид хамгийн сайн үйлчилгээг санал болгодог.</p>
                            </div>
                            <div class="inner-box">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-21"></i></div>
                                            <h4>Бодит үнэлгээтэй, оновчтой шийдэл</h4>
                                            <p>Энэ бол жишээ текст</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-22"></i></div>
                                            <h4>Мэргэжлийн цахилгаан инженерүүд</h4>
                                            <p>Энэ бол жишээ текст</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-23"></i></div>
                                            <h4>Олон жилийн туршлагатай, найдвартай үйлчилгээ</h4>
                                            <p>Энэ бол жишээ текст</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="icon-box"><i class="icon-25"></i></div>
                                            <h4>24/7 холбоо барих боломжтой</h4>
                                            <p>Энэ бол жишээ текст</p>
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
        <section class="project-section">
            <div class="outer-container">
                <div class="project-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                    @foreach($blogs as $blog)
                    <div class="project-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="/images/project/project-1.jpg" alt=""></figure>
                            <div class="view-btn"><a href="/images/project/project-1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="icon-28"></i></a></div>
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


        <!-- faq-section -->
        <section class="faq-section p_relative">
            <div class="bg-layer" style="background-image: url(/images/resource/faq-3.jpg);"></div>
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
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="/images/clients/clients-logo-1.png" alt=""></a></figure>
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="/images/clients/clients-logo-2.png" alt=""></a></figure>
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="/images/clients/clients-logo-3.png" alt=""></a></figure>
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="/images/clients/clients-logo-4.png" alt=""></a></figure>
                    <figure class="clients-logo p_relative d_block"><a href="index.html"><img src="/images/clients/clients-logo-5.png" alt=""></a></figure>
                </div>
            </div>
        </section>
        <!-- clients-section end -->


        <!-- testimonial-style-two -->
        <!-- <section class="testimonial-style-two p_relative">
            <div class="auto-container">
                <div class="sec-title p_relative mb_50 centred">
                    <h5 class="d_block fs_17 lh_25 fw_medium mb_9">Сэтгэгдэл</h5>
                    <h2 class="d_block fs_40 lh_50 fw_bold">Манай үйлчлүүлэгчид бидний талаар юу хэлдэг вэ?</h2>
                </div>
                <div class="two-item-carousel owl-carousel owl-theme owl-nav-none">
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-1.jpg" alt=""></figure>
                                <h5>Rachel McAdams</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-one">
                        <div class="inner-box p_relative d_block">
                            <div class="light-icon"><img src="/images/icons/icon-3.png" alt=""></div>
                            <div class="icon-box p_relative d_block fs_65"><i class="icon-31"></i></div>
                            <p>Энэ бол жишээ текст: манай үйлчилгээ үргэлж чанартай.</p>
                            <div class="author-box p_relative d_block">
                                <figure class="author-thumb p_absolute l_0 t_0 w_70 h_70 b_radius_50"><img src="/images/resource/testimonial-2.jpg" alt=""></figure>
                                <h5>Jhon Haris</h5>
                                <span class="designation p_relative d_block">Цахилгаанчин</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- testimonial-style-two end -->


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
                                <h2 class="d_block fs_40 lh_50 fw_bold">Шилдэг цахилгааны үйлчилгээнд тусламж хэрэгтэй байна уу?</h2>
                            </div>
                            <div class="text p_relative d_block">
                                <p>Манай бүх үйлчилгээ 100% сэтгэл ханамжийн баталгаатай бөгөөд бид бүх төрлийн цахилгаан суурилуулалтыг хийж гүйцэтгэдэг.</p>
                            </div>
                            <div class="support-box">
                                <div class="icon-box"><i class="icon-37"></i></div>
                                <p>Яаралтай тусламж</p>
                                <h3><a href="tel:01243507689">+012-4350-7689</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- cta-style-two end -->

@endsection
