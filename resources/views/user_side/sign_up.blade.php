
@extends('layouts.blog-sign')

@section('title', 'My blog - Sign up')
<div class="container">
    @include('user_side.navigation',['activeNav'=>'sign_up'])
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
                'name'=>'Sign up',
                'active'=>true,
                'route'=>'sign_up'
             ],

        ]
    ])

@section('content')
    <div class="card" >
        <h1 class="card-header text-center">Sign up</h1>
        <div class="card-body">

            <div class="alert alert-danger rounded-pill" role="alert">
                Some error during Sign Up
            </div>
            <form class="needs-validation was-validated" novalidate>
                <div class="form-group">
                    <label for="validationCustom03">Enter email</label>
                    <input type="text" class="form-control" id="validationCustom03" placeholder="Enter email" required>
                    <div class="invalid-feedback">
                        Please provide a valid email.
                    </div>
                    <div class="form-group">
                        <label for="validationCustom04">Password</label>
                        <input type="text" class="form-control" id="validationCustom04" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validationCustom05">Password confirmation</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Password confirmation" required>
                        <div class="invalid-feedback">
                            Please provide a valid password.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Sign up</button>
            </form>
        </div>

    </div>
    @endsection