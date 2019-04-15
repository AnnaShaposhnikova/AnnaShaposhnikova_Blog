@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Users')



@section('content')
    <p> <a href="{{route('userCreate')}}" >Create New User</a></p>
    <table class="table table-bordered table-sm table-responsive">
        <thead>
        <tr>
            <th>№</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th style="width: 200px">Email</th>

            <th>Skype</th>
            <th>Phone</th>
            <th>created_at</th>
            <th>updated_at</th>
            @foreach($users as $user)
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$user->id}}</td>
            <td>{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td >{{$user->email}}</td>

        <td>{{$user->skype}}</td>
            <td>{{$user->phone}}</td>
        <td>{{$user->created_at}}</td>
        <td>{{$user->updated_at}}</td>
        <td><a href="{{route('userUpdate',[$user->id])}}">Edit</a></td>
        <td><a href="{{route('userDelite',[$user->id])}}">Delite</a></td>

        </tr>
        </tbody>
        @endforeach
    </table>


@endsection
@section('sidebar')
    @include('sidebar')
@endsection