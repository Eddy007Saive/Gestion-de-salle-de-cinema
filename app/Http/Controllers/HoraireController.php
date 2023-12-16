<?php

namespace App\Http\Controllers;

use App\Models\movie;
use App\Models\Salle;
use App\Models\Horaire;
use App\Rules\unique_hours_for_date;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
       /**
     * Afficher la liste de tous les salles
     *
     * @return view
     */
    public function index()
    {
            $horaires=Horaire::All();
           
            return view('Admin.Horaires.Horaire',compact('horaires'));
    }

    /**
     * Affiche le fenetre d'ajout des salles
     *
     * @return view
     */
    public function create()
    {
        $movies=movie::All();
        $salles=Salle::All();
        return view('Admin.Horaires.Add',compact('movies',"salles"));
    }

    public function getFilm($jours) {

    }
    /**
     * Enregistrer un salle
     *
     * @param  Request  $req prend en paramétre un tableau de données
     * @return void
     */
    public function store(Request $req)
    {
        $req->validate([
            'date'=>['required'],
            'heure'=>['required',new unique_hours_for_date($req["date"],$req["salle"])],
            'movie'=>['required'],
            'salle'=>['required'],
            'place'=>['integer'],

        ]);

        try {
                Horaire::create([
                    'DateD'=>$req["date"],
                    'heureD'=>$req["heure"],
                    'placeDispo'=>$req["place"],
                    'movie_id'=>$req["movie"],
                    'salle_id'=>$req["salle"],


                ]);
            return redirect()->route('Horaire');
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
        $salle=Horaire::findorfail($id);
        return view('Admin.Salles.Add',compact('salle'));

    }

    /**
     * Mis à jours du film
     *
     * @param  Request  $req tableau de valeur
     * @return void
     */
    public function update(Request $req )
        {  $req->validate([
            'nom'=>['required','min:3'],
            'nbrplace'=>['required','numeric','']
        ]);
        try {

            $horaire=Horaire::findorfail($req['id']);
            $horaire->update([
                'nom'=>$req["nom"],
                'nbr_place'=>$req["nbrplace"],
            ]);
            return redirect()->route('Salle');
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
        $Horaire=Horaire::findorfail($id);
        $Horaire->delete();
        return redirect()->route('Horaire');
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }

    }

    public function view($id) {
        $horaire=Horaire::find($id);
        $movie=$horaire->movie;
        // $date= Carbon::now()->locale("fr");
        // $dateD=$date->format("l j F Y");
        $date = Carbon::parse($horaire->DateD);

        $dateD=$date->dayName;
        return view("Admin.Horaires.Details",compact("horaire","movie","dateD"));
    }
}
