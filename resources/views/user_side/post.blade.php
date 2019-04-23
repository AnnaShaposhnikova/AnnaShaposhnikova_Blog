@extends('layouts.blog-without-sidebar')

@section('title', 'My blog-Post')
<div class="container">
    @include('user_side.navigation',['activeNav'=>'posts'])
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
                'active'=>false,
                'route'=>'userPosts'
             ],
                          [
                'name'=>$post->title,
                'active'=>true,
                'route'=>'userPost'
             ]



        ]
    ])
</div>
@section('content')
    {{--@foreach($posts as $post)--}}
    <div class="card mt-3 mb-3" style="width: auto;" >
        <h1 class="card-header">{{$post->title}}</h1>
        <div class="card-body">
            <div class="card-subtitle">
                <p>Category:{{$post->category->name}}</p>
                <p>Tags:</p>
                @foreach($post->tags as $tag)
                    {{$tag->name}}
                @endforeach
            </div>
            <img  src="{{$post->cover}}" class="card-img-top" alt="...">
            <p class="card-text">
               {{$post->text}}
            </p>
        </div>
        <div class="card-footer">


            <span class="float-right">
                        <i class="fas fa-comment"></i> <span class="badge badge-secondary">123</span>
                        <i class="fas fa-star"></i> <span class="badge badge-secondary">123</span>
                        <i class="fas fa-heart"></i> <span class="badge badge-secondary">123</span>
                    </span>
        </div>
    </div>
    {{--@endforeach--}}
@endsection


