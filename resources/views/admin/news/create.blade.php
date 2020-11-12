@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">

        <h3>News add form</h3>
        <form action="{{ route('news.store') }}" method="POST">
            @csrf
            <p>заголовок</p><input class="form-control" type="text" name="title" value="{{ old('title') }}">
            @error('title')
                @foreach($errors->get('title') as $error)
                    <div class="alert alert-danger">
                            {{ $error }}
                    </div>
                @endforeach
            @enderror
            <p>id категории</p><input class="form-control" type="number" name="categoryId" value="{{ old('categoryId') }}">
            @error('categoryId')
            @foreach($errors->get('categoryId') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <p>id источника</p>
            <input class="form-control" type="number" name="resourceId" value="{{ old('resourceId') }}">
            @error('resourceId')
            @foreach($errors->get('resourceId') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <p>содержание</p>
            <textarea class="form-control" name="description">{!! old('description') !!}</textarea>
            @error('description')
            @foreach($errors->get('description') as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <br>
            <p><button class="btn btn-success" type="submit">publish</button></p>
        </form>
    </div>
@stop
