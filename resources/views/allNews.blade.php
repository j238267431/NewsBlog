
@foreach($titleNews as $tNews)
{{--    <div class="col-12 col-sm-6">--}}
        <div class="single-blog-post" data-slug="{{$tNews->slug}}" data-id="{{$tNews->id}}">
            <!-- Thumbnail -->
            <!-- Content -->
            <div class="post-content">
                <p class="post-date">{{ $tNews->pubDate }} / Yandex</p>
                <a href="{{ route('categories.show.news', ['slug' => $tNews->slug,'id' => $tNews->id]) }}" class="post-title">
                    <h4>{{ $tNews->title }}</h4>
                </a>
{{--                <p class="post-excerpt">{{ $tNews->description }}.</p>--}}
            </div>
        </div>
{{--    </div>--}}


@endforeach
{{$titleNews->links()}}
