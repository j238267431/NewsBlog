@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        <h3>Profile</h3>
        <form action="{{ route('profile.update', $profile->id) }}" method="POST">
            @method('PUT')
            @csrf
            <p>дата рождения:</p>
            <input class="form-control" type="date" max="{{ $today }}" name="day_of_birth" value="{{ $profile->day_of_birth }}">
            <br>
            <p>загрузить фото:</p><input class="" type="file" name="image" value="{{ $profile->image }}">
            <p><button class="btn btn-success" type="submit">сохранить изменения</button></p>
        </form>
    </div>

@stop
