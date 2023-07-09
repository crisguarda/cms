@php
    use App\Models\Page;
    use App\Models\ProductCategory;

    $pages = Page::where('active', true)->orderby('order')->get();
    $categories = ProductCategory::where('active', true)->orderby('order')->get();
@endphp
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#" class="call">
                    <i class="p-icon-phone-solid"></i>
                    <span>+456 789 000</span>
                </a>
                <span class="divider"></span>
                <a href="contact.html" class="contact">
                    <i class="p-icon-map"></i>
                    <span>25 West 21th STREET, Miami FL, USA</span>
                </a>
            </div>
            <div class="header-right">
                <div class="dropdown switcher">
                    <a href="#currency">USD</a>
                    <ul class="dropdown-box">
                        <li><a href="#USD">USD</a></li>
                        <li><a href="#EUR">EUR</a></li>
                    </ul>
                </div>
                <!-- End DropDown Menu -->
                <div class="dropdown switcher">
                    <a href="#language"><img src="{{ asset('frontend/images/flagus.jpg') }}" width="14" height="10" class="mr-1"
                                             alt="flagus">ENG</a>
                    <ul class="dropdown-box">
                        <li>
                            <a href="#USD"><img src="{{ asset('frontend/images/flagus.jpg') }}" width="14" height="10" class="mr-1"
                                                alt="flagus">ENG</a>
                        </li>
                        <li>
                            <a href="#EUR"><img src="{{ asset('frontend/images/flagfr.jpg') }}" width="14" height="10" class="mr-1"
                                                alt="flagfr">FRH</a>
                        </li>
                    </ul>
                </div>
                <span class="divider"></span>
                <!-- End DropDown Menu -->
                <div class="social-links">
                    <a href="#" class="social-link fab fa-facebook-f" title="Facebook"></a>
                    <a href="#" class="social-link fab fa-twitter" title="Twitter"></a>
                    <a href="#" class="social-link fab fa-pinterest" title="Pinterest"></a>
                    <a href="#" class="social-link fab fa-linkedin-in" title="Linkedin"></a>
                </div>
                <!-- End of Social Links -->
            </div>
        </div>
    </div>
    <!-- End HeaderTop -->
    <div class="header-middle has-center sticky-header fix-top sticky-content">
        <div class="container">
            <div class="header-left">
                <a href="#" class="mobile-menu-toggle" title="Mobile Menu">
                    <i class="p-icon-bars-solid"></i>
                </a>
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('frontend/images/logo.png') }}" alt="logo">
                </a>
                <!-- End of Divider -->
            </div>
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        @foreach($pages as $page)
                            <li>
                                @if($page->url === 'produtos')
                                    <a disabled="disabled">{{ $page->title }}</a>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li><a href="{{ url($page->url, $category->url) }}">{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <a href="{{ url($page->url) }}">{{ $page->title }}</a>
                                @endif
                            </li>
                        @endforeach

{{--                        <li class="active">--}}
{{--                            <a href="demo1.html">Home</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="shop.html">Shop</a>--}}
{{--                            <div class="megamenu">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-6 col-sm-4">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Shop Layouts</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-list.html">Shop list</a></li>--}}
{{--                                            <li><a href="shop-3-cols.html">3 Columns mode</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-4-cols.html">4 Columns mode</a></li>--}}
{{--                                            <li><a href="shop-5-cols.html">5 Columns mode</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-6-cols.html">6 Columns mode</a></li>--}}
{{--                                        </ul>--}}
{{--                                        <h4 class="menu-title title-underline"><span>Shop--}}
{{--                                                        Variations</span></h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-left-sidebar.html">With left sidebar</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-full-width.html">Full width</a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="shop-horizontal-filter.html">Horizontal filter</a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-4">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Product--}}
{{--                                                        Details</span></h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="product-simple.html">Default</a></li>--}}
{{--                                            <li><a href="product-gallery.html">Gallery</a></li>--}}
{{--                                            <li><a href="product-sticky.html">Sticky info</a></li>--}}
{{--                                            <li><a href="product-full.html">Full width</a></li>--}}
{{--                                        </ul>--}}
{{--                                        <h4 class="menu-title title-underline"><span>Woo Subpages</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="cart.html">Cart</a></li>--}}
{{--                                            <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                            <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                            <li><a href="compare.html">Compare</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-sm-4 menu-banner banner banner-fixed">--}}
{{--                                        <figure>--}}
{{--                                            <img src="{{ asset('frontend/images/shop-menu') }}.jpg" alt="Menu banner" width="224"--}}
{{--                                                 height="425" />--}}
{{--                                        </figure>--}}
{{--                                        <div class="banner-content">--}}
{{--                                            <h4 class="banner-subtitle text-body mb-2 text-uppercase">--}}
{{--                                                New--}}
{{--                                                Arrivals--}}
{{--                                            </h4>--}}
{{--                                            <h3 class="banner-title text-capitalize">Fresh--}}
{{--                                                Fruits<br>collection--}}
{{--                                            </h3>--}}
{{--                                            <p class="banner-descri text-dim font-weight-light ls-normal mb-4">--}}
{{--                                                From<span--}}
{{--                                                    class="text-primary font-weight-normal  pl-1">$24.00</span>--}}
{{--                                            </p>--}}
{{--                                            <a href="shop.html"--}}
{{--                                               class="btn btn-outline btn-primary-dark font-weight-normal">shop--}}
{{--                                                now</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- End Megamenu -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Elements</a>--}}
{{--                            <div class="megamenu">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Elements 1</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="element-accordions.html">Accordion</a></li>--}}
{{--                                            <li><a href="element-alerts.html">Alert & Notification</a></li>--}}
{{--                                            <li><a href="element-banner.html">Banner--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-banner-effect.html">Banner Effect--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-blog.html">Blog</a></li>--}}
{{--                                            <li><a href="element-button.html">Button</a></li>--}}
{{--                                            <li><a href="element-columns.html">Columns--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-countdown.html">Countdown</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Elements 2</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="element-creative-grid.html">Creative Grid</a></li>--}}
{{--                                            <li><a href="element-counter.html">Counter--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-entrance-effect.html">Entrance Effect--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-mouse-tracking.html">Mouse Tracking Effect--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-hotspot.html">Hotspot--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-icon-box.html">Icon Box</a></li>--}}
{{--                                            <li><a href="element-icons.html">Icon Library</a></li>--}}
{{--                                            <li><a href="element-image-box.html">Image box--}}
{{--                                                </a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Elements 3</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="element-image-gallery.html">Image Gallery</a></li>--}}
{{--                                            <li><a href="element-categories.html">Category</a></li>--}}
{{--                                            <li><a href="element-products.html">Products--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-product-banner.html">Products + Banner--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-product-tabs.html">Product Tab--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li><a href="element-section.html">Section Divider--}}

{{--                                                </a></li>--}}
{{--                                            <li><a href="element-slider.html">Slider--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-social.html">Social Icons--}}
{{--                                                </a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <h4 class="menu-title title-underline"><span>Elements 4</span>--}}
{{--                                        </h4>--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="element-tabs.html">Tabs--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-testimonial.html">Testimonial--}}

{{--                                                </a></li>--}}
{{--                                            <li><a href="element-title.html">Title</a></li>--}}
{{--                                            <li><a href="element-typography.html">Typography--}}
{{--                                                </a></li>--}}
{{--                                            <li><a href="element-video.html">Video</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="blog.html">Blog</a>--}}
{{--                            <ul>--}}
{{--                                <li><a href="blog.html">Classic</a></li>--}}
{{--                                <li><a href="blog-single.html">Single Post</a></li>--}}
{{--                                <li><a href="blog-2-grid.html">Grid 2 Columns</a></li>--}}
{{--                                <li><a href="blog-3-grid.html">Grid 3 Columns</a></li>--}}
{{--                                <li><a href="blog-4-grid.html">Grid 4 Columns</a></li>--}}
{{--                                <li><a href="blog-sidebar.html">Grid Sidebar</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">pages</a>--}}
{{--                            <ul>--}}
{{--                                <li><a href="about.html">About Us</a></li>--}}
{{--                                <li><a href="contact.html">Contact Us</a></li>--}}
{{--                                <li><a href="account.html">My Account</a></li>--}}
{{--                                <li><a href="faq.html">Faqs</a></li>--}}
{{--                                <li><a href="error.html">Error 404</a></li>--}}
{{--                                <li><a href="coming.html">Coming Soon</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="https://d-themes.com/buynow/pandahtml/">buy panda!</a>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                <div class="header-search hs-toggle">
                    <a class="search-toggle" href="#" title="Search">
                        <i class="p-icon-search-solid"></i>
                    </a>
                    <form action="#" class="form-simple">
                        <input type="search" autocomplete="off" placeholder="Search in..." required>
                        <button class="btn btn-search" type="submit">
                            <i class="p-icon-search-solid"></i>
                        </button>
                    </form>
                </div>
                <div class="dropdown login-dropdown off-canvas">
                    <a class="login-toggle" href="ajax/login.html" data-toggle="login-modal">
                        <span class="sr-only">login</span>
                        <i class="p-icon-user-solid"></i>
                    </a>
                    <!-- End Login Toggle -->
                    <div class="canvas-overlay"></div>
                    <a href="#" class="btn-close"></a>
                    <div class="dropdown-box scrollable">
                        <div class="login-popup">
                            <div class="form-box">
                                <div class="tab tab-nav-underline tab-nav-boxed">
                                    <ul class="nav nav-tabs nav-fill mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link active lh-1 ls-normal" href="#signin">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link lh-1 ls-normal" href="#register">Register</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="signin">
                                            <form action="#">
                                                <div class="form-group">
                                                    <input type="text" id="singin-email" name="singin-email"
                                                           placeholder="Username or Email Address" required="">
                                                    <input type="password" id="singin-password"
                                                           name="singin-password" placeholder="Password"
                                                           required="">
                                                </div>
                                                <div class="form-footer">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox" id="signin-remember"
                                                               name="signin-remember">
                                                        <label for="signin-remember">Remember
                                                            me</label>
                                                    </div>
                                                    <a href="#" class="lost-link">Lost your password?</a>
                                                </div>
                                                <button class="btn btn-dark btn-block"
                                                        type="submit">Login</button>
                                            </form>
                                            <div class="form-choice text-center">
                                                <label>or Login With</label>
                                                <div class="social-links social-link-active ">
                                                    <a href="#" title="Facebook"
                                                       class="social-link social-facebook fab fa-facebook-f"></a>
                                                    <a href="#" title="Twitter"
                                                       class="social-link social-twitter fab fa-twitter"></a>
                                                    <a href="#" title="Linkedin"
                                                       class="social-link social-linkedin fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="register">
                                            <form action="#">
                                                <div class="form-group">
                                                    <input type="text" id="register-user" name="register-user"
                                                           placeholder="Username" required="">
                                                    <input type="email" id="register-email"
                                                           name="register-email" placeholder="Your Email Address"
                                                           required="">
                                                    <input type="password" id="register-password"
                                                           name="register-password" placeholder="Password"
                                                           required="">
                                                </div>
                                                <div class="form-footer mb-5">
                                                    <div class="form-checkbox">
                                                        <input type="checkbox" id="register-agree"
                                                               name="register-agree" required="">
                                                        <label for="register-agree">I
                                                            agree to the
                                                            privacy policy</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-dark btn-block"
                                                        type="submit">Register</button>
                                            </form>
                                            <div class="form-choice text-center">
                                                <label class="ls-m">or Register With</label>
                                                <div class="social-links social-link-active ">
                                                    <a href="#" title="Facebook"
                                                       class="social-link social-facebook fab fa-facebook-f"></a>
                                                    <a href="#" title="Twitter"
                                                       class="social-link social-twitter fab fa-twitter"></a>
                                                    <a href="#" title="Linkedin"
                                                       class="social-link social-linkedin fab fa-linkedin-in"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button title="Close (Esc)" type="button" class="mfp-close"><span>×</span></button>
                        </div>
                    </div>
                    <!-- End Dropdown Box -->
                </div>
                <a href="wishlist.html" class="wishlist wishlist-toggle" title="Wishlist">
                    <i class="p-icon-heart-solid"></i>
                </a>
                <div class="dropdown cart-dropdown off-canvas mr-0 mr-lg-2">
                    <a href="#" class="cart-toggle link">
                        <i class="p-icon-cart-solid">
                            <span class="cart-count">2</span>
                        </i>
                    </a>
                    <div class="canvas-overlay"></div>
                    <div class="dropdown-box">
                        <div class="canvas-header">
                            <h4 class="canvas-title">Shopping Cart</h4>
                            <a href="#" class="btn btn-dark btn-link btn-close">close<i
                                    class="p-icon-arrow-long-right"></i><span class="sr-only">Cart</span></a>
                        </div>
                        <div class="products scrollable">
                            <div class="product product-mini">
                                <figure class="product-media">
                                    <a href="product-simple.html">
                                        <img src="{{ asset('frontend/images/cart/product') }}-1.jpg" alt="product" width="84"
                                             height="105" />
                                    </a>
                                    <a href="#" title="Remove Product" class="btn-remove">
                                        <i class="p-icon-times"></i><span class="sr-only">Close</span>
                                    </a>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Peanuts</a>
                                    <div class="price-box">
                                        <span class="product-quantity">7</span>
                                        <span class="product-price">$12.00</span>
                                    </div>
                                </div>

                            </div>
                            <!-- End of Cart Product -->
                            <div class="product product-mini">
                                <figure class="product-media">
                                    <a href="product-simple.html">
                                        <img src="{{ asset('frontend/images/cart/product') }}-2.jpg" alt="product" width="84"
                                             height="105" />
                                    </a>
                                    <a href="#" title="Remove Product" class="btn-remove">
                                        <i class="p-icon-times"></i><span class="sr-only">Close</span>
                                    </a>
                                </figure>
                                <div class="product-detail">
                                    <a href="product.html" class="product-name">Prime Beef</a>
                                    <div class="price-box">
                                        <span class="product-quantity">4</span>
                                        <span class="product-price">$16.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Cart Product -->
                        </div>
                        <!-- End of Products  -->
                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">$148.00</span>
                        </div>
                        <!-- End of Cart Total -->
                        <div class="cart-action">
                            <a href="cart.html" class="btn btn-outline btn-dim mb-2">View
                                Cart</a>
                            <a href="checkout.html" class="btn btn-dim"><span>Go To Checkout</span></a>
                        </div>
                        <!-- End of Cart Action -->
                    </div>
                    <!-- End Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
</header>
