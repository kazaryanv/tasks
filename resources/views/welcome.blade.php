@extends('layouts.default')
@section('title')
    Home_Pages
@endsection
@section('content')
    <div style="width: 1440px;display: flex;align-items: center;justify-content: flex-end;padding-top: 30px;padding-right: 30px">
        <a class="btn btn-outline-primary" style="margin-right: 20px" href="{{route('register-view')}}">Registration</a>
        <a class="btn btn-outline-success" href="{{route('login-view')}}">Log_in</a>
    </div>
@endsection
