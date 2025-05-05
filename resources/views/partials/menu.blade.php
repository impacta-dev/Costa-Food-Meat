{{--  Backdrop  --}}
<div class="menu1-backdrop"></div>
{{--  Content  --}}
<div class="menu1-content">
    <div>
        {{--  Langs  --}}
        <div class="dropdown menu1-content__langs">
            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ \App\Lang::find(app()->getLocale())->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach ($langs as $lang)
                    @if ($lang->id == app()->getLocale())
                        @continue
                    @endif
                    <a class="dropdown-item" href="/{{ $lang->id }}" target="_self">{{ $lang->name }}</a>
                @endforeach
            </div>
        </div>
        {{--  Pages  --}}
        <ul class="menu1-content__pages">
            @foreach ($menu1_items as $item)
                <li><a href="{{ $item->link }}" target="{{ $item->target ?? '_self' }}" class="{{ $page->slug === $item->page->slug ? 'active' : '' }}">{{ $item->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
{{--  Sidebar (desktop) --}}
<div class="menu1-bar1"></div>
<div class="menu1-bar2"></div>
<a href="#" class="menu1-sidebar js-open-menu1">
    <div class="menu1-sidebar__wrap">
        <div class="menu1-sidebar__title">{!! $utils->content('menu') !!}</div>
        <div class="menu1-button">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</a>
{{--  Button (mobile)  --}}
<a href="#" class="menu1-button menu1-button--sm js-open-menu1">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</a>
{{--  Langs (over the bar)  --}}
<div class="dropdown menu1-langs">
    <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownLangLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ \App\Lang::find(app()->getLocale())->id }}
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLangLink">
        @foreach ($langs as $lang)
            @if ($lang->id == app()->getLocale())
                @continue
            @endif
            <a class="dropdown-item" href="/{{ $lang->id }}" target="_self">{{ $lang->name }}</a>
        @endforeach
    </div>
</div>