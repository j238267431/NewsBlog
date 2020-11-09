@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
{{--        @dd($news)--}}
        <h3>News add form</h3>
        <form action="{{ route('news.update', $news['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <p>заголовок</p>
            <input class="form-control" type="text" name="title" value="{{ $news['title'] }}">
            <p>id категории</p>
            <input class="form-control" type="number" name="categoryId" value="{{ $news['categoryId'] }}">
            <p>id источника</p>
            <input class="form-control" type="number" name="resourceId" value="{{ $news['resourceId'] }}">
            <p>содержание</p><textarea class="form-control" name="description">{!! $news['description'] !!}</textarea>
            <br>
            <p><button class="btn btn-success" type="submit">edit</button></p>
        </form>
    </div>
@stop

