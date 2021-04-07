<?php
    //To get the array of interests
    $arr = explode(',', $client->Interests)
?>

@extends('layouts.app')

@section('content')
    <h1>Edit Entry</h1>
    <a class="btn btn-primary btn-lg" href="/clients" role="button">Cancel</a>
    
    <div class="container">
        {!!Form::open(['action'=> ['App\Http\Controllers\ClientsController@update', $client->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('Name', 'Name:')}}
            {{Form::text('Name', $client->Name, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('Surname', 'Surname:')}}
            {{Form::text('Surname', $client->Surname, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('ID', 'South African ID:')}}
            {{Form::text('ID', $client->SA_ID, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('Mobile_no', 'Mobile Number:')}}
            {{Form::text('Mobile_no', $client->Mobile_no, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('Email', 'Email:')}}
            {{Form::text('Email', $client->Email, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('Birth_date', 'Birth Date: (yyyy-mm-dd)')}}
            {{Form::text('Birth_date', $client->Birth_date, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('Language', 'Select your home-language:')}}
            <br>
            @if ($client->Language == 'English')
            {{Form::radio('Language', 'English', true)}} 
            @else 
            {{Form::radio('Language', 'English')}}
            @endif
            {{Form::label('Language', 'English')}}
            <br>
            @if ($client->Language == 'Afrikaans')
            {{Form::radio('Language', 'Afrikaans', true)}} 
            @else 
            {{Form::radio('Language', 'Afrikaans')}}
            @endif
            {{Form::label('Language', 'Afrikaans')}}
        </div>

        <div class="form-group">
            {{Form::label('Interests', 'Select your interests:')}}
            <br>

            @if (in_array('Programming', $arr))
                {{Form::checkbox('Interests[]', 'Programming', true)}}
            @else
                {{Form::checkbox('Interests[]', 'Programming')}}
                
            @endif
            {{Form::label('Interests', 'Programming')}}
            <br>

            @if (in_array('Drawing', $arr))
                {{Form::checkbox('Interests[]', 'Drawing', true)}}
            @else
                {{Form::checkbox('Interests[]', 'Drawing')}}
            @endif
            {{Form::label('Interests', 'Drawing')}}
            <br>
            
            @if (in_array('Hardware', $arr))
                {{Form::checkbox('Interests[]', 'Hardware', true)}}
            @else
                {{Form::checkbox('Interests[]', 'Hardware')}}
            @endif
            {{Form::label('Interests', 'Hardware')}}
        
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>      
@endsection