<?php
    if (isset($page)) {
        $banners = \App\Models\Banner::where('page_id', $page->id)->where('active', 1)->orderby('order')->get();
    } else {
        $banners = \App\Models\Banner::where('page_id', 0)->where('active', 1)->orderby('order')->get();
    }
?>
<section class="intro-section">
    <div class="intro-slider owl-carousel owl-theme owl-nav-arrow row animation-slider cols-1 gutter-no mb-8"
         data-owl-options="{
                                'nav': true,
                                'dots': false,
                                'loop': false,
                                'items': 1,
                                'responsive': {
                                    '0': {
                                        'nav': false,
                                        'autoplay': true
                                    },
                                    '768': {
                                        'nav': true
                                    }
                                }
                            }">
        @foreach($banners as $banner)
            <div class="banner banner-fixed banner1">
                <figure>
                    <img src="{{ $banner->image }}" alt="{{ $banner->image_alt }}" width="1903" height="600"
                         style="background-color: #f8f6f6;">
                </figure>
                <div class="banner-content y-50 pb-1">
                    <h4 class="banner-subtitle title-underline2 font-weight-normal text-dim slide-animate appear-animate"
                        data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'delay': '.2s'
                                                }">
                                        <span>{{ $banner->title }}</span></h4>
                    <h3 class="banner-title text-dark lh-1 mb-7 slide-animate appear-animate"
                        data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'delay': '.4s'
                                                }">
                        {!! $banner->subtitle !!}</h3>
                    <a href="{{ $banner->button_link }}" class="btn btn-dark slide-animate appear-animate"
                       data-animation-options="{
                                                    'name': 'fadeInUpShorter',
                                                    'delay': '.6s'
                                                }">{{ $banner->button_text }}<i class="p-icon-arrow-long-right"></i></a>
                </div>
            </div>
        @endforeach
    </div>
</section>
