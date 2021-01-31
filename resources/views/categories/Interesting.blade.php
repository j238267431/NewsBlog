<div class="related-posts clearfix">
    <!-- Headline -->
    <h4 class="headline">Может быть интересно</h4>
    <div class="row">
    @forelse($interestingNews as $intNews)
        <!-- Single Blog Post -->
            <div class="col-12 col-lg-6">
                <div class="single-blog-post mb-50">
                    <div class="post-content">
                        <p class="post-date">{{$intNews->pubDate}} / yandex</p>
                        <a href="{{route('categories.show.news', ['slug' => $intNews->slug,'id' => $intNews->id])}}" class="post-title">
                            <h4>{{$intNews->title}}</h4>
                        </a>
{{--                        <p class="post-excerpt">{!!$intNews->description!!}</p>--}}
                    </div>
                </div>
            </div>
    @empty
        {{'новостей нет'}}
    @endforelse
    </div>
</div>

