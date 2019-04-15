@extends ('layouts.base')

@section('body')

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-9 border border-light">
            @yield('content')
        </div>
        <div class="col-3 border border-light">
            @yield('sidebar')
        </div>
    </div>
</div>
@endsection


