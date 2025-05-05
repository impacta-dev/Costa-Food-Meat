@extends('layouts.master')

@section('meta_title', 'Costa Food Meat · ' . $post->title)
@section('meta_description', strip_tags($post->excerpt))

@section('og_title', 'Costa Food Meat · ' . $post->title)
@section('og_description', strip_tags($post->excerpt))
@section('og_type', 'article')
@section('og_image', $post->main_image)

@section('tw_title', 'Costa Food Meat · ' . $post->title)
@section('tw_description', strip_tags($post->excerpt))
@section('tw_image', $post->main_image)

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
    {{-- Article title --}}
    <div class="container">
        <div class="row">
            <div class="col-space-logo-both">
                <div class="row">
                    <div class="col-12 col-xl">
                        <a href="{{ $utils->route_to_view('news') }}" target="_self" class="header__btn-back d-flex align-items-center">Volver</a>
                        <h2 class="header__subtitle">{{ $post->title }}</h2>
                    </div>
                    <div class="col header__image">
                        <img src="{{ $post->main_image }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl d-flex align-items-center">
                        <p class="header__date">{{ \Carbon\Carbon::createFromDate($post->published_at)->format('d/m/Y') }}</p>
                    </div>
                    <div class="offset-xl-4 col d-flex justify-content-start justify-content-xl-between align-items-center">
                        <span class="d-none d-xl-inline">>{!! $utils->content('share') !!}</span>
                        <div class="header__share d-flex justify-content-end">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social-button"><img src="/img/rrss/facebook.svg" alt="Compartir en Facebook" class="img-fluid"></a>
                            <a href="https://twitter.com/intent/tweet?text=Me ha gustado este artículo: {{ url()->current() }}&amp;url={{ url()->current() }}" class="social-button"><img src="/img/rrss/twitter.svg" alt="Compartir en Twitter" class="img-fluid"></a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url()->current() }}&amp;title=Me ha gustado este artículo&amp;summary={{ $post->title }}" class="social-button"><img src="/img/rrss/linkedin.svg" alt="Compartir en LinkedIn" class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Content  --}}
<div class="container content">
    <div class="row">
        <div class="col-space-logo-both">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col">
                    {!! $post->excerpt !!}
                    @foreach ($post->images->skip(1) as $image)
                        <img src="/img/posts/{{ $image->path }}" alt="" class="img-fluid">
                    @endforeach
                    {!! $post->text !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{--  Related posts  --}}
@if (count($related_posts))
    <div class="related">
        <div class="container">
            <div class="row">
                <div class="col-space-logo-both">
                    <div class="container">
                        <div class="row">
                            <div class="col pl-0">
                                <h2 class="related__title">{!! $utils->content('related_posts', $page) !!}:</h2>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($related_posts as $r_post)
                                @include('partials.news-item', ['post' => $r_post, 'show_date' => true])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection