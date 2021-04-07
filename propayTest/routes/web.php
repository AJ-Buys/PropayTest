<?php

// Dependencies
use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Events\ClientRegisteredEvent;

// Routes
Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/aspects', 'App\Http\Controllers\PagesController@aspects');
Route::resource('clients', "App\Http\Controllers\ClientsController");
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email', function() {
    event(new ClientRegisteredEvent());
    return redirect('/clients');
});
