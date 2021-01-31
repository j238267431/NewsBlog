@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        <h3>Profile</h3>
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @csrf
            <p>дата рождения:</p>
            <input class="form-control" type="date" name="day_of_birth" value="{{ old('day_of_birth') }}">
            <br>
            <p>загрузить фото:</p><input class="" type="file" name="image" value="{{ old('image') }}">
            <p><button class="btn btn-success" type="submit">создать</button></p>
        </form>
    </div>

@stop
