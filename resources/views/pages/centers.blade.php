@extends('layouts.master')
@section('content')
{{-- Header --}}
<div class="header">
    <div class="container">
        <div class="row">
            @include('partials.logo', ['color' => true])
            <div class="col d-flex flex-row align-items-center">
                <h1 class="header__title">{!! $utils->content('header_title', $page) !!}</h1>
                <div class="header__line"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-space-logo col">
                <div class="row">
                    <div class="col header__content">
                        <h2 class="header__subtitle">{!! $utils->content('header_subtitle', $page) !!}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Claim --}}
<div class="claim container">
    <div class="row">
        <div class="col-space-left col claim__inner">
            <div class="row">
                <div class="col-12 col-xl-7 claim__1">
                    <h2 class="claim__title">{!! $utils->content('claim_title', $page) !!}</h2>
                </div>
                <div class="col claim__2 p-2">
                    <div class="row h-100">
                        <div class="col d-flex align-items-center justify-content-center">
                            <img src="/img/certs/ES-1003924.svg" alt="Certificado ES 10.039224/B CE" class="img-fluid">
                        </div>
                        <div class="col d-flex align-items-center justify-content-center">
                            <img src="/img/certs/ES-1007986.svg" alt="Certificado ES 10.07986/B CE" class="img-fluid">
                        </div>
                        <div class="col d-flex align-items-center justify-content-center">
                            <img src="/img/certs/ES-10026735.svg" alt="Certificado ES 10.026735/B CE" class="img-fluid">
                        </div>
                        <div class="col d-flex align-items-center justify-content-center">
                            <img src="/img/certs/ES-10028323.svg" alt="Certificado ES 10.028323/HU CE" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Info --}}
<div class="info container">
    <div class="row">
        <div class="col-space-left col info__inner">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <h2 class="info__title">{!! $utils->content('info_title', $page) !!}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-7 pb-3 text-center">
                            <img src="/img/pages/centers/center1.jpg?v1" alt="" class="img-fluid info__image1">
                        </div>
                        <div class="col-12 col-xl-4 pl-xl-5 info__text d-flex flex-column justify-content-end">
                            {!! $utils->content('info_text', $page) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="info__render">
                                {{-- <model-viewer src="/img/3d-box/{{ app()->getLocale() }}/box.glb" ios-src="/img/3d-box/{{ app()->getLocale() }}/box.usdz" camera-orbit="calc(10deg - env(window-scroll-y) * 80deg) 60deg 100%" field-of-view="43deg" min-field-of-view="43deg" max-field-of-view="43deg" interaction-prompt="false" ar></model-viewer> --}}
                                <model-viewer src="/img/3d-box/{{ app()->getLocale() }}/box.glb?v1" ios-src="/img/3d-box/{{ app()->getLocale() }}/box.usdz?v1" camera-orbit="30deg 100%" field-of-view="50deg" min-field-of-view="50deg" max-field-of-view="50deg" preload auto-rotate camera-controls interaction-prompt="true" interaction-policy="allow-when-focused" ar></model-viewer>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <img src="/img/pages/centers/center2.jpg" alt="" class="img-fluid info__image2 mb-4 mb-xl-0 d-block mx-auto">
                    <img src="/img/pages/centers/center3.jpg" alt="" class="img-fluid info__image3 ml-xl-4 d-block mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Certificate --}}
@if(in_array(app()->getLocale(), ['es', 'ca']))
<div class="certificate">
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <h2 class="certificate__title">{!! $utils->content('certificate_text', $page) !!}</h2>
                <a href="/docs/feader.pdf?v1" target="_blank" class="certificate__btn">{!! $utils->content('certificate_button', $page) !!}</a>
            </div>
        </div>
    </div>
</div>
@endif
{{-- Transport --}}
<div class="transport pb-5 pb-xl-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-5 transport__info">
                <h2 class="transport__title">{!! $utils->content('transport_title', $page) !!}</h2>
                <p>{!! $utils->content('transport_text', $page) !!}</p>
            </div>
            <div class="col transport__video d-flex align-items-center justify-content-center pl-5">
                {{--  <a href="#" class="d-flex align-items-center justify-content-center">
                    <img src="/img/btn-play.svg" alt="" class="img-fluid">
                </a>  --}}
            </div>
        </div>
    </div>
</div>
@endsection