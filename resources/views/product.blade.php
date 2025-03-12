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
        <section class="shop-details p_relative pt_120 pb_120 bg-color-4">
            <div class="auto-container">
                <div class="product-details-content p_relative d_block mb_110">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                            <div class="image-box p_relative d_block">
                                <figure class="image"><img src="{{ '/storage/'.$product->picture }}" alt=""></figure>
                                <div class="preview-link p_absolute t_20 r_20"><a href="{{ '/storage/'.$product->picture }}" class="lightbox-image p_relative d_iblock fs_20 centred z_1 w_50 h_50 color_black lh_50" data-fancybox="gallery"><i class="icon-63"></i></a></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                            <div class="product-details p_relative d_block ml_20">
                                <h2 class="d_block fs_30 lh_40 fw_sbold mb_5">{{$product->name}}</h2>
                                <div class="customer-rating clearfix p_relative d_block mb_5">
                                    <ul class="rating clearfix">
                                        <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="icon-71"></i></li>
                                        <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="icon-71"></i></li>
                                        <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="icon-71"></i></li>
                                        <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="icon-71"></i></li>
                                        <li class="p_relative d_iblock pull-left mr_5 fs_13"><i class="icon-71"></i></li>
                                    </ul>
                                </div>
                                <span class="price p_relative d_block fs_20 lh_30 fw_medium mb_25">{{$product->price}}₮</span>
                                <div class="text p_relative d_block mb_30">
                                    {!! $product->description !!}
                                </div>

                                <!--  Add to cart section

                                <div class="addto-cart-box p_relative d_block mb_35"> 
                                    <ul class="clearfix">
                                        <li class="item-quantity p_relative d_block float_left mr_10"><input class="quantity-spinner" type="text" value="1" name="quantity"></li>
                                        <li class="p_relative d_block float_left mr_10"><button type="button" class="theme-btn btn-one">Add To Cart</button></li>
                                        <li class="p_relative d_block float_left mr_10"><a href="shop-details.html" class="d_iblock p_relative fs_20 lh_50 w_50 h_50 centred b_radius_5"><i class="icon-62"></i></a></li>
                                        <li class="p_relative d_block float_left mr_10"><a href="shop.html" class="d_iblock p_relative fs_20 lh_50 w_50 h_50 centred b_radius_5"><i class="icon-63"></i></a></li>
                                    </ul>
                                </div>

                                -->

                                <div class="other-option">
                                    <ul class="list">
                                        <li class="p_relative d_block fs_16 font_family_poppins mb_5"><span class="fw_medium color_black">Product ID:</span> AZ-2305</li>
                                        <li class="p_relative d_block fs_16 font_family_poppins mb_5"><span class="fw_medium color_black">Category</span> Accessories</li>
                                        <li class="p_relative d_block fs_16 font_family_poppins"><span class="fw_medium color_black">Tags:</span> <a href="shop-details.html">Laptop</a>, <a href="shop-details.html">Device</a>, <a href="shop-details.html">Desktop</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content

                <div class="product-discription p_relative d_block mb_100">
                    <div class="tabs-box">
                        <div class="tab-btn-box p_relative d_block">
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn active-btn p_relative d_iblock fs_18 lh_20 float_left fw_medium z_1 mr_35 tran_5" data-tab="#tab-1">Description</li>
                                <li class="tab-btn p_relative d_iblock fs_18 lh_20 float_left fw_medium z_1 tran_5" data-tab="#tab-2">Reviews (1)</li>
                            </ul>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="content-box">
                                    <p class="mb_25">Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.enim ad minim veniam quis nostrud exercita mco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur consequuntur magni dolores.</p>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum nemo enim ipsam voluptatem quia voluptas sit aspernatur.</p>
                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="customer-inner">
                                    <div class="customer-review p_relative d_block pb_65 mb_65">
                                        <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_40">Classic Rechargeable Table Lamp Black</h4>
                                        <div class="comment-box p_relative d_block pl_110">
                                            <figure class="comment-thumb p_absolute l_0 t_0 w_80 h_80 b_radius_55"><img src="/images/shop/comment-1.jpg" alt=""></figure>
                                            <h5 class="d_block fs_18 lh_20 fw_sbold">Keanu Reeves<span class="d_iblock fs_16 font_family_poppins"> - May 1, 2021</span></h5>
                                            <ul class="rating clearfix mb_15">
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_5 fs_13"><i class="far fa-star"></i></li>
                                            </ul>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis natus error sit voluptatem accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arch tecto beatae vitae dicta.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer-comments p_relative">
                                        <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_25">Be First to Add a Review</h4>
                                        <div class="rating-box clearfix mb_12">
                                            <h6 class="p_relative d_iblock fs_16 fw_medium mr_15 float_left">Your Rating</h6>
                                            <ul class="rating p_relative d_block clearfix float_left">
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left"><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <form action="shop-details.html" method="post" class="comment-form default-form">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Review</label>
                                                    <textarea name="message"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Name</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Email</label>
                                                    <input type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn m_0">
                                                    <button type="submit" class="theme-btn btn-one">Submit Your Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                -->

                <div class="">
                    <div class="">
                        <h3>Асуулт, Хариулт</h3>
                    </div>
                    <div class="">
                                <div class="customer-inner">
                                    <div class="customer-review p_relative d_block pb_65 mb_65">
                                        <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_40">Classic Rechargeable Table Lamp Black</h4>
                                        <div class="comment-box p_relative d_block pl_110">
                                            <figure class="comment-thumb p_absolute l_0 t_0 w_80 h_80 b_radius_55"><img src="/images/shop/comment-1.jpg" alt=""></figure>
                                            <h5 class="d_block fs_18 lh_20 fw_sbold">Keanu Reeves<span class="d_iblock fs_16 font_family_poppins"> - May 1, 2021</span></h5>
                                            <ul class="rating clearfix mb_15">
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_3 fs_13"><i class="fas fa-star"></i></li>
                                                <li class="p_relative d_iblock pull-left mr_5 fs_13"><i class="far fa-star"></i></li>
                                            </ul>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa  qui officia deserunt mollit anim  est laborum. Sed perspiciatis unde omnis natus error sit voluptatem accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi arch tecto beatae vitae dicta.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="customer-comments p_relative">
                                        <h4 class="p_relative d_block fs_20 lh_30 fw_medium fw_sbold mb_25">Be First to Add a Review</h4>
                                        <div class="rating-box clearfix mb_12">
                                            <h6 class="p_relative d_iblock fs_16 fw_medium mr_15 float_left">Your Rating</h6>
                                            <ul class="rating p_relative d_block clearfix float_left">
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left mr_3"><i class="far fa-star"></i></li>
                                                <li class="p_relative d_iblock fs_12 lh_26 float_left"><i class="far fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <form action="shop-details.html" method="post" class="comment-form default-form">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Review</label>
                                                    <textarea name="message"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Name</label>
                                                    <input type="text" name="name" required="">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_15">
                                                    <label class="p_relative d_block fs_16 mb_3 font_family_poppins">Your Email</label>
                                                    <input type="email" name="email" required="">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn m_0">
                                                    <button type="submit" class="theme-btn btn-one">Submit Your Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    </div>
                </div>

                <div class="related-product">
                    <div class="title-text mb_30">
                        <h2 class="d_block fs_30 lh_40 fw_sbold">Бусад бүтээгдэхүүнүүд</h2>
                    </div>
                    <div class="row clearfix">
                        @foreach($others as $other)
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <span class="hot">Hot</span>
                                        <figure class="image"><img src="{{ '/storage/'.$other->picture }}" alt=""></figure>
                                        <ul class="option-list clearfix">
                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                            <li><a href="{{ '/storage/'.$other->picture }}" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="lower-content">
                                        <h6><a href="{{ url( $other->Product_category->link .'/product/'. $other->id ) }}">{{$other->name}}</a></h6>
                                        <ul class="rating clearfix">
                                            <li><i class="icon-71"></i></li>
                                            <li><i class="icon-71"></i></li>
                                            <li><i class="icon-71"></i></li>
                                            <li><i class="icon-71"></i></li>
                                            <li><i class="icon-71"></i></li>
                                        </ul>
                                        <span class="price">{{$other->price}}₮</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details end -->


        <!-- subscribe-section 
         
        <section class="subscribe-section p_relative bg-color-4">
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