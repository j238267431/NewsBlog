@extends('layouts.main')
@section('content')
    <div class = "col-8 offset-2">
        <h3>Feedback form</h3>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <p>name:</p><br><input class="form-control" type="text" name="name" value="{{ old('name') }}">
            <p>feedback:</p><br><textarea class="form-control" name="feedback">{!! old('feedback') !!}</textarea><br>
            <p><button class="btn btn-success" type="submit">send</button></p>
        </form>
    </div>
@stop
