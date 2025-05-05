@extends('layouts.master')
@section('content')

@php
$welfair_localized = 'img/certs/welfair_' . app()->getLocale() . '.svg';
$welfair_image = (File::exists(public_path($welfair_localized))) ? $welfair_localized : 'img/certs/welfair_es.svg';
@endphp

{{-- Header --}}
<div class="header">
    <div class="container">
        <div class="row">
            @include('partials.logo')
            <div class="col d-flex flex-row align-items-center">
                <h1 class="header__title">{!! $utils->content('header_title', $page) !!}</h1>
                <div class="header__line"></div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="d-none d-lg-block col-5 col-xl-6 p-0 header__image"></div>
            <div class="col d-flex flex-column align-items-start pl-0">
                <img src="/{{ $welfair_image }}" alt="Certificado AENOR" class="header__seal mb-2 mb-xl-5 mx-auto ml-lg-5">
                <h2 class="header__subtitle p-5">{!! $utils->content('header_subtitle', $page) !!}</h2>
            </div>
        </div>
    </div>
</div>
{{--  Intro  --}}
<div class="intro container">
    <div class="row">
        <div class="col-space-logo-both col">
            {{--  title  --}}
            <div class="row">
                <div class="col text-center">
                    <h2 class="intro__title mb-5">{!! $utils->content('intro_title', $page) !!}</h2>
                </div>
            </div>
            {{--  text  --}}
            {{--  <div class="row">
                <div class="col text-center mb-5">
                    <p>Todos nuestros productos cuentan con la <strong>certificación Welfair&trade;</strong> en Bienestar Animal certificada por <strong>AENOR</strong>, que está basada en los referenciales europeos <strong>Welfare Quality&copy;</strong> y <strong>AWIN&copy;</strong>, el principal referente europeo en materia de bienestar animal.</p>
                </div>
            </div>  --}}
            {{--  items  --}}
            <div class="row">
                <div class="col-6 col-xl mb-5 mb-xl-0 intro__item">
                    <div>
                        <img src="/img/pages/welfair/feeding.svg" alt="" class="img-fluid">
                    </div>
                    {!! $utils->content('intro_1', $page) !!}
                </div>
                <div class="col-6 col-xl mb-5 mb-xl-0 intro__item">
                    <div>
                        <img src="/img/pages/welfair/accommodation.svg" alt="" class="img-fluid">
                    </div>
                    {!! $utils->content('intro_2', $page) !!}
                </div>
                <div class="col-6 col-xl mb-5 mb-xl-0 intro__item">
                    <div>
                        <img src="/img/pages/welfair/health.svg" alt="" class="img-fluid">
                    </div>
                    {!! $utils->content('intro_3', $page) !!}
                </div>
                <div class="col-6 col-xl mb-5 mb-xl-0 intro__item">
                    <div>
                        <img src="/img/pages/welfair/behavior.svg" alt="" class="img-fluid">
                    </div>
                    {!! $utils->content('intro_4', $page) !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Info --}}
<div class="info">
    <div class="info__inner">
        <div class="d-flex justify-content-center align-items-center">
            <img src="/{{ $welfair_image }}" alt="Sello Welfair" class="img-fluid info__logo" style="width: 100px;">
            <img src="/img/certs/interporc.png" alt="Sello Interporc" class="img-fluid info__logo" style="width: 150px;">
        </div>
        {!! $utils->content('info_text', $page) !!}
    </div>
</div>
@endsection