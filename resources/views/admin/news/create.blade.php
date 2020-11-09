@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>News add form</h3>
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <p>заголовок</p><input class="form-control" type="text" name="title" value="{{ old('title') }}">
            <p>id категории</p><input class="form-control" type="number" name="categoryId" value="{{ old('categoryId') }}">
            <p>id источника</p><input class="form-control" type="number" name="resourceId" value="{{ old('resourceId') }}">
            <p>содержание</p><textarea class="form-control" name="description">{!! old('description') !!}</textarea>
            <br>
            <p><button class="btn btn-success" type="submit">publish</button></p>
        </form>
    </div>
@stop
