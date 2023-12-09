<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function home(){
        //Recuperer la semaine
        $weekAgo=Carbon::now()->subWeek();
        // Selectionner toutes les films qui sont sortie il y a une semaine
        $movies= DB::table('movies')->where("DateS",">", $weekAgo)->get();;
        // Selectionnez les film en projection de la semaine
        $projections=DB::table("horaires","h")->join("movies","h.movie_id","=","movies.id")->get();
        return view("welcome",compact("movies","projections"));
    }
}
