@extends('layouts.main')
@section('content')
    {{ session('message') }}
    <div class = "col-8 offset-2">
        <h3>Request to data downloading</h3>
        <form action="{{ route('request.store') }}" method="POST">
            @csrf
            <p>Name</p>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
            <p>Phone</p>
            <input class="form-control" type="text" name="phone" vaue="{{ old('phone') }}">
            <p>email</p>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            <p>your request to data downloading</p>
            <input class="form-control" type="text" name="request" value="{{ old('request') }}">
            <br>
            <button class="btn btn-success" type="submit">send</button>
        </form>
    </div>
@stop
