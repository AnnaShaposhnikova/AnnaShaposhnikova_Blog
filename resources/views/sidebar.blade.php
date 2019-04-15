
@section('sidebar')


    <h1 class="h1">Страницы</h1>

    <p> <a href="{{route('home')}}" >Home</a></p>
    <p> <a href="{{route('user')}}" >User</a></p>
    <p> <a href="{{route('post')}}" >Post</a></p>
    <p> <a href="{{route('category')}}" >Category</a></p>
    <p> <a href="{{route('tag')}}" >Tag</a></p>
    <p> <a href="{{route('comment')}}" >Comment</a></p>



@endsection