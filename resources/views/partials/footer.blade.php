<footer class="footer">
    <div class="container text-center text-lg-left">
        <div class="row">
            <div class="col-12 col-xxl-1 offset-xxl-1 text-center text-xxl-left">
                <img src="/img/logo-w.svg" alt="Costa Food Meat" class="footer__logo img-fluid d-none d-xxl-inline">
                <img src="/img/logo-w-sm.svg" alt="Costa Food Meat" class="footer__logo img-fluid d-inline d-xxl-none">
            </div>
            <div class="col-12 col-lg offset-xxl-1 col-xxl-2 footer__menu">
                <ul>
                    @foreach ($menu1_items as $item)
                        <li><a href="{{ $item->link }}" target="{{ $item->target ?? '_self' }}">{{ $item->title }}</a></li>
                    @endforeach
                </ul>
                <br><br>
                <strong>{!! $utils->content('footer_links') !!}</strong>
                <br>
                &gt;&nbsp;<a href="https://www.costafood.com" target="_blank">Costa Food Group</a>
            </div>
            {{--  <div class="col-12 col-lg offset-xxl-1 col-xxl-2 footer__info">  --}}
            <div class="col-12 col-lg offset-xxl-1 col-xxl-3 footer__info">
                <strong>{!! $utils->content('address_vic_title') !!}</strong><br>
                {!! $utils->content('address_vic') !!}<br>
                <strong>{!! $utils->content('address_gurb_title') !!}</strong><br>
                {!! $utils->content('address_gurb') !!}<br>
                <strong>{!! $utils->content('address_roda_title') !!}</strong><br>
                {!! $utils->content('address_roda') !!}<br>
                <strong>{!! $utils->content('address_litera_title') !!}</strong><br>
                {!! $utils->content('address_litera') !!}
                <br><br>
                {!! $utils->content('phone') !!}
                <br>
                <a href="mailto:info@costafoodmeat.com">info@costafoodmeat.com</a>
            </div>
            {{--  <div class="col-12 col-lg offset-xxl-1 col-xxl-2 footer__certs pb-5 pb-lg-2 pr-5 pr-xxl-2">  --}}
            <div class="col-12 col-lg col-xxl-2 footer__certs pb-5 pb-lg-2 pr-xxl-2">
                {{--  <p><strong>{!! $utils->content('footer_certificates') !!}</strong></p>  --}}
                {{--  <div class="d-flex justify-content-center justify-content-lg-start align-items-start">  --}}
                <div class="text-center">
                    <img src="/img/certs/ES-1007986.svg" alt="" class="img-fluid mb-3">
                    <img src="/img/certs/ES-1003924.svg" alt="" class="img-fluid mb-3">
                    <img src="/img/certs/ES-10026735.svg" alt="" class="img-fluid mb-3">
                    <img src="/img/certs/ES-10028323.svg" alt="" class="img-fluid">
                    {{--  <img src="/img/certs/sgs-w.svg" alt="SGS ISO 9001 System Certification" class="img-fluid">  --}}
                    {{--  <img src="/img/certs/brc.svg" alt="BRC FOOD certificated" class="img-fluid">
                    <img src="/img/certs/ifs.svg" alt="International Featured Standards" class="img-fluid">  --}}
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom p-3">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-xxl-1 col-lg-8 footer__legal mb-3">
                    <a data-fancybox data-type="ajax" data-src="/{{ app()->getLocale() }}/legal/legal_advice" href="javascript:;">{!! $utils->content('legal_advice') !!}</a> - 
                    <a data-fancybox data-type="ajax" data-src="/{{ app()->getLocale() }}/legal/privacy_policy" href="javascript:;">{!! $utils->content('privacy_policy') !!}</a> - 
                    <a data-fancybox data-type="ajax" data-src="/{{ app()->getLocale() }}/legal/cookies_policy" href="javascript:;">{!! $utils->content('cookies_policy') !!}</a> -
                    <a href="javascript:CookieScript.instance.show();">{{ __('costa.manage_cookies') }}</a> - 
                    <a data-fancybox data-type="ajax" data-src="/{{ app()->getLocale() }}/legal/complaints_channel" href="javascript:;">{!! $utils->content('complaints_channel') !!}</a>
                </div>
                <div class="col footer__copy">
                    Costa Food Meat&copy {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>
</footer>