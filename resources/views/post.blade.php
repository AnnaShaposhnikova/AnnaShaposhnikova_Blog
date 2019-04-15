@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Posts')



@section('content')
    <p> <a href="{{route('postCreate')}}" >Create New Post</a></p>
    <table border="1" >

        <thead>
        <tr>
            <th>№</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Text</th>
            <th>created_at</th>
            <th>updated_at</th>
            @foreach($posts as $post)
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$post->id}}</td>
            <td>{{$post->user->firstName.' '.$post->user->lastName}}</td>
            <td>{{$post->category->name}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->text}}</td>
        <td>{{$post->created_at}}</td>
        <td>{{$post->updated_at}}</td>
        <td><a href="{{route('postUpdate',[$post->id])}}">Edit</a></td>
        <td><a href="{{route('postDelite',[$post->id])}}">Delite</a></td>

        </tr>
        </tbody>
        @endforeach
    </table>


@endsection
@section('sidebar')
    @include('sidebar')
@endsection