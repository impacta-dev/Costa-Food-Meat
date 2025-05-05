<div class="js-cookie-consent cookie-consent">

    <span class="cookie-consent__message">
        {!! $utils->content('cookies_message') !!}
    </span>

    {!! $utils->content('cookies_moreinfo') !!} <a data-fancybox data-type="ajax" data-src="/{{ app()->getLocale() }}/legal/cookies_policy" href="javascript:;">{!! $utils->content('cookies_policy') !!}</a>

    <button class="js-cookie-consent-agree cookie-consent__agree">
        {!! $utils->content('cookies_agree') !!}
    </button>

</div>
