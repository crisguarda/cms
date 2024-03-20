<?php
    use App\Models\Product;
    use App\Models\ProductCategory;
    use App\Models\Unity;

    $url = last(explode('/', url()->current()));
    $category = ProductCategory::where('url', $url)->first();
    $categories = ProductCategory::where('active', 1)->orderby('order')->get();

    $total_products = Product::where('active', 1)->count();
    $products = Product::where([
        'active' => 1,
        'product_category_id' => $category->id
    ])
    ->orderby('order')
    ->paginate(12);

?>
<div class="page-header cph-header pl-4 pr-4" style="background-color: #fff7ec">
    <h1 class="page-title font-weight-light text-capitalize">{{ $category->title }}</h1>
    <div class="category-container row justify-content-center cols-2 cols-xs-3 cols-sm-4 cols-md-6 pt-6">
        @foreach($categories as $cat)
            <div class="category category-ellipse mb-4 mb-md-0 {{ $cat == $category ? 'active' : '' }}">
                <a href="{{ url('produtos', $cat->url) }}">
                    <figure>
                        <img src="{{ asset($cat->image) }}" alt="category" width="160" height="161">
                    </figure>
                </a>
                <div class="category-content">
                    <h3 class="category-name"><a href="{{ url($page->url, $cat->url) }}">{{ $cat->title }}</a>
                    </h3>
                </div>
            </div>
        @endforeach
{{--        <div class="category category-ellipse mb-4 mb-md-0">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-1.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Canned</a>
                </h3>
            </div>
        </div>
        <div class="category category-ellipse mb-4 mb-md-0">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-2.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Fruits</a>
                </h3>
            </div>
        </div>
        <div class="category category-ellipse mb-4 mb-md-0">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-3.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Vegetables</a>
                </h3>
            </div>
        </div>
        <div class="category category-ellipse">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-4.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Meats</a>
                </h3>
            </div>
        </div>
        <div class="category category-ellipse">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-5.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Coffee</a>
                </h3>
            </div>
        </div>
        <div class="category category-ellipse">
            <a href="#">
                <figure>
                    <img src="images/shop/cat-6.jpg" alt="category" width="160" height="161">
                </figure>
            </a>
            <div class="category-content">
                <h3 class="category-name"><a href="#">Snack</a>
                </h3>
            </div>
        </div>--}}
    </div>
</div>
<nav class="breadcrumb-nav has-border">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>{{ $category->title }}</li>
        </ul>
    </div>
</nav>


<div class="page-content mb-10 shop-page">
    <div class="container">
        <div class="row main-content-wrap">

{{--            <aside--}}
{{--                class="col-lg-3 sidebar widget-sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">--}}
{{--                <div class="sidebar-overlay"></div>--}}
{{--                <a class="sidebar-close" href="#"><i class="p-icon-times"></i></a>--}}
{{--                <div class="sidebar-content">--}}
{{--                    <div class="sticky-sidebar pt-7" data-sticky-options="{'top': 10}">--}}
{{--                        <div class="widget widget-collapsible">--}}
{{--                            <h3 class="widget-title title-underline"><span class="title-text">Filter by--}}
{{--                                                Price</span></h3>--}}
{{--                            <div class="widget-body">--}}
{{--                                <form action="#" class="pt-2">--}}
{{--                                    <div class="filter-price-slider"></div>--}}

{{--                                    <div class="filter-actions">--}}
{{--                                        <button type="submit" class="btn btn-dim btn-filter">Filter</button>--}}
{{--                                    </div>--}}
{{--                                </form><!-- End Filter Price Form -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-collapsible">--}}
{{--                            <h3 class="widget-title title-underline"><span--}}
{{--                                    class="title-text">Nutrition</span></h3>--}}
{{--                            <ul class="widget-body filter-items">--}}
{{--                                <li><a href="#">High Fibre</a></li>--}}
{{--                                <li><a href="#">Low Calorie</a></li>--}}
{{--                                <li><a href="#">No Sugar Added</a></li>--}}
{{--                                <li><a href="#">Vegetarian</a></li>--}}
{{--                                <li><a href="#">Low Fat</a></li>--}}
{{--                                <li><a href="#">Whole Grain</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-collapsible">--}}
{{--                            <h3 class="widget-title title-underline"><span class="title-text">Brand</span>--}}
{{--                            </h3>--}}
{{--                            <ul class="widget-body filter-items">--}}
{{--                                <li><a href="#">Nestle</a></li>--}}
{{--                                <li><a href="#">Nescafe</a></li>--}}
{{--                                <li><a href="#">Tropicana</a></li>--}}
{{--                                <li><a href="#">Coca Cola</a></li>--}}
{{--                                <li><a href="#">Benecol</a></li>--}}
{{--                                <li><a href="#">Alpro</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-collapsible">--}}
{{--                            <h3 class="widget-title title-underline"><span class="title-text">Filter by--}}
{{--                                                Rating</span></h3>--}}
{{--                            <div class="widget-body">--}}
{{--                                <ul class="rating-group filter-items">--}}
{{--                                    <li class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width:100%"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-simple.html#content-reviews"--}}
{{--                                           class="rating-reviews hash-scroll">22</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width:80%"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-simple.html#content-reviews"--}}
{{--                                           class="rating-reviews hash-scroll">15</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width:60%"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-simple.html#content-reviews"--}}
{{--                                           class="rating-reviews hash-scroll">18</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width:40%"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-simple.html#content-reviews"--}}
{{--                                           class="rating-reviews hash-scroll">0</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="ratings-container">--}}
{{--                                        <div class="ratings-full">--}}
{{--                                            <span class="ratings" style="width:20%"></span>--}}
{{--                                            <span class="tooltiptext tooltip-top"></span>--}}
{{--                                        </div>--}}
{{--                                        <a href="product-simple.html#content-reviews"--}}
{{--                                           class="rating-reviews hash-scroll">0</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="widget widget-collapsible">--}}
{{--                            <h3 class="widget-title title-underline"><span class="title-text">Product--}}
{{--                                                Tags</span></h3>--}}
{{--                            <div class="widget-body mt-1">--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    Organic--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    greenhouse--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    fat--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    healthy--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    dairy--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    vitamin--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    diet--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    nutrition--}}
{{--                                </a>--}}
{{--                                <a href="#" class="tag">--}}
{{--                                    cholesterol--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </aside>--}}
            <div class="col-lg-12 main-content pl-lg-6">
                <nav class="toolbox sticky-toolbox sticky-content fix-top">
                    <div class="toolbox-left">
                        <a href="#"
                           class="toolbox-item left-sidebar-toggle btn btn-outline btn-primary btn-icon-right d-lg-none"><span>Filter</span><i
                                class="p-icon-category-1 ml-md-1"></i></a>
                        <div class="toolbox-item toolbox-sort select-menu">
                            <label>Sort By :</label>
                            <select name="orderby">
                                <option value="default" selected="selected">Default Sorting</option>
                                <option value="popularity">Sort By Popularity</option>
                                <option value="rating">Sort By The Latest</option>
                                <option value="date">Sort By Average Rating</option>
                                <option value="price-low">Sort By Price: Low To High</option>
                                <option value="price-high">Sort By Price: High To Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show select-box">
                            <label>Show :</label>
                            <select name="count">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                        <div class="toolbox-item toolbox-layout">
                            <a href="shop-list.html" class="p-icon-list btn-layout"></a>
                            <a href="shop-3-cols.html" class="p-icon-grid btn-layout active"></a>
                        </div>
                    </div>
                </nav>
                <div class="row product-wrapper cols-md-3 cols-2">
                    @foreach($products as $product)
                        <div class="product-wrap">
                            <div class="product shadow-media text-center">
                                <figure class="product-media">
                                    <a href="{{ url($category->url, $product->url) }}">
                                        <img src="{{ asset($product->image) }}" alt="product" width="295"
                                             height="369" />
{{--                                        <img src="images/products/5-2-295x369.jpg" alt="product" width="295"--}}
{{--                                             height="369" />--}}
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                           data-target="#addCartModal" title="Add to Cart">
                                            <i class="p-icon-cart-solid"></i>
                                        </a>
                                        <a href="#" class="btn-product-icon btn-wishlist"
                                           title="Add to Wishlist">
                                            <i class="p-icon-heart-solid"></i>
                                        </a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                            <i class="p-icon-compare-solid"></i>
                                        </a>
                                        <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                            <i class="p-icon-search-solid"></i>
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
                                        <a href="{{ url('produtos', $product->url) }}">
                                            {{ $product->title }}
                                        </a>
                                    </h5>
                                    <span class="product-price">
{{--                                        <del class="old-price">$28.00</del>--}}
                                        @if($product->unity_price->first())
                                            <ins class="new-price">
                                                {{ $product->unity_price->first()->price}}€
                                                {{ Unity::find($product->unity_price->first()->unity_id)->unity }}
                                            </ins>
                                        @else
                                            <ins class="new-price">
                                                1€ Kg
                                            </ins>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <!-- End .product -->
                        </div>
                    @endforeach
{{--                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/5-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/5-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Peanut
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/6-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/6-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Peas
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/7-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/7-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Salted Caramel
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/8-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/8-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Broccoli
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/21-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Glutinous Cake
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/19-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/19-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Raspberry
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/20-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Beef
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/22-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Garlic
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/16-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Butter Cake
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/24-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Dark Chocolate
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/12-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Nutri-Grain
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>
                    <div class="product-wrap">
                        <div class="product shadow-media text-center">
                            <figure class="product-media">
                                <a href="product-simple.html">
                                    <img src="images/products/1-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                    <img src="images/products/1-2-295x369.jpg" alt="product" width="295"
                                         height="369" />
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                                       data-target="#addCartModal" title="Add to Cart">
                                        <i class="p-icon-cart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-wishlist"
                                       title="Add to Wishlist">
                                        <i class="p-icon-heart-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare">
                                        <i class="p-icon-compare-solid"></i>
                                    </a>
                                    <a href="#" class="btn-product-icon btn-quickview" title="Quick View">
                                        <i class="p-icon-search-solid"></i>
                                    </a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width:60%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="product-simple.html#content-reviews"
                                       class="rating-reviews">(12)</a>
                                </div>
                                <h5 class="product-name">
                                    <a href="product-simple.html">
                                        Peaches
                                    </a>
                                </h5>
                                <span class="product-price">
                                                <del class="old-price">$28.00</del>
                                                <ins class="new-price">$12.00</ins>
                                            </span>
                            </div>
                        </div>
                        <!-- End .product -->
                    </div>--}}
                </div>
                @if(count($products) > 1)
                    {{ $products->links() }}
                @endif
                <nav class="toolbox toolbox-pagination pt-2 pb-6">
                    <p class="toolbox-item show-info">Showing <span>1-12 of 60</span> Products
                    </p>
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
                               aria-disabled="true">
                                <i class="p-icon-angle-left"></i>
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
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
    </div>
</div>
<!-- End .page-content-->


@section('scripts')
    <script>
        $('.page-header')[0].remove();
        $('.breadcrumb-nav')[0].remove();
    </script>
@endsection
