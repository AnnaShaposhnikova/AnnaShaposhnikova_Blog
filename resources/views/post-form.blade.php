

@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Posts')



@section('content')

    {{--@if($errors->all())--}}
        {{--@foreach ($errors->all() as $error)--}}
            {{--<div>{{ $error }}</div>--}}
        {{--@endforeach--}}
    {{--@endif--}}


    @if(isset($post))
    <form action="{{route('postStore',$post->id)}}" method="post">

        @else
            <form action="{{route('postSave')}}" method="post">
    @endif
    @csrf
                <div class="form-group">
                    <label >Title</label>
                        <input type="text" name="title" class="form-control"  value="{{old ('title', $post->title ?? '')}}">
                </div>
                    @if ($errors->has('title'))
                        <ul>
                            @foreach($errors->get('title') as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" >Text</label>
                        <textarea class="form-control" name="text">{{old ('text',$post->text ?? '')}}</textarea>
                    </div>
                @if ($errors->has('text'))
                    <ul>
                        @foreach($errors->get('text') as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif


                <div class="form-group">
                    <label >Category</label>
                    <select class="form-control" name="category_id">

                    @foreach($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
                    </select>
                </div>

                    @if ($errors->has('category_id'))
                        <ul>
                            @foreach($errors->get('category_id') as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif
                <div class="form-group">
                    <label >Tags</label>
                    <div class="conteiner">
                        <div class="row">
                            @for($i=0; $i<3;$i++)
                            <div class="col-4">
                                <select  class="form-control"   name="tag_id[{{$i}}]">
                                    <option></option>
                                    @foreach($tags as $id=>$tag)

                                        <option {{(old("tag_id.{$i}", $post->tags[$i]->id ?? '') == $tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            @endfor

                        </div>
                    </div>
                </div>


                <div class="form-group">
                @if(isset($post))
                    <input type="submit" value="Edit">
                @else
                    <input type="submit" value="Save">
                @endif
                </div>
            </form>

@endsection

