<?php
if (!isset($activeNav)){
    $activeNav = '';
}


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}><img height="50" width="100" src="/img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">



            <li class="nav-item @if ($activeNav==='home') active @endif ">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item @if ($activeNav==='posts') active @endif ">
                <a class="nav-link" href="{{route('userPosts')}}">Posts</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
        @guest
            <li class="nav-item  @if ($activeNav==='sign_in') active @endif  ">
                <a class="nav-link" href="{{route('sign_in')}}">Sign in /</a>
            </li>
            <li class="nav-item @if ($activeNav==='sign_up') active @endif">
                <a class="nav-link" href="{{route('sign_up')}}">Sign up</a>
            </li>

         @else
            <li class="nav-item">

                    <a class="nav-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            </li>

        @endguest
        </ul>
    </div>
</nav>