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
                                <!-- <div class="preview-link p_absolute t_20 r_20">
                                    <a href="{{ '/storage/'.$product->picture }}" class="lightbox-image p_relative d_iblock fs_20 centred z_1 w_50 h_50 color_black lh_50" data-fancybox="gallery"><i class="icon-63"></i></a>
                                </div> -->
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

                <div class="product-details-qz">
                    <h3>Асуулт, Хариулт</h3>
                    <hr>

                    <!-- Display Questions -->
                    <div class="questions">
                        @foreach($questions as $question)
                            <div class="question">
                                <p class="timestamp">{{ $question->created_at->format('Y-m-d H:i') }}</p>
                                <p><strong>{{ $question->asker_name }}:</strong> {{ $question->question_text }}</p>
                                
                                @if((auth()->user()))
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Асуултыг устгах</button>
                                    </form>
                                @endif

                                @if($question->answer_text && !(auth()->user()))
                                    <div class="reply">
                                        <p class="timestamp">{{ optional($question->updated_at)->format('Y-m-d H:i') }}</p>
                                        <p><strong>{{ $question->answered_by }}:</strong> {{ $question->answer_text }}</p>
                                    </div>
                                @endif

                                @auth
                                    @if(auth()->user())
                                        <div class="admin-actions" style="margin-top: 5px;">
                                            @if($question->answer_text)
                                                <!-- Edit Reply Form -->
                                                <form action="{{ route('questions.updateReply', $question->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="action" value="update">
                                                    <textarea name="answer_text" placeholder="Хариулт засах . . ." >{{ $question->answer_text }}</textarea>
                                                    <button type="submit" class="btn btn-primary btn-sm">Засах</button>
                                                </form>

                                                <!-- Delete Reply -->
                                                <!-- <form action="{{ route('questions.destroyReply', $question->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Устгах</button>
                                                </form> -->
                                            @else
                                                <!-- Reply Form -->
                                                <form action="{{ route('questions.reply', $question->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('POST')
                                                    <textarea name="answer_text" placeholder="Хариулт бичих . . ." required></textarea>
                                                    <button type="submit" class="btn btn-success btn-sm">Хариулах</button>
                                                </form>
                                            @endif
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    </div>


                    <!-- Question Submission Form -->
                    <form action="{{ route('questions.store') }}" method="POST" class="question-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <input type="text" name="asker_name" placeholder="Таны нэр">
                        <textarea name="question_text" placeholder="Асуулт, Хариулт . . ." required></textarea>
                        <button type="submit" class="theme-btn btn-one">Илгээх</button>
                    </form>
                </div>

                <div class="related-product mt_30">
                    <div class="title-text mb_30 ">
                        <h2 class="d_block fs_30 lh_40 fw_sbold">Бусад бүтээгдэхүүнүүд</h2>
                    </div>
                    <div class="row clearfix">
                        @foreach($others as $other)
                        <a href="{{ url( $other->Product_category->link .'/product/'. $other->id ) }}" class="col-lg-3 col-md-6 col-sm-12 shop-block">
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
                                            {{$other->name}}
                                        </h6>
                                        <span class="price">{{ number_format($other->price) }}₮</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @endsection