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
                {{-- Renders arrows --}}
                <div class="w-100 position-relative d-none d-xl-block">
                    <h2 class="renders__name"></h2>
                    <a href="#" class="btn-prev">
                        <img src="/img/arrow-l.svg" alt="{{ $utils->content('previous') }}" class="img-fluid">
                    </a>
                    <a href="#" class="btn-next">
                        <img src="/img/arrow-r.svg" alt="{{ $utils->content('next') }}" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 3D renders --}}
<div class="container renders position-relative">
    <div class="row">
        <div class="col-space-logo col">
            @include('partials.product-renders', ['indicators' => true])
        </div>
    </div>
    <div class="container renders__text">
        <div class="row h-100">
            <div class="col-space-left col h-100 d-none d-xl-flex align-items-center">
                <p>{!! $utils->content('header_text', $page) !!}</p>
            </div>
        </div>
    </div>
</div>
{{-- Renders arrows (sm) --}}
<div class="container d-block d-xl-none">
    <div class="row">
        <div class="col col-space-left mb-5">
            <div class="renders__controls renders__controls--sm d-flex align-items-center justify-content-start mr-2">
                <a href="#" class="btn-prev mr-2">
                    <img src="/img/arrow-l.svg" alt="{{ $utils->content('previous') }}" class="img-fluid">
                </a>
                <a href="#" class="btn-next mr-4">
                    <img src="/img/arrow-r.svg" alt="{{ $utils->content('next') }}" class="img-fluid">
                </a>
                <h2 class="renders__name"></h2>
            </div>
        </div>
    </div>
</div>
{{-- Products vue app --}}
@include('partials.product-catalog')
@endsection