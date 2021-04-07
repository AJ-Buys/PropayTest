<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to my project';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About the project';
        return view('pages.about')->with('title', $title);
    }

    public function aspects(){
        $data = array(
            'title' => 'The description and elements used in the project:',
            'aspects' => ['Web-based system', 'Using Laravel Framework (php8 and laravel8)', 'myphpadmin for database interface', 'Apache', 'CRUD functionality', 'Email functionality', 'Log-in/ Register functionality']
        );
        return view('pages.aspects')->with($data);
    }
}
