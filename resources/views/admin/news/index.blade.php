@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>News list admin page</h3>
            <a href="{{ route('news.create') }}"><p class="btn btn-success">добавить новость</p></a>
            @forelse($parsedNews as $pNews)
                <a href="">{{$pNews->title}}</a><p></p>
            @empty
                <h3>новостей нет</h3>
            @endforelse
            @forelse($news as $newsItem)
                <p>
                    <a href="{{ route('news.edit', $newsItem->id ) }}">
                        {{ $newsItem->title }}</a> - {{ $newsItem->updated_at->format('d.m (H:i)') }}
                        &nbsp; <a style="color: red" href="javascript:;" class="delete" rel="{{ $newsItem->id }}" >удалить</a>

                </p>
            @empty
                <h3>новостей нет</h3>
            @endforelse
        {{$news->links()}}
    </div>
@stop
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options)
                const body = await response;
                return body;
            }
            console.log(1)

                const button = document.querySelectorAll('.delete');
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
