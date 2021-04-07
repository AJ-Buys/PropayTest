@extends('/layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Propay Test (candidate test).</p>
        <br>
        @if (Auth::guest())
            <hr>
            <p><h3>Please log in or register an user:</h3></p>
            <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <a href="/register" class="btn btn-danger btn-lg" role="button">Register</a>
            </p>
        @endif
    </div>
@endsection
