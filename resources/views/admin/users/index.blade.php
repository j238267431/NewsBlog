@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>Users list admin page</h3>
        @forelse($users as $user)
            <p>
                <a href="{{ route('users.edit', $user->id ) }}">
                    {{ $user->name }}</a> - статус
                @if($user->is_admin == 0)
                    {{ 'user' }}
                @else
                    {{ 'admin' }}
                @endif
                &nbsp; <a style="color: #ff0000" href="javascript:;" class="delete" rel="{{ $user->id }}" >удалить</a>

            </p>
        @empty
            <h3>пользователи отсутствуют</h3>
        @endforelse
        {{$users->links()}}
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
                    fetchData("{{ url('/admin/users') }}/" + this.getAttribute('rel'), {
                        method: "DELETE",
                        headers: {
                            'Content-type': 'application/json; charset=utf-8',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then((data)=>{
                        document.location.href = '/admin/users'
                    })

                })
            ))
        })
    </script>
@endpush
