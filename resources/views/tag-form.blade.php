@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Tags')



@section('content')
    @if(isset($tag))
    <form action="{{route('tagStore',$tag->id)}}" method="post">

        @else
            <form action="{{route('tagSave')}}" method="post">
    @endif
    @csrf
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control"  value="{{old ('name', $tag->name ?? '')}}">
                    </div>
                    @if ($errors->has('name'))
                        <ul>
                            @foreach($errors->get('name') as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Class</label>
                    <div class="col-sm-10">
                        <input type="text" name="class" class="form-control" value="{{old ('class',$tag->class ?? '')}}">
                    </div>
                    @if ($errors->has('class'))
                        <ul>
                            @foreach($errors->get('class') as $error)
                                <li>{{$error}}</li>

                            @endforeach
                        </ul>
                    @endif
                </div>
                @if(isset($tag))
                    <input type="submit" value="Edit">
                @else
                    <input type="submit" value="Save">
                @endif
            </form>



@endsection
