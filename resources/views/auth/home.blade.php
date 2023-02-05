@extends('layouts.default')
@section('title')
    Home_Pages
@endsection
@section('content')
    <div style="width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: end;
    padding-right: 30px;">
        <a class="btn btn-outline-danger" href="{{route('logout')}}">logout</a>
    </div>
    <div style="display: flex;
    align-items: center;
    justify-content: center;">
        <h1>Welcome User</h1>
    </div>
@endsection
