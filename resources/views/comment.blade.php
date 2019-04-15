@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Comments')



@section('content')
    <p> <a href="{{route('commentCreate')}}" >Create New Comment</a></p>
    <table border="1" >

        <thead>
        <tr>
            <th>№</th>
            <th>Author</th>
            <th>Post title</th>
            <th>Comment</th>
            <th>created_at</th>
            <th>updated_at</th>
            @foreach($comments as $comment)
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>{{$comment->id}}</td>
            <td>{{$comment->user->firstName.' '.$comment->user->lastName}}</td>
            <td>{{$comment->post->title}}</td>
            <td>{{$comment->text}}</td>
        <td>{{$comment->created_at}}</td>
        <td>{{$comment->updated_at}}</td>
        <td><a href="{{route('commentUpdate',[$comment->id])}}">Edit</a></td>
        <td><a href="{{route('commentDelite',[$comment->id])}}">Delite</a></td>

        </tr>
        </tbody>
        @endforeach
    </table>


@endsection
@section('sidebar')
    @include('sidebar')
@endsection