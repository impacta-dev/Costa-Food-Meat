<script type="text/javascript" charset="UTF-8" src="//cdn.cookie-script.com/s/2dcece28bf557cd56fae90acb2c5e7d5.js"></script>
<style>
    p {
        font-size: 1em;
    }

    h2 {
        margin-top: 2rem;
        color: #b9072b;
        font-family:EuclidFlexBold;
    }
    h3 {
        margin-top: 2rem;
    }
    th {
        background-color: #b9072b;
        color: #fff;
        font-family:EuclidFlexBold;
        padding: 1rem;
    }
    td {
        border: 1px solid #ccc;
        padding: 1rem;
    }
</style>
@php
    $content = App\Text::whereSlug(request('slug'))->first();
@endphp
@if ($content)
    {!! $content->content !!}
@endif