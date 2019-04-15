@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Create Categories')


@section('content')

    @if(isset($category))
        <form action="{{route('categoryStore',$category->id)}}" method="post">

            @else
                <form action="{{route('categorySave')}}" method="post">
                    @endif
                    @csrf

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control"  value="{{old ('name', $category->name ?? '')}}">
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
                        <label for="inputPassword" class="col-sm-2 col-form-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control" value="{{old ('slug',$category->slug ?? '')}}">
                        </div>
                        @if ($errors->has('slug'))
                            <ul>
                                @foreach($errors->get('slug') as $error)
                                    <li>{{$error}}</li>

                                @endforeach
                            </ul>
                        @endif
                    </div>
                    @if(isset($category))
                    <input type="submit" value="Edit">
                    @else
                        <input type="submit" value="Save">
                    @endif
                </form>


@endsection



