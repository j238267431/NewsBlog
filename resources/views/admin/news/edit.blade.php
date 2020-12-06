@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>News add form</h3>
            <br>
            <img src=" {{ Storage::disk('uploads')->url($news['image']) }}" alt="">
            <br>
        <form action="{{ route('news.update', $news['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <p>заголовок</p>
            <input class="form-control" type="text" name="title" value="{{ $news['title'] }}">
            @error('title')
                @foreach($errors->get('title') as $error)
                    <div class = "alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @enderror
            <p>id категории</p>
            <input class="form-control" type="number" name="categoryId" value="{{ $news['categoryId'] }}">
            @error('categoryId')
            @foreach($errors->get('categoryId') as $error)
                <div class = "alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <p>id источника</p>
            <input class="form-control" type="number" name="resourceId" value="{{ $news['resourceId'] }}">
            @error('resourceId')
            @foreach($errors->get('resourceId') as $error)
                <div class = "alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <p>содержание</p><textarea class="form-control" name="description" id="editor">{!! $news['description'] !!}</textarea>
            @error('description')
            @foreach($errors->get('description') as $error)
                <div class = "alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <br>
            <p><button class="btn btn-success" type="submit">edit</button></p>
        </form>
    </div>
@stop
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush

