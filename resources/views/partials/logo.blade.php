<div class="col-space-left col-6 col-md-3 col-xxl-2">
    <a href="/{{ app()->getLocale() }}" target="_self" class="header__logo">
        @if (isset($color) && $color == true)
            <img src="/img/logo.svg" alt="Costa Food Meat" class="img-fluid d-none d-xl-block">
        @else
            <img src="/img/logo-w.svg" alt="Costa Food Meat" class="img-fluid d-none d-xl-block">
        @endif
        <img src="/img/logo-sm.svg" alt="Costa Food Meat" class="img-fluid d-block d-xl-none">
    </a>
</div>