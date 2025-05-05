{{-- Cookies consent --}}
<script src="/js/ihavecookies.js"></script>
<script>
  var cookiesOptions = {
    title: "",
    message: '{!! addslashes($utils->content('cookies_message')) !!}',
    moreInfoLabel: "",
    link: "",
    delay: 0,
    expires: 365,
    acceptBtnLabel: "{{ $utils->content('cookies_agree') }}",
    advancedBtnLabel: "{{ $utils->content('cookies_customize') }}",
    cookieTypesTitle: "{{ $utils->content('cookies_select') }}",
    fixedCookieTypeLabel: "{{ $utils->content('cookies_required_cookies') }}",
    fixedCookieTypeDesc: "",
    cookieTypes: [
        {
            type: "{{ $utils->content('cookies_analytics_cookies') }}",
            value: "analytics",
            description: ""
        }
    ],
    onAccept: function() {
      if (window.location.hash == '#cookie-control') {
        window.location.href = '{{ config('app.url') }}';
      } else {
        location.reload();
      }
    }
}
$('body').ihavecookies(cookiesOptions);

if (window.location.hash == '#cookie-control') {
  $('body').ihavecookies(cookiesOptions, 'reinit');
}
</script>