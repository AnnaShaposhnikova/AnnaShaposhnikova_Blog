@extends('layouts.blog-sign')

@section('title', 'My blog - Sign in')

<div class="container">
    @include('user_side.navigation',['activeNav'=>'sign_in'])
</div>
<div class="container mt-3 mb-3">
    @include('user_side.breadcrumb',
    [
        'breadcrumbs'=>[
            [
                'name'=>'Home',
                'active'=>false,
                'route'=>'home'
             ],
             [
                'name'=>'Sign in',
                'active'=>true,
                'route'=>'sign_in'
             ],

        ]
    ])
</div>
@section('content')
    <div class="card" >
        <h1 class="card-header text-center">Sign in</h1>
        <div class="card-body">
            <div class="alert alert-danger rounded-pill" role="alert">
                Some error during Sign Up
            </div>
            <form class="needs-validation was-validated " novalidate>
                <div class="form-group">
                    <label for="validationCustom03">Enter email</label>
                    <input type="text" class="form-control" id="validationCustom03" placeholder="Enter email" required>
                    <div class="invalid-feedback">
                        Please provide a valid email.
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="validationCustom04">Password</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                </div>
                <div class="form-group">

                        <span class="float-left mt-3 mb-3">
                <button class="btn btn-primary" type="submit">Sign in</button>
                        </span>

                    <span class="float-right">
                        <a href="#" class="btn btn-link">Forgot password?</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
@endsection
