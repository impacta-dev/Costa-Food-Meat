@extends('layouts.master')
@section('content')
{{-- Header --}}
<div class="header">
    <div class="container">
        <div class="row">
            @include('partials.logo')
        </div>
    </div>
    {{--  Carousel  --}}
    <div id="carouselIntro" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('/img/pages/home/carousel-factory.jpg?v1');">
                <div class="container">
                    <div class="row">
                        <div class="col-space-both header__slide-text--tr">
                            <div>
                                {!! $utils->content('carousel_factory', $page) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('/img/pages/home/carousel-farm.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-space-both header__slide-text--bl">
                            <div>
                                {!! $utils->content('carousel_farm', $page) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('/img/pages/home/carousel-products.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-space-both header__slide-text--bl">
                            <div>
                                {!! $utils->content('carousel_products', $page) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-controls">
        <div class="container">
            <div class="row">
                <div class="col-space-both">
                    <a class="carousel-control-prev" href="#carouselIntro" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselIntro" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--  Mouse icon  --}}
    <div class="mouse">
        <div>
            <div></div>
        </div>
    </div>    
    {{--  Old intro  --}}
    @if(1==2)
    <div class="container">
        <div class="row">
            {{--  Renders  --}}
            <div class="col-12 col-xl-6 header__renders mb-5 mb-xl-0">
                @include('partials.product-renders', ['field' => '35deg'])
                <div class="row">
                    <div class="col-space-left">
                        <div class="d-flex align-items-center justify-content-start">
                            <a href="#" class="btn-prev mr-1">
                                <img src="/img/arrow-l.svg" alt="{{ $utils->content('previous') }}" class="img-fluid">
                            </a>
                            <a href="#" class="btn-next mr-5">
                                <img src="/img/arrow-r.svg" alt="{{ $utils->content('next') }}" class="img-fluid">
                            </a>
                            <h2 class="renders__name"></h2>
                        </div>
                    </div>
                </div>
            </div>
            {{--  Info  --}}
            <div class="offset-xl-1 col-xl-4">
                <div class="row">
                    <div class="col-3">
                        <img src="/img/certs/welfair_{{ app()->getLocale() }}.svg" alt="Welfair" class="img-fluid header__welfair">
                    </div>
                    <div class="col d-flex flex-column align-items-start justify-xl-content-end">
                        <h2 class="header__subtitle">{!! $utils->content('header_subtitle', $page) !!}</h2>
                        <p class="header__text mb-0">{!! $utils->content('header_text', $page) !!}</p>
                        <a href="{{ $utils->route_to_view('products') }}" target="_self" class="d-block d-xl-none header__btn mt-5">{!! $utils->content('header_button', $page) !!}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-3 col">
                        <a href="{{ $utils->route_to_view('products') }}" target="_self" class="d-none d-xl-block header__btn mt-5">{!! $utils->content('header_button', $page) !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
{{-- Intro --}}
<div class="intro">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-5 col-space-left">
                <h3 class="intro__subtitle">{!! $utils->content('intro_subtitle', $page) !!}</h3>
                <h2 class="intro__title">{!! $utils->content('intro_title', $page) !!}</h2>
                <a href="{{ $utils->route_to_view('about') }}" target="_self" class="intro__btn">{!! $utils->content('intro_button', $page) !!}</a>
            </div>
            <div class="col text-center px-3">
                <img src="/img/pages/home/intro.jpg?v2" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
{{-- Group --}}
<div class="group">
    <div class="container">
        <div class="row">
            <div class="col-space-both col">
                <div class="row">
                    <div class="col-12 col-xl-5">
                        <h2 class="group__title">{!! $utils->content('group_title', $page) !!}</h2>
                        <h3 class="group__subtitle">{!! $utils->content('group_subtitle', $page) !!}</h3>
                    </div>
                    <div class="offset-xl-2 col">
                        <p class="group__text mb-5">{!! $utils->content('group_text', $page) !!}</p>
                        <a href="https://www.costafood.com" target="_blank" class="btn">{!! $utils->content('group_button', $page) !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Welfair --}}
<div class="welfair container">
    <div class="row">
        <div class="col-space-both">
            <div class="row welfair__1">
                <div class="col-12 col-xl-4">
                    <h2 class="welfair__title mb-xl-5">{!! $utils->content('welfair_title', $page) !!}</h2>
                    <p class="welfair__text">{!! $utils->content('welfair_text', $page) !!}</p>
                    <a href="{{ $utils->route_to_view('welfair') }}" target="_self" class="btn mt-xl-5 mb-5 mb-xl-0">{!! $utils->content('welfair_button', $page) !!}</a>
                </div>
                <div class="offset-xl-1 col">
                    <img src="/img/pages/home/welfair-1.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row welfair__2 flex-column-reverse flex-xl-row">
                <div class="col-xl-7">
                    <img src="/img/pages/home/welfair-2.jpg" alt="" class="img-fluid">
                </div>
                <div class="col">
                    <h2 class="welfair__title mb-xl-5">{!! $utils->content('welfair2_title', $page) !!}</h2>
                    <p class="welfair__text">{!! $utils->content('welfair2_text', $page) !!}</p>
                    <a href="{{ $utils->route_to_view('centers') }}" target="_self" class="btn mt-xl-5 mb-5 mb-xl-0">{!! $utils->content('welfair_button2', $page) !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 3D renders --}}
<div class="renders">
    <div class="container">
        <div class="row">
            <div class="col-space-both col position-relative">
                @include('partials.product-renders')
                <div class="renders__controls">
                    <h2 class="renders__name"></h2>
                    <a href="#" class="btn-prev">
                        <img src="/img/arrow-l.svg" alt="{{ $utils->content('previous') }}" class="img-fluid">
                    </a>
                    <a href="#" class="btn-next">
                        <img src="/img/arrow-r.svg" alt="{{ $utils->content('next') }}" class="img-fluid">
                    </a>
                </div>
                <div class="renders__info">
                    <h2 class="renders__title">{!! $utils->content('header_subtitle', $page) !!}</h2>
                    <h3 class="renders__text">{!! $utils->content('header_text', $page) !!}</h3>
                    <a href="{{ $utils->route_to_view('products') }}" target="_self" class="btn">{!! $utils->content('header_button', $page) !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Last posts  --}}
@if (count($latest_posts))
<div class="posts">
    <div class="container">
        <div class="row">
            <div class="col-space-logo-both">
                <div class="container">
                    <div class="row">
                        <div class="col pl-0">
                            <h2 class="posts__title">{!! $utils->content('posts_title', $page) !!}:</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($latest_posts as $post)
                        @include('partials.news-item', ['post' => $post])
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col text-center my-5">
                            <a href="{{ $utils->route_to_view('news') }}" target="_self">{!! $utils->content('posts_more', $page) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
    <script>
        // Main menu: automatic animation
        setInterval(function() {
            if (!window.menu1IsOpen && !window.menuIsMouseEnter) {
            
                $('.menu1-bar1').addClass('menu1-bar1--show');
                $('.menu1-bar2').addClass('menu1-bar2--show');
                
                setTimeout(() => {
                    $('.menu1-button span').addClass('animate');
                }, 500);
                
                setTimeout(() => {
                    $('.menu1-bar1').removeClass('menu1-bar1--show');
                    $('.menu1-bar2').removeClass('menu1-bar2--show');
                    $('.menu1-button span').removeClass('animate');
                }, 2000);
            }
        }, 5000);
    </script>
@endsection