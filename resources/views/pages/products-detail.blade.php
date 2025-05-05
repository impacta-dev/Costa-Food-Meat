@extends('layouts.master')

@section('meta_title', 'Costa Food Meat · ' . $product->name)

@section('og_title', 'Costa Food Meat · ' . $product->name)
@section('og_image', '/img/products/' . $product->image)

@section('tw_title', 'Costa Food Meat · ' . $product->name)
@section('tw_image', '/img/products/' . $product->image)

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
</div>
{{-- Product sheet --}}
<div class="container product">
    <div class="row">
        <div class="col-space-logo-both col">
            {{--  Info  --}}
            <div class="row">
                <div class="col-12 col-lg p-4 d-flex justify-content-center align-items-center">
                    <div>
                        <a href="/img/products/{{ $product->image }}" data-fancybox="gallery" class="product__image">
                            <img src="/img/products/{{ $product->image }}" alt="" class="img-fluid">
                            <div class="product__image-zoom"></div>
                        </a>
                        <div class="product__thumbs d-flex justify-content-center">
                            @foreach ($product->images->skip(1)->take(3) as $image)
                                <a href="/img/products/{{ $image->path }}" data-fancybox="gallery">
                                    <div style="background-image: url('/img/products_sm/{{ $image->path }}')"></div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="offset-lg-1 col">
                    <h2 class="product__title">{{ $product->name }}</h2>
                    <p class="product__ref">{!! $utils->content('product_ref', $page) !!} {{ $product->ref }}</p>
                    <div class="row">
                        <div class="col">
                            <p class="product__label">{!! $utils->content('product_category', $page) !!}:</p>                    
                            <p class="product__feature">{{ $product->section->category->name }}</p>
                            <p class="product__label">{!! $utils->content('product_section', $page) !!}:</p>                    
                            <p class="product__feature">{{ $product->section->name }}</p>
                        </div>
                        <div class="col">
                            @if ($product->features)
                                <p class="product__label">{!! $utils->content('product_options', $page) !!}:</p>
                                @foreach ($product->features as $feature)
                                    <p class="product__feature">{{ $feature->name }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <button class="product__btn" type="button" data-toggle="collapse" data-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">{!! $utils->content('info_button', $page) !!}</button>
                </div>
            </div>
            {{--  Contact form  --}}
            <div class="row">
                <div class="col" id="contact">
                    <div class="{{ (count($errors) || session('message')) ? '' : 'collapse' }}" id="collapseForm">
                        <form action="{{ action('ProductContactController@send') }}#contact" method="POST" class="contact-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_ref" value="{{ $product->ref }}">
                                    <input type="hidden" name="product_url" value="{{ url()->current() }}">
                                    <label for="name">@lang('validation.attributes.name')*</label>
                                    <input type="text" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="email">@lang('validation.attributes.email')*</label>
                                    <input type="email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="phone">@lang('validation.attributes.phone')</label>
                                    <input type="text" name="phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="address">@lang('validation.attributes.address')</label>
                                    <input type="text" name="address" value="{{ old('address') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="cp">@lang('validation.attributes.postal_code')</label>
                                    <input type="text" name="cp" value="{{ old('cp') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="country">@lang('validation.attributes.country')</label>
                                    <input type="text" name="country" value="{{ old('country') }}">
                                </div>
                                <div class="col-12">
                                    <label for="message">@lang('validation.attributes.message')*</label>
                                    <textarea name="message" id="form-message" cols="30" rows="10" maxlength="2048" class="mb-4">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-5">
                                    <small>{!! $utils->content('form_legal_msg') !!}</small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="offset-xl-2 col">
                                    {!! NoCaptcha::renderJs(app()->getLocale()) !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <div class="col">
                                    <label for="form-legal" class="form-legal"><input type="checkbox" name="legal" id="form-legal" value="1"> {!! $utils->content('form_legal') !!}</label>
                                </div>
                                <div class="col">
                                    <input type="submit" value="{!! $utils->content('form_send') !!}" class="btn">
                                </div>
                            </div>
                            {{-- Errors --}}
                            @if (count($errors))
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            {{-- Success --}}
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Products vue app --}}
@include('partials.product-catalog')
@endsection