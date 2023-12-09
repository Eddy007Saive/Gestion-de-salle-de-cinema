<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    protected $genre=["Horreur","Anime","Comédie","Drame","Science-fiction",
    "Romance","Documentaire","Aventure","Fantaisie","Thriller","Mystére","Crime","Guerre","Historique"];

    public function index() {
        $genres=genre::paginate(2);
        return view("Admin.Genres.Genre",compact("genres"));

    }

    public function create()
    {
        $movies=movie::All();
        $genres=$this->genre;
        return view('Admin.Genres.Add',compact('movies',"genres"));
    }


    public function store(Request $req) {
        $req->validate([
            'genre'=>['required'],
            'movie'=>['required']
        ]);


        try {
            foreach ($req["genre"] as  $value) {
                genre::create(
                    [
                    'genre'=> $value,
                    'movie_id'=>$req["movie"],
                    ]
                );
            }


            return redirect()->route('Genre');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

}
