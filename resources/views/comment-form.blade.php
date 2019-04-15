@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Comments')



@section('content')
    @if(isset($comment))
    <form action="{{route('commentStore',$comment->id)}}" method="post">

        @else
            <form action="{{route('commentSave')}}" method="post">
    @endif
    @csrf

                <div class="form-group">
                    <label >User_id</label>
                    <input type="text" name="user_id" class="form-control"  value="{{old ('user_id', $comment->user_id ?? '')}}">
                </div>
                @if ($errors->has('user_id'))
                    <ul>
                        @foreach($errors->get('user_id') as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif
                <div class="form-group">
                    <label >Post_id</label>
                    <input type="text" name="post_id" class="form-control"  value="{{old ('post_id', $comments->post_id ?? '')}}">
                </div>

                @if ($errors->has('post_id'))
                    <ul>
                        @foreach($errors->get('post_id') as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" >Text</label>
                        <textarea class="form-control" name="text">{{old ('text',$comment->text ?? '')}}</textarea>
                    </div>
                @if ($errors->has('text'))
                    <ul>
                        @foreach($errors->get('text') as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif








                <div class="form-group">
                @if(isset($comment))
                    <input type="submit" value="Edit">
                @else
                    <input type="submit" value="Save">
                @endif
                </div>
            </form>

@endsection
