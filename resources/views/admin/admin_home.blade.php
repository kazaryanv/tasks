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
    padding-top: 30px;
    padding-right: 30px;">
    <a class="btn btn-outline-danger" href="{{route('logout')}}">logout</a>
</div>
    <div style="display: flex;
    align-items: center;
    justify-content: center;">
        <h1>Welcome Administrator</h1>
    </div>
    <div style="width: 100%;
    height: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px;">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">surname</th>
                <th scope="col">email</th>
                <th scope="col">buttons</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $row)
                <tr>
                    <th scope="row">{{$row->id}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->surname}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        <form class="d-inline" action="{{ route('update', $row->id) }}" method="get">
                            @csrf
                            <input type="text" value="1" class="form-control" name="registerStatus" style="background: transparent;color: transparent;border: unset;display: none">
                            <button type="submit" class="btn btn-outline-primary">Edit</button>
                        </form>
                        <form class="d-inline" action="{{ route('destroy', $row->id) }}" method="get">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
