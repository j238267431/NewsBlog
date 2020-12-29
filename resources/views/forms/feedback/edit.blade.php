@extends('layouts.main')
@section('content')

    <div class = "col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <h3>Feedback form</h3>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <p>name:</p><br><input class="form-control" type="text" name="name" value="{{ old('name') }}">
            <p>feedback:</p><br><textarea class="form-control" name="feedback">{!! old('feedback') !!}</textarea><br>
            <p><button class="btn btn-success" type="submit">send</button></p>
        </form>
    </div>
@stop
