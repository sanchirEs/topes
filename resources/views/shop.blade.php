@extends('layouts.master')

@section('content')

        <!-- Page Title -->
        <section class="page-title centred">
            <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(/images/background/page-title.jpg);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Дэлгүүр</h2>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Нүүр</a></li>
                        <li>Бүтээгдэхүүн</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- shop-page-section -->
        <section class="shop-page-section bg-color-4">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-12 col-sm-12 sidebar-side">
                        <div class="shop-sidebar">

                            <!--

                            <div class="search-widget sidebar-widget">
                                <div class="widget-title">
                                    <h4>Search</h4>
                                </div>
                                <form action="shop.html" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Search" required="">
                                        <button type="submit"><i class="icon-63"></i></button>
                                    </div>
                                </form>
                            </div>

                            -->

                            <div class="category-widget sidebar-widget">
                                <div class="widget-title">
                                    <h4>Ангилал</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="category-list clearfix">
                                        @foreach($categories as $category)
                                        <li><a href="{{ url('shopcategory/'.$category->id) }}"><i class="icon-7"></i>{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!--

                            <div class="price-filter sidebar-widget">
                                <div class="widget-title">
                                    <h4>by Price</h4>
                                </div>
                                <div class="range-slider clearfix p_relative">
                                    <div class="price-range-slider"></div>
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <button class="filter-btn">Filter</button>
                                        </div>
                                        <div class="pull-right">
                                            <p>Price:</p>
                                            <div class="title p_relative d_iblock"></div>
                                            <div class="input p_relative d_iblock"><input type="text" class="property-amount" name="field-name" readonly=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tags-widget sidebar-widget">
                                <div class="widget-title">
                                    <h4>Tags</h4>
                                </div>
                                <div class="widget-content">
                                    <ul class="tags-list clearfix">
                                        <li><a href="shop-details.html">Electrical</a></li>
                                        <li><a href="shop-details.html">Hammer</a></li>
                                        <li><a href="shop-details.html">Screw Driver</a></li>
                                        <li><a href="shop-details.html">External</a></li>
                                    </ul>
                                </div>
                            </div>

                            -->

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 cols-sm-12 content-side">
                        <div class="our-shop">
                            <div class="item-shorting p_relative d_block clearfix">
                                <div class="left-column pull-left clearfix">
                                    <div class="btn-box float_left p_relative clearfix mr_30">
                                        <button class="grid-view on p_relative d_iblock fs_20 b_radius_5 mr_2 centred"><i class="icon-76"></i></button>
                                    </div>
                                    <div class="text float_left"><p class="fs_16 font_family_poppins">Нийт <span class="color_black"> {{ $products->total() }}</span>-с <span class="color_black"> {{ $products->lastItem() }} </span>
                                        <!-- {{ $products->total() }}</span> Results</p> -->
                                    </div>
                                </div>

                                <!--

                                <div class="right-column pull-right clearfix">
                                    <div class="short-box clearfix">
                                        <div class="select-box">
                                            <select class="wide">
                                               <option data-display="Popularity">Popularity</option>
                                               <option value="1">New Collection</option>
                                               <option value="2">Top Sell</option>
                                               <option value="4">Top Ratted</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                -->

                            </div>
                            <div class="wrapper grid">
                                <div class="shop-grid-content">
                                    <div class="row clearfix">
                                        @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="hot">Hot</span>
                                                        <figure class="image"><img src="{{ '/storage/'.$product->picture }}" alt=""></figure>

                                                        <!--

                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-48.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                        
                                                        -->

                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="{{ url( $product->Product_category->link .'/product/'. $product->id ) }}">{{$product->name}}</a></h6>
                                                        {!! \Illuminate\Support\Str::words($product->product, 10) !!}
                                                        <span class="price">{{$product->price}}₮</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="shop-list-content">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="hot">Hot</span>
                                                        <figure class="image"><img src="/images/shop/shop-52.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-52.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Glass Pendant Light Hanging Lamps Lighting</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$30.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-53.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-53.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Tankless Instant Electric Water Heater</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$75.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-54.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-54.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Bahco 4559-18 Bolt Cutter 430mm</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$70.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="hot">Hot</span>
                                                        <figure class="image"><img src="/images/shop/shop-55.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-55.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Men's Electric Trimmer in Black Shaver</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$90.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-56.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-56.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">DS300 Large Tool Box Carry Case</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$60.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="hot">Hot</span>
                                                        <figure class="image"><img src="/images/shop/shop-48.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-48.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Gedore 7R182C0 Torque Screwdriver</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$60.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-49.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-49.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Globe Bulbs Lights 3W Cheap LED Light Bulb</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$50.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-50.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-50.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Bahco 4559-18 Bolt Cutter 430mm</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$25.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="sale">Sale</span>
                                                        <figure class="image"><img src="/images/shop/shop-51.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-51.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Vakuumski trimer za kosu i bradu</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$40.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="hot">Hot</span>
                                                        <figure class="image"><img src="/images/shop/shop-57.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-57.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Aluminium Hammer Size 2 38mm 950gm</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$40.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <span class="sale">Sale</span>
                                                        <figure class="image"><img src="/images/shop/shop-58.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-58.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Custom Leather Electrical Tool Carrier</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$80.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                            <div class="shop-block-one">
                                                <div class="inner-box">
                                                    <div class="image-box">
                                                        <figure class="image"><img src="/images/shop/shop-59.png" alt=""></figure>
                                                        <ul class="option-list clearfix">
                                                            <li><a href="shop.html"><i class="icon-57"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-62"></i></a></li>
                                                            <li><a href="index-5.html"><i class="icon-61"></i></a></li>
                                                            <li><a href="/images/shop/shop-59.png" class="lightbox-image" data-fancybox="gallery"><i class="icon-63"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="lower-content">
                                                        <h6><a href="shop-details.html">Westek Battery Operated Wall Sconces</a></h6>
                                                        <ul class="rating clearfix">
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                            <li><i class="icon-71"></i></li>
                                                        </ul>
                                                        <span class="price">$44.30</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-wrapper centred mt_30 centred">

                                {{ $products->links() }}

                                <!--

                                <ul class="pagination clearfix">
                                    <li><a href="shop.html" class="current">1</a></li>
                                    <li><a href="shop.html">2</a></li>
                                    <li><a href="shop.html">3</a></li>
                                    <li class="dot">...</li>
                                    <li><a href="shop.html">9</a></li>
                                    <li><a href="shop.html"><i class="icon-7"></i></a></li>
                                </ul>

                                -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-page-section -->


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