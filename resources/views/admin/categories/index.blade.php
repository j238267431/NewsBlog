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
                            <li class="breadcrumb-item active" aria-current="page">Категории</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<section class="blog-content-area section-padding-0-100">
    <div class = "col-8 offset-2">
        <div class="single-post-details-area">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h2>Страница редактирования новостей</h2>
            <h3>Категории</h3>
            @forelse($categories as $category)
                <p><a href="{{route('admin.news', ['slug'=>$category->name])}}">{{$category->name}}</a></p>
            @empty
                <h3>новостей нет</h3>
            @endforelse
        </div>
    </div>
</section>
@stop
