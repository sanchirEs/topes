@extends('layouts.master')

@section('content')

        <!-- Page Title -->
        <section class="page-title centred">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/images/background/page-title.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>{{$product->name}}</h2>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Нүүр</a></li>
                        <li>{{$product->Product_category->name}}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- shop-details -->
        <section class="shop-details p_relative pt_60 pb_60 bg-color-4">
            <div class="auto-container">
                <div class="product-details-content p_relative d_block mb_60">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image-box p_relative d_block">
                                <figure class="image">
                                    <img src="{{ file_exists(public_path('storage/'.$product->picture)) ? asset('storage/'.$product->picture) : asset('images/no-image.png') }}" alt="">
                                </figure>
                                <div class="preview-link p_absolute t_20 r_20">
                                    <a href="{{ '/storage/'.$product->picture }}" class="lightbox-image p_relative d_iblock fs_20 centred z_1 w_50 h_50 color_black lh_50" data-fancybox="gallery"><i class="icon-63"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="product-details p_relative d_block ml_20">
                                <h2 class="d_block fs_30 lh_40 fw_sbold mb_5">{{$product->name}}</h2>
                                <span class="price p_relative d_block fs_20 lh_30 fw_medium mb_25">{{ number_format($product->price) }}₮</span>
                                <div class="text p_relative d_block mb_30">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="mb_20">
                        <h3>Асуулт, Хариулт</h3>
                    </div>
                    <div class="">
                                <div class="customer-inner">
                                    <div class="customer-review p_relative d_block pb_30 mb_30">
                                        <div class="comment-box p_relative d_block ">
                                            <h5 class="d_block fs_18 lh_20 fw_sbold">Keanu Reeves<span class="d_iblock fs_16 font_family_poppins"> - May 1, 2021</span></h5>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis natus error sit voluptatem accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arch tecto beatae vitae dicta.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer-comments p_relative">
                                        <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_25">Эхлээд үнэлгээ өгнө үү</h4>
                                        <!-- <div class="rating-box clearfix mb_12">
                                            <h6 class="p_relative d_iblock fs_16 fw_medium mr_15 float_left">Таны үнэлгээ</h6>
                                            <ul class="rating p_relative d_block clearfix float_left">
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left"><i class="far fa-star"></i></li>
                                            </ul>
                                        </div> -->
                                        <form action="shop-details.html" method="post" class="comment-form default-form">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Асуулт, Хариулт *</label>
                                                    <textarea name="message" row="5"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Таны нэр</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Таны цахим шуудан</label>
                                                    <input type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn m_0">
                                                    <button type="submit" class="theme-btn btn-one">Илгээх</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>

                <div class="related-product mt_30">
                    <div class="title-text mb_30 ">
                        <h2 class="d_block fs_30 lh_40 fw_sbold">Бусад бүтээгдэхүүнүүд</h2>
                    </div>
                    <div class="row clearfix">
                        @foreach($others as $other)
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <!-- <span class="hot">Hot</span> -->
                                        <figure class="image">
                                            <img src="{{ file_exists(public_path('/storage/'.$other->picture)) ? asset('storage/'.$product->picture) : asset('images/no-image.png') }}" alt="">
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <h6>
                                            <a href="{{ url( $other->Product_category->link .'/product/'. $other->id ) }}">{{$other->name}}</a>
                                        </h6>
                                        <span class="price">{{ number_format($other->price) }}₮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @endsection