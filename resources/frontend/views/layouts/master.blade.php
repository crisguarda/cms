<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Panda - Ultimate eCommerce Template</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Panda - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/icons/favicon.png') }}">
    <!-- Preload Font -->

    <link rel="preload" href="{{ asset('frontend/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2"
          crossorigin="anonymous">
    <link rel="preload" href="{{ asset('frontend/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2"
          crossorigin="anonymous">

    <script>
        WebFontConfig = {
            google: { families: [ 'Josefin Sans:300,400,600,700' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '{{ asset('frontend/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animate/animate.min.css') }}">

    <!-- Plugin CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/magnific-popup/magnific-popup.min.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/demo1.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">
</head>


<body class="@if( url()->current() == url('/')) home @endif">
<div class="page-wrapper">
    @include('frontend.views.layouts.header')
    <!-- End Header -->

    <main class="main">
        <div class="page-content">
            @yield('content')

            {{--Home page Static Content--}}
            @if(!isset($page))
                @php
                    $categories = \App\Models\ProductCategory::where('active', 1)->orderby('order')->get();
                @endphp



                <section class="container mt-10 pt-7 mb-7 appear-animate">
                    <h2 class="title-underline2 text-center mb-2"><span>Top Products</span></h2>
                    <div class="tab tab-nav-center product-tab product-tab-type2">
                        <ul class="nav nav-tabs">
                            @foreach($categories as $cat)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->first) active @endif" href="#cat-{{ $cat->id }}">
                                    <figure>
                                        <img src="{{ $cat->image }}" width="160" height="130"
                                             alt="{{ $cat->image_alt }}" />
                                    </figure>
                                    <div class="nav-title">{{ $cat->title }}</div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($categories as $cat)
                                @php
                                    $products = $cat->products->where('active', 1)->sortBy('order')->take(8);
                                @endphp
                                @if(count($products) < 1)
                                    <div class="tab-pane @if($loop->first) active @endif" id="cat-{{ $cat->id }}">
                                        <div class="product shadow-media text-center">
                                            <h3>Ainda não existem produtos da categoria {{ $cat->title }}</h3>
                                        </div>
                                    </div>
                                @else

                                    <div class="tab-pane @if($loop->first) active @endif" id="cat-{{ $cat->id }}">
                                        <div class="owl-carousel owl-theme row cols-lg-4 cols-md-3 cols-2" data-owl-options="{
                                                    'items': 4,
                                                    'nav': false,
                                                    'dots': true,
                                                    'margin': 20,
                                                    'loop': false,
                                                    'responsive': {
                                                        '0': {
                                                            'items': 2
                                                        },
                                                        '768': {
                                                            'items': 3
                                                        },
                                                        '992': {
                                                            'items': 4
                                                        }
                                                    }
                                                }">
                                            @foreach($products as $product)
                                                <div class="product shadow-media text-center">
                                                    <figure class="product-media">
                                                        <a href="{{ url('produtos/'.$cat->url.'/'.$product->url) }}">
                                                            <img src="{{ $product->image }}" alt="product" width="295"
                                                                 height="369" />
                                                        </a>
                                                        @if($product->is_promo)
                                                            <div class="product-label-group">
                                                                <label class="product-label label-sale">-40%</label>
                                                            </div>
                                                        @endif
                                                        <div class="product-action-vertical">
                                                            <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                                               data-target="#addCartModal" title="Adicionar ao Carrinho">
                                                                <i class="p-icon-cart-solid"></i>
                                                            </a>
                                                            <a href="#" class="btn-product-icon btn-wishlist"
                                                               title="Adicionar à lista de favoritos">
                                                                <i class="p-icon-heart-solid"></i>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                    <div class="product-details">
        {{--
                                                        <div class="ratings-container">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width:60%"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                            <a href="product-simple.html#content-reviews"
                                                               class="rating-reviews">(12)</a>
                                                        </div>
        --}}
                                                        <h5 class="product-name">
                                                            <a href="product-simple.html">
                                                                {{ $product->title }}
                                                            </a>
                                                        </h5>
                                                        <span class="product-price">
                                                            @if($product->is_promo)
                                                                <del class="old-price">$28.00</del>
                                                                <ins class="new-price">$12.00</ins>
                                                            @else
                                                                <span class="product-price">
{{--                                                                    <span class="price">{{ $product->price }}€/{{ $product->unity->unity }}</span>--}}
                                                                </span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </main>

    @include('frontend.views.layouts.footer')
    <!-- End Footer -->
</div>
<!-- Sticky Footer -->
<div class="sticky-footer sticky-content fix-bottom">
    <a href="demo1.html" class="sticky-link">
        <i class="p-icon-home"></i>
        <span>Home</span>
    </a>
    <a href="shop.html" class="sticky-link">
        <i class="p-icon-category"></i>
        <span>Categories</span>
    </a>
    <a href="wishlist.html" class="sticky-link">
        <i class="p-icon-heart-solid"></i>
        <span>Wishlist</span>
    </a>
    <a href="account.html" class="sticky-link">
        <i class="p-icon-user-solid"></i>
        <span>Account</span>
    </a>
    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="p-icon-search-solid"></i>
            <span>Search</span>
        </a>
        <form action="#" class="form-simple">
            <input type="text" name="search" autocomplete="off" placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="p-icon-search-solid"></i>
            </button>
        </form>
    </div>
</div>
<!-- Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="p-icon-arrow-up"></i>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 108.881, 400;"></circle>
    </svg>
</a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End Overlay -->
    <a class="mobile-menu-close" href="#"><i class="p-icon-times"></i></a>
    <!-- End CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="inline-form">
            <input type="search" name="search" autocomplete="off" placeholder="Search your keyword..." required />
            <button class="btn btn-search" type="submit">
                <i class="p-icon-search-solid"></i>
            </button>
        </form>
        <!-- End Search Form -->
        <ul class="mobile-menu mmenu-anim">
            <li>
                <a href="demo1.html">Home</a>
            </li>
            <li>
                <a href="shop.html">Shop</a>
                <ul>
                    <li>
                        <a href="#">
                            Shop Layouts
                        </a>
                        <ul>
                            <li><a href="shop-list.html">Shop list</a></li>
                            <li><a href="shop-3-cols.html">3 Columns mode</a>
                            </li>
                            <li><a href="shop-4-cols.html">4 Columns mode</a></li>
                            <li><a href="shop-5-cols.html">5 Columns mode</a>
                            </li>
                            <li><a href="shop-6-cols.html">6 Columns mode</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Shop Variations
                        </a>
                        <ul>
                            <li><a href="shop-left-sidebar.html">With left sidebar</a>
                            </li>
                            <li><a href="shop-full-width.html">Full width</a>
                            </li>
                            <li><a href="shop-horizontal-filter.html">Horizontal filter</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Product Details
                        </a>
                        <ul>
                            <li><a href="product-simple.html">Default</a></li>
                            <li><a href="product-gallery.html">Gallery</a></li>
                            <li><a href="product-sticky.html">Sticky info</a></li>
                            <li><a href="product-full.html">Full width</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            Woo Subpages
                        </a>
                        <ul>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="account.html">My account</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Elements</a>
                <ul>
                    <li>
                        <a href="#">Elements 1</a>
                        <ul>
                            <li><a href="element-accordions.html">Accordion</a></li>
                            <li><a href="element-alerts.html">Alert & Notification</a></li>
                            <li><a href="element-banner.html">Banner
                                </a></li>
                            <li><a href="element-banner-effect.html">Banner Effect
                                </a></li>
                            <li><a href="element-blog.html">Blog</a></li>
                            <li><a href="element-button.html">Button</a></li>
                            <li><a href="element-columns.html">Columns
                                </a></li>
                            <li><a href="element-countdown.html">Countdown</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Elements 2</a>
                        <ul>
                            <li><a href="element-creative-grid.html">Creative Grid</a></li>
                            <li><a href="element-counter.html">Counter
                                </a></li>
                            <li><a href="element-entrance-effect.html">Entrance Effect
                                </a></li>
                            <li><a href="element-mouse-tracking.html">Mouse Tracking Effect
                                </a></li>
                            <li><a href="element-hotspot.html">Hotspot
                                </a></li>
                            <li><a href="element-icon-box.html">Icon Box</a></li>
                            <li><a href="element-icons.html">Icon Library</a></li>
                            <li><a href="element-image-box.html">Image box
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Elements 3</a>
                        <ul>
                            <li><a href="element-image-gallery.html">Image Gallery</a></li>
                            <li><a href="element-categories.html">Category</a></li>
                            <li><a href="element-products.html">Products
                                </a></li>
                            <li><a href="element-product-banner.html">Products + Banner
                                </a></li>
                            <li><a href="element-product-tabs.html">Product Tab
                                </a>
                            </li>
                            <li><a href="element-section.html">Section Divider

                                </a></li>
                            <li><a href="element-slider.html">Slider
                                </a></li>
                            <li><a href="element-social.html">Social Icons
                                </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Elements 4</a>
                        <ul>
                            <li><a href="element-tabs.html">Tabs
                                </a></li>
                            <li><a href="element-testimonial.html">Testimonial

                                </a></li>
                            <li><a href="element-title.html">Title</a></li>
                            <li><a href="element-typography.html">Typography
                                </a></li>
                            <li><a href="element-video.html">Video</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="blog.html">Blog</a>
                <ul>
                    <li><a href="blog.html">Classic</a></li>
                    <li><a href="blog-single.html">Single Post</a></li>
                    <li><a href="blog-2-grid.html">Grid 2 Columns</a></li>
                    <li><a href="blog-3-grid.html">Grid 3 Columns</a></li>
                    <li><a href="blog-4-grid.html">Grid 4 Columns</a></li>
                    <li><a href="blog-sidebar.html">Grid Sidebar</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Pages</a>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="account.html">My Account</a></li>
                    <li><a href="faq.html">Faqs</a></li>
                    <li><a href="error.html">Error 404</a></li>
                    <li><a href="coming.html">Coming Soon</a></li>
                </ul>
            </li>
            <li><a href="https://d-themes.com/buynow/pandahtml/">Buy Panda!</a></li>
        </ul>
        <!-- End MobileMenu -->
    </div>
</div>
{{--<div class="newsletter-popup mfp-hide" id="newsletter-popup">--}}
{{--    <figure>--}}
{{--        <img src="{{ asset('frontend/images/newsletter-popup') }}.jpg" width="500" height="269" alt="newsletter">--}}
{{--    </figure>--}}
{{--    <div class="newsletter-content">--}}
{{--        <h3>Join Our Mailing List</h3>--}}
{{--        <p>Stay informed! Monthly tips and discount.</p>--}}
{{--        <form action="#" method="get" class="inline-form mx-auto">--}}
{{--            <input type="email" name="email" id="email2" placeholder="Email address here..." required="">--}}
{{--            <button class="btn btn-dark" type="submit">SUBMIT</button>--}}
{{--        </form>--}}
{{--        <div class="form-checkbox">--}}
{{--            <input type="checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup" required="">--}}
{{--            <label for="hide-newsletter-popup">Don't show this popup again</label>--}}
{{--        </div>--}}
{{--        <div class="social-links">--}}
{{--            <a href="#" title="facebook" class="social-link fab fa-facebook-f"></a>--}}
{{--            <a href="#" title="twitter" class="social-link fab fa-twitter"></a>--}}
{{--            <a href="#" title="pinterest" class="social-link fab fa-pinterest"></a>--}}
{{--            <a href="#" title="linkedin" class="social-link fab fa-linkedin-in"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Plugins JS File -->
<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
<!-- Main JS File -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

@yield('scripts')
</body>


</html>
