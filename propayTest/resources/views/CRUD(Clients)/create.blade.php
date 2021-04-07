@extends('layouts.app')

@section('content')
    <h1>Create Entry</h1>
    <a class="btn btn-primary btn-lg" href="/clients" role="button">Cancel</a>

    <div class="container">
        {!!Form::open(['action'=> 'App\Http\Controllers\ClientsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('Name', 'Name:')}}
            {{Form::text('Name', '', ['class' => 'form-control', 'placeholder' => 'e.g. Jack'])}}
        </div>
        <div class="form-group">
            {{Form::label('Surname', 'Surname:')}}
            {{Form::text('Surname', '', ['class' => 'form-control', 'placeholder' => 'e.g. Smith'])}}
        </div>
        <div class="form-group">
            {{Form::label('ID', 'South African ID:')}}
            {{Form::text('ID', '', ['class' => 'form-control', 'placeholder' => 'e.g. 9405045018087'])}}
        </div>
        <div class="form-group">
            {{Form::label('Mobile_no', 'Mobile Number:')}}
            {{Form::text('Mobile_no', '', ['class' => 'form-control', 'placeholder' => 'e.g. 0824145252'])}}
        </div>
        <div class="form-group">
            {{Form::label('Email', 'Email:')}}
            {{Form::text('Email', '', ['class' => 'form-control', 'placeholder' => 'example@gmail.com'])}}
        </div>
        <div class="form-group">
            {{Form::label('Birth_date', 'Birth Date:(yyyy-mm-dd)')}}
            {{Form::text('Birth_date', '', ['class' => 'form-control', 'placeholder' => '1994-05-04'])}}
        </div>

        <div class="form-group">
            {{Form::label('Language', 'Select your home-language:')}}
            <br>
            {{Form::radio('Language', 'English')}}
            {{Form::label('Language', 'English')}}
            <br>
            {{Form::radio('Language', 'Afrikaans')}}
            {{Form::label('Language', 'Afrikaans')}}
        </div>

        <div class="form-group">
            {{Form::label('Interests', 'Select your interests:')}}
            <br>
            {{Form::checkbox('Interests[]', 'Programming')}}
            {{Form::label('Interests', 'Programming')}}
            <br>
            {{Form::checkbox('Interests[]', 'Drawing')}}
            {{Form::label('Interests', 'Drawing')}}
            <br>
            {{Form::checkbox('Interests[]', 'Hardware')}}
            {{Form::label('Interests', 'Hardware')}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
@endsection