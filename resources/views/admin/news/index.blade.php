
@extends('layouts.admin')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('categories')}}"><i class="fa fa-home"></i>Домой</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin') }}">{{ 'Админ панель' }}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.categories')}}">{{ 'Категории' }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$slug}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-content-area section-padding-0-100">
    <div id="admin" class = "col-8 offset-2">
        <div data-slug="{{$slug}}" class="blog-posts-area">
            <div id="all_news_wrap">
        <div class="single-post-details-area">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <h2>Страница редактирования новостей</h2>
{{--            <a href="{{ route('news.create') }}"><p class="btn btn-success">добавить новость</p></a>--}}
            <h3>Категории</h3>
            @forelse($news as $one)
                <p>
                    <a href="{{route('news.edit', ['news' => $one->id] )}}">{{$one->title}}</a>
                    <a style="color: red" href="{{route('admin.news.delete', ['news' => $one->id])}}">удалить</a>
                </p>
            @empty
                <h3>новостей нет</h3>
            @endforelse
                    {{$news->links()}}
        </div>
            </div>
        </div>
    </div>
    </section>
@stop
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options)
                const body = await response;
                return body;
            }
            const button = document.querySelectorAll('.reply');
            button.forEach(el => (
                el.addEventListener('click', function(){
                    fetchData("{{ url('/admin/news') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data)=>{
                        document.location.href = '/admin/news'
                    })

                })
            ))
        })
    </script>
@endpush
