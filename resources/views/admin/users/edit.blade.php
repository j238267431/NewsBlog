@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>Users</h3>
{{--            @dd($user)--}}
        <form action="{{ route('users.update', $user['id']) }}" method="POST">
            @method('PUT')
            @csrf
            <p>имя</p>
            <input class="form-control" type="text" name="userName" value="{{ $user['name'] }}">
            @error('name')
            @foreach($errors->get('name') as $error)
                <div class = "alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
            @enderror
            <p>администатор</p>
            <input class="form-control" type="text" name="is_admin" value="{{ $user['is_admin'] }}">
            <br>
            <p><button class="btn btn-success" type="submit">edit</button></p>
        </form>
    </div>
@stop

