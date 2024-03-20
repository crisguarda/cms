@php
    $pages = \App\Models\Page::all();
@endphp
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ Auth::user()->gravatar }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('setting.index') }}" class=" waves-effect">
                        <i class="fas fa-cogs"></i>
                        <span>Definições</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('page.index') }}" class=" waves-effect">
                        <i class="fas fa-file-alt"></i>
                        <span>Paginas</span>
                    </a>
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        @foreach($pages as $page)--}}
{{--                            <li><a href="{{ route('banner.index') }}">Banner</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Modulos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('banner.index') }}">Banner</a></li>
                        <li><a href="{{ route('simpleText.index') }}">Texto Simples</a></li>
                        <li><a href="{{ route('imageText.index') }}">Texto Imagem</a></li>
                        <li><a href="{{ route('gallery.index') }}">Galeria</a></li>
                        <li><a href="{{ route('service.index') }}">Serviços</a></li>
                        <li><a href="{{ route('contact.index') }}">Contacto</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-layout-3-line"></i>
                        <span>Produtos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('productCategory.index') }}">Categorias de Produto</a></li>
                        <li><a href="{{ route('product.index') }}">Produtos</a></li>
                        <li><a href="{{ route('unity.index') }}">Unidades</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
