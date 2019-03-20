<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lad_api()
    {
        $data = [
    pochette_album => '',
    nom_artiste => 'Tupac Shakur',
    nom_album => 'All Eyez on Me',
    genre => 'Rap West Coast',
    annee_production => '1996',
    label => 'Death Row',
    liste_chansons => [
        '1. 	Ambitionz az a Ridah',
        '2. 	All Bout U',
        '3. 	Skandalouz',
        '4. 	Got My Mind Made Up',
        '5. 	How Do U Want It ',
],
    note_moyenne_album => '10',
        ];
        return response()->json($data);
    }
}
