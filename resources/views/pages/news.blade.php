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
</div>
{{-- filters --}}
<div class="container filters">
    <div class="row">
        <div class="col-space-logo-both">
            <span class="filters__title d-block d-lg-inline">{!! $utils->content('category_filter', $page) !!}:</span>
            @foreach ($categories as $category)
                @if (isset($current_category) && $category->id == $current_category->id)
                    <span class="filters__cat--active">{{ $category->name }}</span>
                @else
                    <a class="filters__cat" href="{{ $utils->route_to_view('news') }}/{{ $category->slug }}" target="_self">{{ $category->name }}</a>
                @endif
            @endforeach
            @if (isset($current_category))
                <a class="filters__cat" href="{{ $utils->route_to_view('news') }}" target="_self">{!! $utils->content('all_categories', $page) !!}</a>
            @else
                <span class="filters__cat--active">{!! $utils->content('all_categories', $page) !!}</span>
            @endif
        </div>
    </div>
</div>
{{--  news  --}}
<div class="news container">
    <div class="row">
        <div class="col-space-logo-both">
            <div class="row news__inner">
                @foreach ($posts as $post)
                    @include('partials.news-item', ['post' => $post, 'show_date' => true])
                @endforeach
            </div>
            {{-- pagination --}}
            <div class="row">
                <div class="col p-5">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection