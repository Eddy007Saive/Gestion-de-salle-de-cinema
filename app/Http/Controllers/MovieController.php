<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function view($id)  {
        $movie=movie::findorfail($id);
        return view("Admin.Movies.View",compact("movie"));
    }
    /**
     * Undocumented function
     *
     * @param [type] $id id du film
     * @return json
     */
    public function getImage($id)
    {
        $image = movie::select('image')->find($id);

        return response()->json(['image' => $image]);
    }

    /**
     * Afficher la liste de tout les produits
     *
     * @return view
     */
    public function index()
    {

        $movies = movie::with("genres")->get();
        return view('Admin.Movies.movie', ['movies' => $movies]);
    }

    /**
     * Affiche le febtre d'ajout des film
     *
     * @return view
     */
    public function create()
    {
        $genres=genre::All();
        return view('Admin.Movies.add',compact("genres"));
    }

    /**
     * Enregistrer un produit
     *
     * @param  Request  $req prend en paramétre un tableau de données
     * @return void
     */
    public function store(Request $req)
    {

        $req->validate([
            'titre' => ['required', 'min:3', 'max:100', 'unique:movies,titre'],
            'real' => ['required', 'min:3', 'max:100'],
            'DateSortie' => ['required', 'date', 'before:today'],
            'descri' => ['required', 'min:50'],
            'duree' => ['required', 'date_format:H:i'],
            'image' => ['required', 'mimes:jpg,png'],
        ]);
        try {
            $file = $req->file('image');
            $image = $file->getClientOriginalName();
            $req->file('image')->storeAs('images', $image, 'public');
            $movie=movie::create([
                'titre' => $req['titre'],
                'Auteur' => $req['real'],
                'DateS' => $req['DateSortie'],
                'descri' => $req['descri'],
                'duree' => $req['duree'],
                'image' => $image,
            ]);

            foreach ($req["genre"] as $value) {

             $movie->genres()->attach($value);
            }
            return redirect()->route('film.create');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }

    }

    /**
     * Affiche le fenetre de modification
     *
     * @param [int] $id prend en parametre l'id
     * @return void
     */
    public function modify($id)
    {
        $movie = movie::find($id);

        return view('Admin.Movies.add', ['movie' => $movie]);
    }

    /**
     * Mis à jours du film
     *
     * @param  Request  $req tableau de valeur
     * @return void
     */
    public function update(Request $req)
    {
        try {
            $movie = movie::find($req['id']);
            if ($req->file('image') == null) {
                $image = $req->image;
                $req->validate([
                    'titre' => ['required', 'min:3', 'max:100', 'unique:movies,titre'],
                    'real' => ['required', 'min:3', 'max:100'],
                    'DateSortie' => ['required', 'date', 'before:today'],
                    'descri' => ['required', 'min:50'],
                    'duree' => ['required', 'date_format:H:i:s'],
                ]);
            } else {
                $file = $req->file('image');
                $image = $file->getClientOriginalName();
                $req->file('image')->storeAs('images', $image, 'public');
                $req->validate([
                    'titre' => ['required', 'min:3', 'max:100', 'unique:movies,titre'],
                    'real' => ['required', 'min:3', 'max:100'],
                    'DateSortie' => ['required', 'date', 'before:today'],
                    'descri' => ['required', 'min:50'],
                    'duree' => ['required', 'date_format:H:i:s'],
                    'image' => ['required', 'mimes:jpg,png'],
                ]);
            }

            $movie->update([
                'titre' => $req['titre'],
                'Auteur' => $req['real'],
                'DateS' => $req['DateSortie'],
                'duree' => $req['duree'],
                'descri' => $req['descri'],
                'image' => $image,
            ]);

            return redirect()->route('film');
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    /**
     * Supprimer un produit
     *
     * @param [int] $id prend en parame
     * @return void
     */
    public function delete($id)
    {
        try {
            $movie = movie::find($id);
            $movie->delete();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
