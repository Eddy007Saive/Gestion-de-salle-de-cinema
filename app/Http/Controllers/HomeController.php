<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use App\Models\movie;
use Carbon\Carbon;
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
        $movies= movie::where("DateS",">", $weekAgo)->get();
        // Selectionnez les film en projection de la semaine
        $horaires= Horaire::All();

        $horaires->map(function ($horaire)  {
            $date=Carbon::parse($horaire->DateD)->locale('fr_FR');
            $horaire->DateD= $date->isoFormat("LL");
        });
        return view("welcome",compact("movies","horaires"));
    }

    public function getFilmByDay($film){
        $weekAgo=Carbon::now()->subWeek();
        $movies= movie::where("DateS",">", $weekAgo)->get();

        $h=$this->getFilm($film);
        return view('MovieByDay',compact("h","movies"));

    }

    public function getFilm($film){
        $horaires= Horaire::All();
        $horaires->map(function ($horaire)  {
            $date=Carbon::parse($horaire->DateD)->locale('fr_FR');
            $horaire->DateD= $date->dayName;
        });

        $h=$horaires->filter(function ($horaire) use ($film) {
            return $horaire->DateD === $film;
        });
        return $h;
    }

}
