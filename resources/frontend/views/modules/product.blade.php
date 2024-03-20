<?php
    use App\Models\Product;
    use App\Models\ProductCategory;
    use App\Models\Unity;

    $url = last(explode('/', url()->current()));
    $categories = ProductCategory::where('active', true)->orderby('order')->get();
    $product = Product::where('url', $url)->first();
    $unities = Unity::where('active', true)->get();
?>
@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="product product-single product-simple row mb-8">
            <div class="col-md-7">
                <div class="product-gallery">
                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                        <figure class="product-image">
                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                 data-zoom-image="http://cms/upload/product_category/1747474359874378.webp" alt="1"
                                 width="800" height="1000">
                        </figure>
                        <figure class="product-image">
                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                 data-zoom-image="http://cms/upload/product_category/1747474359874378.webp" alt="2"
                                 width="800" height="1000">
                        </figure>
                        <figure class="product-image">
                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                 data-zoom-image="http://cms/upload/product_category/1747474359874378.webp" alt="3"
                                 width="800" height="1000">
                        </figure>
                        <figure class="product-image">
                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                 data-zoom-image="http://cms/upload/product_category/1747474359874378.webp" alt="4"
                                 width="800" height="1000">
                        </figure>
                    </div>
                    <div class="product-thumbs-wrap">
                        <div class="product-thumbs">
                            <div class="product-thumb active">
                                <img src="http://cms/upload/product_category/1747474359874378.webp"
                                     alt="product thumbnail" width="240" height="300">
                            </div>
                            <div class="product-thumb">
                                <img src="http://cms/upload/product_category/1747474359874378.webp"
                                     alt="product thumbnail" width="240" height="300">
                            </div>
                            <div class="product-thumb">
                                <img src="http://cms/upload/product_category/1747474359874378.webp"
                                     alt="product thumbnail" width="240" height="300">
                            </div>
                            <div class="product-thumb">
                                <img src="http://cms/upload/product_category/1747474359874378.webp"
                                     alt="product thumbnail" width="240" height="300">
                            </div>
                        </div>
                        <button class="thumb-up disabled"><i class="fas fa-chevron-left"></i></button>
                        <button class="thumb-down disabled"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="product-details">
                    <h1 class="product-name">{{ $product->name }}</h1>
                    {{--                <div class="ratings-container">--}}
                    {{--                    <div class="ratings-full">--}}
                    {{--                        <span class="ratings" style="width:60%"></span>--}}
                    {{--                        <span class="tooltiptext tooltip-top"></span>--}}
                    {{--                    </div>--}}
                    {{--                    <a href="#content-reviews" class="link-to-tab rating-reviews">( 12 Customer--}}
                    {{--                        Reviews )</a>--}}
                    {{--                </div>--}}
                    <p class="product-price mb-1">
                        {{--                    <del class="old-price">$24.00</del>--}}
                        {{--                    <ins class="new-price">$16.00</ins>--}}
                        <ins class="price">{{ $product->price }}€/ {{-- $product->unity->unity --}}</ins>
                    </p>
                    <p class="product-short-desc">{!! $product->desc !!}
                    </p>
                    {{--                <ul class="list list-circle">--}}
                    {{--                    <li><i class="far fa-circle"></i>Nunc id cursus metus aliquam.</li>--}}
                    {{--                    <li><i class="far fa-circle"></i>Vel pretium lectus quam id leo in vitae turpis--}}
                    {{--                        massa.--}}
                    {{--                    </li>--}}
                    {{--                    <li><i class="far fa-circle"></i>Eget sit amet tellus cras adipiscing enim eu.--}}
                    {{--                    </li>--}}
                    {{--                    <li><i class="far fa-circle"></i>Tellus rutrumn tellus pellentesque eu tincidunt--}}
                    {{--                        tortor</li>--}}
                    {{--                </ul>--}}
                    <div class="product-form product-unit mb-2 pt-1">
                        <label>Unidades</label>
                        <div class="product-form-group pt-1">
                            <div class="product-variations mb-1">
                                @foreach($product->unity_price as $unity_price)
                                    @foreach($unities as $unity)
                                        @if($unity_price->unity_id === $unity->id)
                                            <a href="#">{{ $unity->unity }}</a>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <a href="#" class="product-variation-clean" style="display: none;">Clean
                                All</a>
                        </div>
                    </div>
                    <div class="product-variation-price">
                        <span>$239.00</span>
                    </div>
                    <div class="product-form product-qty pt-1">
                        <div class="product-form-group">
                            <div class="input-group">
                                <button class="quantity-minus p-icon-minus-solid"></button>
                                <input class="quantity form-control" type="number" min="1" max="1000000">
                                <button class="quantity-plus p-icon-plus-solid"></button>
                            </div>
                            <button class="btn-product btn-cart ls-normal font-weight-semi-bold"><i
                                    class="p-icon-cart-solid"></i>ADD TO CART</button>
                        </div>
                    </div>
                    <div class="product-action pt-5 pb-3">
                        <a href="#" class="btn-product btn-compare mr-5"><i
                                class="p-icon-compare-solid"></i>ADD
                            TO COMPARE</a>
                        <a href="#" class="btn-product btn-wishlist"><i class="p-icon-heart-solid"></i>ADD
                            TO
                            WISHLIST</a>
                    </div>
                    <hr class="product-divider">

                    <div class="product-meta">
                        <label>CATEGORIES:</label><a href="#">fruit</a> , <a href="#">daily needs</a><br>
                        <label>sku:</label><a href="#">mS46891357</a><br>
                        <label>tag:</label><a href="#">organic</a> , <a href="#">greenhouse</a> , <a
                            href="#">fat</a> , <a href="#">healthy</a> , <a href="#">dairy</a> ,
                        <a href="#">vitamin</a><br>
                        <label class="social-label">share:</label>
                        <div class="social-links">
                            <a href="#" class="social-link fab fa-facebook-f"></a>
                            <a href="#" class="social-link fab fa-twitter"></a>
                            <a href="#" class="social-link fab fa-pinterest"></a>
                            <a href="#" class="social-link fab fa-linkedin-in"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="product-content">
            <div class="content-description">
                <h2 class="title title-line title-underline mb-lg-8">
                                <span>
                                    Description
                                </span>
                </h2>
                <h3 class="content-title">
                    About this Product
                </h3>
                <p class="mb-4 mb-lg-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor
                    incididunt
                    ut
                    labore et dolore magna
                    aliqua. Venenatis tellus in metus. Vel pretium lectus quam id leo in vitae turpis
                    massa.
                    Nunc id cursus metus aliquam.
                    Libe id faucibus nisl tincidunt eget. Aliquam id diam maecenas ultricies mi eget
                    mauris.
                </p>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                        <div class="inner-video banner banner-fixed banner-video overlay-dark">
                            <figure>
                                <a href="#">
                                    <img src="http://cms/upload/product_category/1747474359874378.webp"
                                         alt="product-banner" width="610" height="400"
                                         style="background-color: #526e45;">
                                </a>
                                <video>
                                    <source src="video/memory-of-a-woman.mp4" type="video/mp4">
                                </video>
                            </figure>
                            <div class="banner-content text-center y-50 x-50">
                                <a class="video-btn video-play" href="video/memory-of-a-woman.mp4"
                                   data-video-source="hosted"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-12 col-md-6 col-lg-6 with-content-index pt-3 pt-md-0 content-index-1 pl-2 pl-lg-7">
                        <h4 class="content-subtitle">
                            How we start our work
                        </h4>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna
                            aliqua. Venenatis tellus in metus vulputate eu scelerisque felis. Vel
                            pretium
                            lectus quam id leo in vitae turpis massa.
                            Nunc id cursus metus aliquam. Libero id faucibus nisl tincidunt eget.
                            Aliquam id
                            diam maecenas ultricies mi eget mauris.
                            Volutpat ac tincidunt vitae semper quis lectus. mattis ullamcorper velit
                            sed.
                        </p>
                    </div>
                </div>

                <div class="row mt-0 mt-lg-10 pt-8">
                    <div class="col-12 col-md-6 col-lg-6 with-content-index content-index-2 pr-2 pr-lg-7">
                        <h4 class="content-subtitle">
                            Why People love Panda?
                        </h4>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulputate
                            eu
                            scelerisque felis. Vel pretium lectus quam id leo in vitae turpis massa. Nunc id
                            cursus
                            metus aliquam. Libero id faucibus nisl tincidunt eget. Aliquam id diam maecenas
                            ultricies mi eget mauris. Volutpat ac tincidunt vitae semper quis lectus.
                            mattis ullamcorper velit sed.
                        </p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center">
                        <div class="overlay-dark">
                            <figure>
                                <img src="http://cms/upload/product_category/1747474359874378.webp"
                                     alt="product-banner" width="610" height="400"
                                     style="background-color: #526e45;">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-specification mt-10 pt-3">
                <h2 class="title title-line title-underline">
                                <span>
                                    Specifications
                                </span>
                </h2>
                <ul class="list-none">
                    <li><label>WEIGHT</label>
                        <p>5 kg</p>
                    </li>
                    <li><label>DIMENSIONS</label>
                        <p>10 × 10 × 10 cm</p>
                    </li>
                    <li><label>WEIGHT UNIT</label>
                        <p>1KG, 1LB, 500G, Bound, Each</p>
                    </li>
                </ul>
            </div>
            <div class="content-reviews pt-9" id='content-reviews'>
                <div class="with-toolbox">
                    <h2 class="title title-line title-underline mb-8">
                                    <span>
                                        Customer Reviews
                                    </span>
                    </h2>
                    <div class="toolbox-group">
                        <div class="review-toolbox mr-4">
                            <select name="orderby" class="form-control">
                                <option value="">All Reviews</option>
                                <option value="image" selected="selected">With Images
                                </option>
                                <option value="video">With Videos</option>
                            </select>
                        </div>
                        <div class="review-toolbox">
                            <select name="orderby" class="form-control">
                                <option value="">All Stars</option>
                                <option value="five" selected="selected">Five Stars
                                </option>
                                <option value="four">Four Stars</option>
                                <option value="three">Three Stars</option>
                                <option value="two">Two Stars</option>
                                <option value="one">One Stars</option>
                                <option value="no">No Stars</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row pb-10">
                    <div class="col-lg-4 mb-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar pb-3" data-sticky-options="{'paddingOffsetTop': 90}">
                            <div class="avg-rating-container">
                                <mark>4.5</mark>
                                <div class="avg-rating">
                                    <span class="avg-rating-title">Average Rating</span>
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:100%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <span class="rating-reviews">(12)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ratings-list mb-4 mb-lg-8">
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:70%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:70%;"></span>
                                    </div>
                                    <div class="progress-value">70%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:30%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:30%;"></span>
                                    </div>
                                    <div class="progress-value">30%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:40%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:40%;"></span>
                                    </div>
                                    <div class="progress-value">40%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:0%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                                <div class="ratings-item">
                                    <div class="ratings-container mb-0">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width:0%"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="rating-percent">
                                        <span style="width:0%;"></span>
                                    </div>
                                    <div class="progress-value">0%</div>
                                </div>
                            </div>
                            <a class="btn btn-dim submit-review-toggle">Submit
                                Review</a>
                        </div>
                    </div>
                    <div class="col-lg-8 comments border-no">
                        <ul class="comments-list">
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                                 width="100" height="100" alt="avatar">
                                        </a>
                                    </figure>
                                    <div class="comment-body mt-2 mt-sm-0">
                                        <div class="comment-rating ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="comment-user">
                                                        <span class="comment-date">by <span
                                                                class="font-weight-semi-bold text-uppercase text-dim">ANNA</span>
                                                            on July 14, 2021</span>
                                        </div>
                                        <div class="comment-description">
                                            Very Good!
                                        </div>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amt, consectetur adipiscing elit,
                                                sed
                                                do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua. Venenatis tellus in metus
                                                enenatis
                                                tellus in metus vulputate eu scelerisque
                                                felis.vulputate eu scelerisque felis.</p>
                                        </div>
                                        <div class="file-input-wrappers">
                                            <img class="btn-play btn-img pwsp"
                                                 src="http://cms/upload/product_category/1747474359874378.webp" width="800"
                                                 height="533" alt="product" />
                                            <img class="btn-play btn-img pwsp"
                                                 src="http://cms/upload/product_category/1747474359874378.webp" width="800"
                                                 height="422" alt="product" />
                                            <img class="btn-play btn-img pwsp"
                                                 src="http://cms/upload/product_category/1747474359874378.webp" width="800"
                                                 height="533" alt="product" />
                                        </div>
                                        <div class="feeling mt-5">
                                            <button
                                                class="btn btn-link text-capitalize btn-icon-left btn-slide-up btn-infinite like">
                                                <i class="fa fa-thumbs-up mb-1"></i>
                                                Helpful (<span class="count">0</span>)
                                            </button>
                                            <button
                                                class="btn btn-link text-capitalize btn-icon-left btn-slide-down btn-infinite unlike">
                                                <i class="fa fa-thumbs-down mb-1"></i>
                                                Unhelpful (<span class="count">0</span>)
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-1">
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="http://cms/upload/product_category/1747474359874378.webp"
                                                 width="100" height="100" alt="avatar">
                                        </a>
                                    </figure>

                                    <div class="comment-body mt-2 mt-sm-0">
                                        <div class="comment-rating ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="comment-user">
                                                        <span class="comment-date">by <span
                                                                class="font-weight-semi-bold text-uppercase text-dim">John
                                                                Doe</span> on August 16, 2021</span>
                                        </div>
                                        <div class="comment-description">
                                            Very Good!
                                        </div>
                                        <div class="comment-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed
                                                do eiusmod tempor incididunt ut labore
                                                et dolore magna aliqua. Venenatis tellus in metus
                                                enenatis
                                                tellus in metus vulputate eu scelerisque
                                                felis.vulputate eu scelerisque felis.</p>
                                        </div>
                                        <div class="feeling">
                                            <button
                                                class="btn btn-link text-capitalize btn-icon-left btn-slide-up btn-infinite like">
                                                <i class="fa fa-thumbs-up mb-1"></i>
                                                Helpful (<span class="count">0</span>)
                                            </button>
                                            <button
                                                class="btn btn-link text-capitalize btn-icon-left btn-slide-down btn-infinite unlike">
                                                <i class="fa fa-thumbs-down mb-1"></i>
                                                Unhelpful (<span class="count">0</span>)
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                        <nav class="toolbox toolbox-pagination justify-content-end">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-prev" href="#" aria-label="Previous"
                                       tabindex="-1" aria-disabled="true">
                                        <i class="p-icon-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active" aria-current="page"><a class="page-link"
                                                                                    href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item page-item-dots"></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link page-link-next" href="#" aria-label="Next">
                                        <i class="p-icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Comments -->
            </div>
        </div>
    </div>
@endsection

