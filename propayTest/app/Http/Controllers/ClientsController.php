<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

//Email 
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class ClientsController extends Controller
{

    //Access control.
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Display a listing of the resource.
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->paginate(5);
        return view('CRUD(Clients).index')->with('clients', $clients);
    }

   
    //Show the form for creating a new resource.
    public function create()
    {
        return view('CRUD(Clients).create');
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Surname' => 'required',
            'ID' => 'required',
            'Email' => 'required',
            'Birth_date' => 'required',
            'Language' => 'required',
        ]);

        //Tinker
        $client = new Client;
        $client->Name = $request->input('Name');
        $client->Surname = $request->input('Surname');
        $client->SA_ID = $request->input('ID');
        $client->Mobile_no = $request->input('Mobile_no');
        $client->Email = $request->input('Email');
        $client->Birth_date = $request->input('Birth_date');
        $client->Language = $request->input('Language');

        $arrToString = implode(',', $request->input('Interests'));
        echo $arrToString;
        $client->Interests = $arrToString;
        $client->user_id = auth()->user()->id;
        $client->save();

        Mail::to($client->Email)->send(new WelcomeMail());
        return redirect('/clients')->with('success', 'Client added and Email sent');

    }

    //Display the specified resource.
    public function show($id)
    {
        
        $client = Client::find($id);
        return view('CRUD(Clients).show')->with('client', $client);
    }

    //Show the form for editing the specified resource.
    public function edit($id)
    {
        $client = Client::find($id);
        if(auth()->user()->id !==$client->user_id){
            return redirect('/clients')->with('error', 'Unauthorized Page');
        }
        return view('CRUD(Clients).edit')->with('client', $client);
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Surname' => 'required',
            'ID' => 'required',
            'Email' => 'required',
            'Birth_date' => 'required',
            'Language' => 'required',
        ]);

        //Tinker
        $client = Client::find($id);
        $client->Name = $request->input('Name');
        $client->Surname = $request->input('Surname');
        $client->SA_ID = $request->input('ID');
        $client->Mobile_no = $request->input('Mobile_no');
        $client->Email = $request->input('Email');
        $client->Birth_date = $request->input('Birth_date');
        $client->Language = $request->input('Language');

        $arrToString = implode(',', $request->input('Interests'));
        echo $arrToString;
        $client->Interests = $arrToString;
        
        $client->save();

        return redirect('/clients')->with('success', 'Client updated');
    }

    //Remove the specified resource from storage.
    public function destroy($id)
    {
        $client = Client::find($id);
        if(auth()->user()->id !==$client->user_id){
            return redirect('/clients')->with('error', 'Unauthorized Page');
        }
        $client->delete();
        
        return redirect('/clients')->with('success', 'Client removed');
    }
}
