@extends('/layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($aspects) > 0)
        <ul class="list-group">
            @foreach ($aspects as $aspect)
                <li class="list-group-item">{{$aspect}}</li>
            @endforeach
        </ul>
    @endif
@endsection