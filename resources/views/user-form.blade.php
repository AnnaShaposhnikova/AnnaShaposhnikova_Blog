@extends('layouts.blog-without-sidebar')

@section('title', 'My blog - Users')



@section('content')
    @if(isset($user))
    <form action="{{route('userStore',$user->id)}}" method="post">

        @else
            <form action="{{route('userSave')}}" method="post">
    @endif
    @csrf

                <div class="form-group">
                    <label >First Name</label>
                    <input type="text" name="firstName" class="form-control"  value="{{old ('firstName', $user->firstName ?? '')}}">
                </div>
                @if ($errors->has('firstName'))
                    <ul>
                        @foreach($errors->get('firstName') as $error)
                            <li>{{$error}}</li>

                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                    <label >Last Name</label>
                    <input type="text" name="lastName" class="form-control"  value="{{old ('lastName', $users->lastName ?? '')}}">
                </div>

                @if ($errors->has('lastName'))
                    <ul>
                        @foreach($errors->get('lastName') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old ('email', $users->email ?? '')}}">
                   </div>
                @if ($errors->has('email'))
                    <ul>
                        @foreach($errors->get('email') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password" >
                </div>
                @if ($errors->has('password'))
                    <ul>
                        @foreach($errors->get('password') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" name="phone" class="form-control"  value="{{old ('phone', $users->phone ?? '')}}">
                </div>

                @if ($errors->has('phone'))
                    <ul>
                        @foreach($errors->get('phone') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group">
                    <label >Skype</label>
                    <input type="text" name="skype" class="form-control"  value="{{old ('lastName', $users->lastName ?? '')}}">
                </div>

                @if ($errors->has('skype'))
                    <ul>
                        @foreach($errors->get('skype') as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="form-group">
                @if(isset($user))
                    <input type="submit" value="Edit">
                @else
                    <input type="submit" value="Save">
                @endif
                </div>
            </form>

@endsection
