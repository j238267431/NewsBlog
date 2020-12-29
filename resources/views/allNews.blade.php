@foreach($titleNews as $tNews)
{{--    <div class="col-12 col-sm-6">--}}
        <div class="single-blog-post mb-50">
            <!-- Thumbnail -->
            <div class="post-thumbnail">
                <a href="{{ route('categories.show', ['slug' => $tNews->id],) }}">
                    <img src="{{asset('img/blog-img/'.$tNews->id.'.jpg')}}" alt="">
                </a>
            </div>
            <!-- Content -->
            <div class="post-content">
                <p class="post-date">MAY 10, 2018 / life</p>
                <a href="{{ route('categories.show', ['slug' => $tNews->id]) }}" class="post-title">
                    <h4>{{ $tNews->title }}</h4>
                </a>
                <p class="post-excerpt">{{ $tNews->description }}.</p>
            </div>
        </div>
{{--    </div>--}}


@endforeach
{{$titleNews->links()}}
