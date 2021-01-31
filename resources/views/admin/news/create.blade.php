@extends('layouts.admin')
@section('content')
    <div class = "col-8 offset-2">

        <h3>News add form</h3>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <p>image</p>
            <input type="file" class="form-control" name="image">
            <p>содержание</p>
            <textarea class="form-control" name="description" id="editor">{!! old('description') !!}</textarea>
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
@push('js')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        // var CSRFToken = $('meta[name="csrf-token"]').attr('content');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('editor', options);
    </script>
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>--}}
{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create( document.querySelector( '#editor' ) )--}}
{{--            .catch( error => {--}}
{{--                console.error( error );--}}
{{--            } );--}}
{{--    </script>--}}
@endpush
