@extends('layouts.master')
@section('content')
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
    <div class="container">
        <div class="row">
            <div class="col-space-logo col">
                <div class="row">
                    <div class="col header__content">
                        <div class="row">
                            <div class="col-12 col-xl-5">
                                <h2 class="header__subtitle mb-3">{!! $utils->content('header_subtitle', $page) !!}</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-xl-7 col">
                                {!! $utils->content('header_text', $page) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Steps  --}}
<div class="steps container">
    <div class="row">
        <div class="col-space-both col">
            <h2 class="steps__title mb-5">{!! $utils->content('steps_title', $page) !!}</h2>
        </div>
    </div>
    {{--  01  --}}
    <div class="row steps__step">
        <div class="col col-space-both">
            <div class="row">
                <div class="col steps__number">01</div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 steps__image" style="background-image: url('/img/pages/process/step1.jpg');"></div>
                <div class="col-12 col-lg steps__content p-0">
                    <div class="steps__subtitle">
                        <h2>{!! $utils->content('steps1_title', $page) !!}</h2>
                    </div>
                    <div class="steps__info">
                        <p>{!! $utils->content('steps1_text', $page) !!}</p>
                        <img src="/img/pages/process/agriculture.svg" alt="">
                        <img src="/img/pages/process/logo-piensos-costa.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  02  --}}
    <div class="row steps__step">
        <div class="col col-space-both">
            <div class="row">
                <div class="col steps__number">02</div>
            </div>
            <div class="row">
                <div class="col-12 col-lg steps__content p-0 order-2 order-lg-1">
                    <div class="steps__subtitle">
                        <h2>{!! $utils->content('steps2_title', $page) !!}</h2>
                    </div>
                    <div class="steps__info">
                        <p>{!! $utils->content('steps2_text', $page) !!}</p>
                        <img src="/img/pages/process/farms.svg" alt="">
                        <img src="/img/pages/process/logo-piensos-costa.svg" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-5 steps__image order-1 order-lg-2" style="background-image: url('/img/pages/process/step2.jpg');"></div>
            </div>
        </div>
    </div>
    {{--  03  --}}
    <div class="row steps__step">
        <div class="col col-space-both">
            <div class="row">
                <div class="col-12 col-lg steps__number">03</div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 steps__image" style="background-image: url('/img/pages/process/step3.jpg?v1');"></div>
                <div class="col-12 col-lg steps__content p-0">
                    <div class="steps__subtitle">
                        <h2>{!! $utils->content('steps3_title', $page) !!}</h2>
                    </div>
                    <div class="steps__info">
                        <p>{!! $utils->content('steps3_text', $page) !!}</p>
                        <img src="/img/pages/process/pig.svg" alt="">
                        <img src="/img/logo.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Traceability  --}}
<div class="traceability container">
    {{--  title  --}}
    <div class="row">
        <div class="col-space-left col">
            <h2 class="traceability__title">{!! $utils->content('traceability_title', $page) !!}</h2>
        </div>
    </div>
    {{--  content  --}}
    <div class="row">
        <div class="col-space-left col traceability__header mb-5">
            <div class="row">
                <div class="col-12 col-xl-4 pb-5 pb-xl-0">
                    {!! $utils->content('traceability_text', $page) !!}
                </div>
                <div class="offset-xl-2 col text-right d-flex justify-content-center justify-content-xl-start">
                    <img src="/img/certs/trazabilidad-piensos-compuestos.svg" alt="Certificado Trazabilidad Piensos Compuestos" class="img-fluid mr-5">
                    <img src="/img/certs/trazabilidad-sector-porcino.svg" alt="Certificado Trazabilidad Sector Porcino" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    {{--  more content  --}}
    <div class="row">
        <div class="col-space-left col">
            <div class="row">
                <div class="col-12 col-xl-4 mb-4">
                    {!! $utils->content('traceability_info', $page) !!}
                </div>
                <div class="col-12 offset-xl-2 col-xl-4">
                    <h2 class="traceability__claim">{!! $utils->content('traceability_claim', $page) !!}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection