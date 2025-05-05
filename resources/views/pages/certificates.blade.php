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
            <div class="header__text col-12 col-xl-4 pl-xl-5 pb-4 mt-5">
                {!! $utils->content('header_text', $page) !!}
            </div>
        </div>
    </div>
</div>

{{--  Certificates  --}}
<div class="container certificates">
    {{-- Certificate --}}
    @foreach ($types as $type)
        <div class="row mb-3 mb-xl-5">
            <div class="col-12">
                <h4 class="certificates__title">{!! $utils->content(mb_strtolower($type).'_title', $page) !!}</h4>
                <p class="certificates__text">{!! $utils->content(mb_strtolower($type).'_text', $page) !!}</p>

                <div class="row">
                    @foreach ($certificates->filter(function ($value, $key) use($type) { return $value->type===$type; }) as $certificate)
                        <div class="certificate col-md-4">
                            <a href="/docs/certificates/{!! $certificate->pdf !!}" target="_blank"><img src="/img/certificates/{!! $certificate->image !!}" alt="{{ strip_tags($certificate->name) }}" class="certificate__image d-block img-fluid mx-auto"></a>
                            <a href="/docs/certificates/{!! $certificate->pdf !!}" target="_blank" class="certificate__name">{!! $certificate->name !!}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

{{-- @section('js')
<script>
</script>
@endsection --}}