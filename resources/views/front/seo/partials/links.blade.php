@if(($items ?? collect())->count())
    <div class="seo-linkblock">
        <h3 class="seo-linkblock-title">{{ $title }}</h3>
        <ul class="seo-linkblock-list">
            @foreach($items as $item)
                <li>
                    <a href="{{ url('/' . ltrim($item->url_path, '/')) }}">{{ $item->h1 }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
