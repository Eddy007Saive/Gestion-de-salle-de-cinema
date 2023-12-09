<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalleController extends Controller
{

     /**
     * Récupere le nombre de place
     *
     * @param [type] $id id du salle
     * @return void
     */
    public function getPlace($id)
    {
        $place = Salle::select('nbr_place')->findorfail($id);

        return response()->json(['place'=> $place]);
    }
    
    /**
     * Afficher la liste de tous les salles
     *
     * @return view
     */
    public function index()
    {
            $salles=Salle::All();
            return view('Admin.Salles.Salle',compact('salles'));
    }

    /**
     * Affiche le fenetre d'ajout des salles
     *
     * @return view
     */
    public function create()
    {

        return view('Admin.Salles.Add');
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
            'nom'=>['required','min:3','unique:salles,nom'],
            'nbrplace'=>['required','numeric','']
        ]);

        try {

            Salle::create(
                [
                'nom'=>$req["nom"],
                'nbr_place'=>$req["nbrplace"],
                ]
            );
            return redirect()->route('Salle');
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
        $salle=Salle::findorfail($id);
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

            $salle=salle::findorfail($req['id']);
            $salle->update([
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
        $salle=salle::findorfail($id);
        $salle->delete();
        return redirect()->route('Salle');
        } catch (\Throwable $th) {
            //throw $th;
            Log::alert($th->getMessage());
        }

    }
}
