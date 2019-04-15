@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Categories')



@section('content')

    <p> <a href="{{route('categoryCreate')}}" >Create New Category</a></p>

<table border="1" >

    <thead>
    <tr>
        <th>№</th>
        <th>Category</th>
        <th>Slug</th>
        <th>created_at</th>
        <th>updated_at</th>

    </tr>
    @foreach($categories as $category)
    </thead>
    <tbody>
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->slug}}</td>
        <td>{{$category->created_at}}</td>
        <td>{{$category->updated_at}}</td>
        <td><a href="{{route('categoryUpdate',[$category->id])}}">Edit</a></td>
        <td><a href="{{route('categoryDelite',[$category->id])}}">Delite</a></td>
    </tr>
    </tbody>
        @endforeach
</table>

@endsection
@section('sidebar')
    @include('sidebar')
@endsection


