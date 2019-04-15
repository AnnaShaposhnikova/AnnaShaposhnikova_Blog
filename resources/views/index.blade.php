@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Home')



@section('content')



@endsection

@section('sidebar')


    <h1 class="h1">TAGS</h1>

    @foreach($tags as $tag)

    <h5><i class="{{$tag['class']}}"></i><button type="button" class="btn btn-light">{{$tag['name']}}</button></h5>

    @endforeach


@endsection

