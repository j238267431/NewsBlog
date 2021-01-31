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
                            <li class="breadcrumb-item"><a href="{{route('admin.news', ['slug' => $slug])}}">{{ $slug }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Изменение новости</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
    <div class = "col-8 offset-2">
        <div class="single-post-details-area">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>Форма редактирования новости</h3>
            <br>
            <img src=" {{ Storage::disk('uploads')->url($news['image']) }}" alt="">
            <br>
        <form action="{{ route('news.update', ['news' => $id ]) }}" method="POST">
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
            <p>категория</p>
            <input class="form-control" type="text" name="categoryId" value="{{ $news->slug }}">
            @error('categoryId')
            @foreach($errors->get('categoryId') as $error)
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

            <div class="col-12">
                <button class="btn btn-success" type="submit">сохранить изменения</button>
                <button onclick="deleteNews({{$news->id}})" class="btn btn-danger">удалить</button>
            </div>
        </form>
    </div>
    </div>
        </div>
    </section>
@stop
@push('js')
    <script>
        function deleteNews(newsId)
        {
            event.preventDefault()
            $.ajax({
                url:'{{ route('admin.news.delete', ['news' => $news]) }}',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                data:{news:newsId},
                success: function (){
                    document.location.href="/admin/news/{{$news['slug']}}";
                },
                error: function (msg){

                }
            })
        }

    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush

