
@forelse($titleNews as $tNews)
    {{--    <div class="col-12 col-sm-6">--}}
    <div class="single-blog-post" data-slug="{{$tNews->slug}}" data-id="{{$tNews->id}}">
        <!-- Thumbnail -->
        <!-- Content -->

{{--            <p class="post-date">{{ $tNews->pubDate }} / life</p>--}}
            <a href="{{ route('categories.show.news', ['slug' => $tNews->slug,'id' => $tNews->id]) }}" class="">
                <p>{{ $tNews->title }}</p>
            </a>

    </div>
    {{--    </div>--}}
@empty
    {{'ничего не найдено'}}

@endforelse
{{--<span id="search">{{$titleNews->links()}}</span>--}}

