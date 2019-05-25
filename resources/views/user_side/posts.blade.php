@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Posts')
<div class="container">
    @include('user_side.navigation')
</div>
<div class="container mt-3 mb-3">
    @include('user_side.breadcrumb',[
        'breadcrumbs'=>[
            [
                'name'=>'Home',
                'active'=>false,
                'route'=>'home'
             ],
             [
                'name'=>'Posts',
                'active'=>true,
                'route'=>'userPosts'
             ],



        ]
    ])
</div>
@section('content')
    @foreach($posts as $post)

        <div class="card mt-3 mb-3" style="width: auto;" >
            <h1 class="card-header">{{$post->title}}</h1>
            <h4 class="card-header">{{$post->title}}at{{$post->created_at}}</h4>
            <h5 class="card-header">Author:{{$post->user->firstName.' '.$post->user->lastName}}</h5>
            <div class="card-body">
                <div class="card-subtitle">
                    <p>Category:{{$post->category->name}}</p>
                    <p>Tags: </p>
                    @foreach($post->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </div>

                <p class="card-text">
                    {{$post->description}}
                </p>
            </div>
            <div class="card-footer">
                    <span class="float-left">
                        <a href="{{route('userPost',['id'=> $post->id])}}" class="btn btn-link">Read more...</a>
                    </span>

                <span class="float-right">

                    </span>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
@endsection


