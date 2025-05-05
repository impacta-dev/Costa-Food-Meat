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
{{-- Subtitle --}}
<div class="container">
    <div class="row">
        <div class="col-space-left col">
            <div class="row">
                <div class="col-12 offset-xl-5 col-xl-6">
                    <h2 class="header__subtitle">{!! $utils->content('header_subtitle', $page) !!}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Content --}}
<div class="content container">
    <div class="row">
        <div class="col-space-left col">
            <div class="row">
                <div class="col-12 col-xl-5">
                    {{-- Address 1 --}}
                    <div class="row mb-5">
                        <div class="col-12 col-md-5 text-center text-md-right mb-3">
                            <img src="/img/pages/contact/vic.jpg?v1" alt="Costa Food Vic" class="img-fluid">
                        </div>
                        <div class="col text-center text-md-left">
                            <strong>{!! $utils->content('address_vic_title') !!}</strong><br>
                            {!! $utils->content('address_vic') !!}
                        </div>
                    </div>
                    {{-- Address 2 --}}
                    <div class="row mb-5">
                        <div class="col-12 col-md-5 text-center text-md-right mb-3">
                            <img src="/img/pages/contact/gurb.jpg?v1" alt="Costa Food Gurb" class="img-fluid">
                        </div>
                        <div class="col text-center text-md-left">
                            <strong>{!! $utils->content('address_gurb_title') !!}</strong><br>
                            {!! $utils->content('address_gurb') !!}
                        </div>
                    </div>
                    {{-- Address 3 --}}
                    <div class="row mb-5">
                        <div class="col-12 col-md-5 text-center text-md-right mb-3">
                            <img src="/img/pages/contact/roda.jpg?v1" alt="Costa Food Roda de Ter" class="img-fluid">
                        </div>
                        <div class="col text-center text-md-left pr-xl-5">
                            <strong>{!! $utils->content('address_roda_title') !!}</strong><br>
                            {!! $utils->content('address_roda') !!}
                        </div>
                    </div>
                    {{-- Address 4 --}}
                    <div class="row mb-5">
                        <div class="col-12 col-md-5 text-center text-md-right mb-3">
                            <img src="/img/pages/contact/litera.jpg?v1" alt="Cárnicas de la Litera" class="img-fluid">
                        </div>
                        <div class="col text-center text-md-left pr-xl-5">
                            <strong>{!! $utils->content('address_litera_title') !!}</strong><br>
                            {!! $utils->content('address_litera') !!}
                        </div>
                    </div>
                    {{-- +info --}}
                    <div class="row">
                        <div class="col-12 offset-xl-5 col-xl mb-5 text-center text-xl-left">
                            <p>{!! $utils->content('phone') !!}</p>
                            <p><a href="mailto:info@costafoodmeat.com">info@costafoodmeat.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6" id="contact">
                    {{-- form --}}
                    <form action="{{ action('ContactController@send') }}#contact" method="POST" class="contact-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md">
                                <input type="text" placeholder="@lang('validation.attributes.name')*" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="col">
                                <input type="text" placeholder="@lang('validation.attributes.email')*" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" placeholder="@lang('validation.attributes.subject')*" name="subject" value="{{ old('subject') }}">
                                <textarea name="message" id="form-message" cols="30" rows="10" placeholder="@lang('validation.attributes.message')*" maxlength="2048">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col pb-4">
                                <small>{!! $utils->content('form_legal_msg') !!}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md mb-2">
                                {!! NoCaptcha::renderJs(app()->getLocale()) !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="col-12 col-md mb-2">
                                <label for="form-legal"><input type="checkbox" name="legal" id="form-legal" value="1"> {!! $utils->content('form_legal') !!}</label>
                            </div>
                            <div class="col-12 col-md mb-2">
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
{{-- Map --}}
<div class="map">
    <iframe src="https://snazzymaps.com/embed/229762" width="100%" height="570px" style="border:none;" class="d-none d-lg-block"></iframe>
    <iframe src="https://snazzymaps.com/embed/233512" width="100%" height="300px" style="border:none;" class="d-block d-lg-none"></iframe>
</div>
@endsection