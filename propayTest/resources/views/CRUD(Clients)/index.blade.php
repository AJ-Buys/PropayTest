@extends('layouts.app')

@section('content')
    <h1>Clients</h1>
    <hr>
    <a class="btn btn-primary btn-lg" href="/clients/create" role="button">Create a client</a>
    <hr>
    @if(count($clients) >0)
        @foreach ($clients as $client)
                <div class="card">
                    <table class='table table-striped' style="width:100%" >
                        <h3><a href="/clients/{{$client->id}}"><i>{{$client->Name}} {{$client->Surname}}</i></a></h3>
                        <tr>
                            <th>ID:</th>
                            <th>Mobile No:</th>
                            <th>Email:</th>
                            <th>Birth date:</th>
                            <th>Language</th>
                            <th>Interests:</th>
                            <th>Added by:</th>
                        </tr>
                        <tr>
                            <td>{{$client->SA_ID}}</td>
                            <td>{{$client->Mobile_no}}</td>
                            <td>{{$client->Email}}</td>
                            <td>{{$client->Birth_date}}</td>
                            <td>{{$client->Language}}</td>
                            <td>{{$client->Interests}}</td>
                            <td>{{$client->user->name}}</td>  
                        </tr>
                    </table> 
                    <div>
                        @if (Auth::user()->name == $client->user->name)
                            {!!Form::open(['action' => ['App\Http\Controllers\ClientsController@destroy', $client->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
                            {!!Form::close()!!}
                            <a class="btn btn-info float-right" href="/clients/{{$client->id}}/edit" role="button">Edit</a>
                        @endif
                    </div>
                </div>
                <br>
        @endforeach
        {{$clients->links()}}
    @else 
        <p><h2>There are no entries</h2></p>
    @endif
    
@endsection