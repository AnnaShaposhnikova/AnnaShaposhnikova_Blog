@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Tags')



@section('content')
    <p> <a href="{{route('tagCreate')}}" >Create New Tag</a></p>
    <table border="1" >

        <thead>
        <tr>
            <th>№</th>
            <th>Tag</th>
            <th>Class</th>
            <th>created_at</th>
            <th>updated_at</th>
            @foreach($tags as $tag)
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$tag->id}}</td>
        <td>{{$tag->name}}</td>
        <td>{{$tag->class}}</td>
        <td>{{$tag->created_at}}</td>
        <td>{{$tag->updated_at}}</td>
        <td><a href="{{route('tagUpdate',[$tag->id])}}">Edit</a></td>
        <td><a href="{{route('tagDelite',[$tag->id])}}">Delite</a></td>

        </tr>
        </tbody>
        @endforeach
    </table>


@endsection
@section('sidebar')
    @include('sidebar')
@endsection