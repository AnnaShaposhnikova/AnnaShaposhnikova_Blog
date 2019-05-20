
@section('sidebar')


    <h1 class="h1">TAGS</h1>

    @foreach($tags as $tag)


        {{--<h5><i class="{{$tag['class']}}"></i><button type="button" class="btn btn-light">{{$tag['name']}}</button></h5>--}}
        <h5><i class="{{$tag['class']}}"></i><a href = "{{route('userPosts',['tag'=>$tag->id])}}">
                <button type="button" class="btn btn-light">  {{$tag['name']}}</button></a></h5>

    @endforeach


@endsection