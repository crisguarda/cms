<?php
    if (isset($page)) {
        $services = \App\Models\Service::where('page_id', $page->id)->where('active', 1)->orderby('order')->get();
    } else {
        $services = \App\Models\Service::where('page_id', 0)->where('active', 1)->orderby('order')->get();
    }
?>
{{--@dd(count($services))--}}
@foreach($services as $service)
<section class="intro-section">
    <div class="container">
        <div class="owl-carousel owl-theme owl-box-border row cols-md-3 cols-sm-2 cols-1 appear-animate"
             data-owl-options="{
                                                'nav': false,
                                                'dots': false,
                                                'loop': false,
                                                'responsive': {
                                                    '0': {
                                                        'items': 1,
                                                        'autoplay': true
                                                    },
                                                    '576': {
                                                        'items': 2,
                                                        'autoplay': true
                                                    },
                                                    '768': {
                                                        'items': 3,
                                                        'dots': false
                                                    }
                                                }
                                            }">
            @foreach($service->itens as $item)
                <div class="icon-box icon-box-side">
                    <span class="icon-box-icon">
                        <i class="{{ $item->icon }}"></i>
                    </span>
                    <div class="icon-box-content">
                        <h4 class="icon-box-title">{{ $item->title }}</h4>
                        <p>{{ $item->subtitle }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach
