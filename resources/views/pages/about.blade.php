@extends('layouts.master')
@section('content')
{{-- Header --}}
<div class="header">
    <div class="container">
        <div class="row">
            @include('partials.logo')
            <div class="col header__title-wrap">
                <h1 class="header__title">{!! $utils->content('header_title', $page) !!}</h1>
                <div class="header__line"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-space-logo col-12 col-lg-5 mt-5 header__subtitles">
                <h2 class="header__subtitle">{!! $utils->content('header_subtitle', $page) !!}</h2>
                <h2 class="header__subtitle2">{!! $utils->content('header_subtitle2', $page) !!}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-7 pb-3 p-xl-0">
                <img src="/img/pages/about/header.jpg?v1" alt="" class="img-fluid">
            </div>
            <div class="header__text col-12 col-xl-4 pl-xl-5 pb-4">
                {!! $utils->content('header_text', $page) !!}
            </div>
        </div>
    </div>
</div>
{{-- History --}}
<div class="history container">
    <div class="row">
        <div class="history__inner col-space-both col">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h2 class="history__title">{!! $utils->content('history_title', $page) !!}</h2>
                </div>
                <div class="col-12 col-xl-5">
                    <h2 class="history__subtitle">{!! $utils->content('history_subtitle', $page) !!}</h2>
                    <div class="history__text">
                        {!! $utils->content('history_text', $page) !!}
                    </div>
                    <a href="{{ $utils->route_to_view('process') }}" target="_self" class="btn">{!! $utils->content('history_button', $page) !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Numbers --}}
<div class="numbers">
    <div class="container">
        <div class="row">
            <div class="col-space-both col d-flex align-items-start">
                <img src="/img/logo-sm.svg" alt="" class="img-fluid numbers__logo mr-5 d-none d-xl-block">
                <div>
                    <h2 class="numbers__title">{!! $utils->content('numbers_title', $page) !!}</h2>
                    <h3 class="numbers__subtitle">{!! $utils->content('numbers_subtitle', $page) !!}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-space-both col">
                <div class="row numbers__inner">
                    <div class="col-12 col-xl-5 p-0">
                        <div class="numbers__1">
                            {!! $utils->content('numbers1', $page) !!}
                        </div>
                        <div class="numbers__2">
                            {!! $utils->content('numbers2', $page) !!}
                        </div>
                    </div>
                    <div class="col numbers__3">
                        {!! $utils->content('numbers3', $page) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Numbers 2  --}}
<div class="numbers2">
    <div class="container">
        <div class="row">
            <div class="col-space-both col">
                <div class="row">
                    {{--  Titles  --}}
                    <div class="col-12 col-xl-9 d-flex align-items-start">
                        <img src="/img/logo-group-sm.svg" alt="" class="img-fluid numbers2__logo mr-5 d-none d-xl-block">
                        <div>
                            <h2 class="numbers2__title">{!! $utils->content('numbers_group_title', $page) !!}</h2>
                            <h3 class="numbers2__subtitle"><a href="https://grupoempresarialcosta.com/" target="_blank">{!! $utils->content('numbers_group_subtitle', $page) !!}</a></h3>
                        </div>
                    </div>
                    {{--  Arrows  --}}
                    <div class="col d-flex justify-content-end mb-3 mb-xl-0">
                        <a href="#" class="btn-prev mr-1">
                            <img src="/img/arrow-l.svg" alt="{{ $utils->content('previous') }}" class="img-fluid">
                        </a>
                        <a href="#" class="btn-next">
                            <img src="/img/arrow-r.svg" alt="{{ $utils->content('next') }}" class="img-fluid">
                        </a>
                    </div>
                </div>
                {{--  Carousel  --}}
                <div class="row">
                    <div id="carouselNumbers" class="carousel slide col" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            {{-- item --}}
                            <div class="container carousel-item active">
                                <div class="row row-eq-height">
                                    <div class="col-12 col-xl pl-0 pr-0 pr-xl-2 mb-4 mb-xl-0">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_3', $page) !!}</div>
                                    </div>
                                    <div class="col pr-0 pl-0 pl-xl-2">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_5', $page) !!}</div>
                                    </div>
                                </div>
                            </div>
                            {{-- item --}}
                            <div class="container carousel-item">
                                <div class="row row-eq-height">
                                    <div class="col-12 col-xl pl-0 pr-0 pr-xl-2 mb-4 mb-xl-0">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_6', $page) !!}</div>
                                    </div>
                                    <div class="col pr-0 pl-0 pl-xl-2">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_7', $page) !!}</div>
                                    </div>
                                </div>
                            </div>
                            {{-- item --}}
                            <div class="container carousel-item">
                                <div class="row row-eq-height">
                                    <div class="col-12 col-xl pl-0 pr-0 pr-xl-2 mb-4 mb-xl-0">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_8', $page) !!}</div>
                                    </div>
                                    <div class="col pr-0 pl-0 pl-xl-2">
                                        <div class="numbers2__item h-100">{!! $utils->content('numbers_group_9', $page) !!}</div>
                                    </div>
                                </div>
                            </div>
                            {{-- item --}}
                            <div class="container carousel-item">
                                <div class="row row-eq-height">
                                    <div class="col-12 px-0">
                                        <div class="numbers2__item numbers2__item--single h-100">{!! $utils->content('numbers_group_10', $page) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Team  --}}
<div class="container">
    <div class="row">
        <div class="team col-space-both col">
            <div class="row">
                <div class="team__info col-12 offset-xl-1 col-xl-4">
                    <h2 class="team__title">{!! $utils->content('team_title', $page) !!}</h2>
                    <div class="team__text">
                        {!! $utils->content('team_text', $page) !!}
                    </div>
                </div>
                <div class="offset-xl-1 col team__image"></div>
            </div>
        </div>
    </div>
</div>
{{--  Safety  --}}
<div class="safety">
    <div class="container">
        <div class="row mb-3 mb-xl-5 pb-xl-5">
            <div class="col-space-left col-12 offset-xl-1 col-xl-6 mb-4 mb-xl-0">
                <h2 class="safety__title">{!! $utils->content('safety_title', $page) !!}</h2>        
            </div>
            <div class="offset-xl-1 col text-center text-xl-right">
                <img src="/img/pages/about/team2.jpg" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-7 safety__image"></div>
            <div class="offset-xl-1 col-xl-3">
                <p>{!! $utils->content('safety_text', $page) !!}</p>
                <div class="safety__certs">
                    <p>{!! $utils->content('safety_certs', $page) !!}</p>
                    <div class="d-flex justify-content-center justify-content-lg-start align-items-center mt-5">
                        {{-- <img src="/img/certs/sgs.svg" alt="SGS ISO 9001 System Certification" class="img-fluid"> --}}
                        {{-- <img src="/img/certs/brc.svg" alt="BRC FOOD certificated" class="img-fluid"> --}}
                        <div class="w-50 px-4">
                            <img src="/img/certs/brcgs.png" alt="BRCGS Food Safety Certificated" class="img-fluid">
                        </div>
                        <div class="w-50 px-4">
                            <img src="/img/certs/ifs-food.svg?v1" alt="International Featured Standards" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.btn-prev').click(function() {
        $('#carouselNumbers').carousel('prev');
        return false;
    });
    $('.btn-next').click(function() {
        $('#carouselNumbers').carousel('next');
        return false;
    });
</script>
@endsection