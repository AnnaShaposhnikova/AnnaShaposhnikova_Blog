@extends('layouts.blog-with-sidebar')

@section('title', 'My blog - Home')

<div class="container">
    @include('user_side.navigation',['activeNav'=>'home'])
</div>
<div class="container mt-3 mb-3">
    @include('user_side.breadcrumb',
    [
        'breadcrumbs'=>[
            [
                'name'=>'Home',
                'active'=>false,
                'route'=>'home'
             ]
        ]
    ])
</div>






@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Приветствуем Вас в нашем супер-пупер мега блоге!!!</h1>
            <p class="lead">УРА!!!!!!!!!!!!</p>
        </div>
    </div>


@endsection

@section('sidebar')
@include ('user_side.sidebar')

@endsection

@section('footer')


@endsection
