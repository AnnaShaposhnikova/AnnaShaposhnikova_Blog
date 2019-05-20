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
                        <i class="fas fa-comment"></i> <span class="badge badge-secondary">{{$sumComment}}</span>

                        <a href="{{route('userImpressionSave',['id'=>$post->id])}}"  class="fas fa-heart" ></a> <span class="badge badge-secondary">{{$sumImpression}}</span>
                    </span>
        </div>
    </div>
    <div>

        <form action ="{{route('userCommentSave')}}" method="post" >
            @csrf


                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach


            <input type="hidden" name ="post_id" value={{$post->id}}>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" name="text" rows="3">{{old ('text'??'Add a comment')}}</textarea>
            </div>

            <button type="submit" class="btn btn-secondary">Comment</button>
        </form>
        <ul>
            @foreach($comments as $comment)

                <li>

                    User:{{$comment->user->firstName.' '. $comment->user->lastName}}
                    {{$comment->created_at}}
                    <p>
                        {{$comment->text}}
                    </p>

                </li>
            @endforeach
        </ul>
        {{--comment--}}

    </div>
    {{--@endforeach--}}
@endsection


