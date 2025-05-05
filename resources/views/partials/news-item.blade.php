<a href="{{ $utils->route_to_view('news') }}/{{ $post->slug }}" target="_self" class="col-12 col-md-6 col-xl-4 news-item {{ $post->featured ? 'news-item--featured' : '' }}">
    <div class="news-item__image" style="background-image: url('{{ $post->main_image }}');"></div>
    <div class="position-relative">
        @if ($post->category)
            <h3 class="news-item__category">{{ $post->category->name }}</h3>
        @endif
        <h2 class="news-item__title">{{ $post->title }}</h2>
        @if (isset($show_date) && $show_date === true)
            <p class="news-item__date">{{ \Carbon\Carbon::createFromDate($post->published_at)->format('d/m/Y') }}</p>
        @endif
    </div>
</a>