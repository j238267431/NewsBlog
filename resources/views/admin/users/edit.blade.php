@extends('layouts.main')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('categories') }}"><i class="fa fa-home"></i> Домой</a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/users')}}"><i class="fa fa-home"></i> Пользователи</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ 'Страница редактирования пользлователя ' }}{{$user['name']}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="single-post-details-area">
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
         <p>имя {{$user['name']}}</p>
            @error('name')
            @foreach($errors->get('name') as $error)
                <div class = "alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror

            <div style="" class="material-switch pull-left">
                <p>Изменить статус пользоваиеля</p>
                @if(Auth::id()==$user['id'])
                    <span class="alert alert-danger">{{'Вы не можете менять статус администратор у самого себя'}}</span>
                @else
                <input @if($user['is_admin']){{'checked'}}@endif onclick="adminStatusChange()" id="someSwitchOptionDefault" name="is_admin" type="checkbox"/>
                <label for="someSwitchOptionDefault" class="label-default"></label>
                <span id="is-admin">@if($user['is_admin']){{'админ'}}@else{{'пользователь'}}@endif</span>
                @endif
            </div>
    </div>
    </div>
        </div>
    </section>
@stop

@push('js')
    <script>
        function adminStatusChange()
        {
            let isAdmin = 0
            let text = 'пользватель'
            if(event.target.checked){
                isAdmin = 1
                text = 'админ'
            }
            $.ajax({
                url: '{{route('users.update', ['user' => $user['id']])}}',
                method: 'PATCH',
                data: {is_admin:isAdmin},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (data){
                    $('#is-admin').text(text)
                },
                error: function (msg){
                    console.log(msg)
                }
            })


        }
    </script>
@endpush
