@extends('layouts.default')
@section('title')
    Home_Pages
@endsection
@section('content')

    <div style="width: 1440px;display: flex;align-items: center;justify-content: space-between;padding-top: 30px;padding-right: 30px">
        <h1>Register</h1>
        <a class="btn btn-outline-success" href="{{route('login-view')}}">Log_in</a>
    </div>
    <div style="width: 100%;height: auto;display: flex;align-items: center;justify-content: center;">
        <form action="{{route('register')}}"  method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">User name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="John">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">User surname</label>
                <input name="surname" type="text" class="form-control" id="surname" placeholder="Smith">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">User email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">User password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="1234">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('dashboard')}}">Back</a>
        </form>
    </div>
@endsection
