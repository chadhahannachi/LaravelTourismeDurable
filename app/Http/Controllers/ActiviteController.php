<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite; // Modèle Activite

class ActiviteController extends Controller
{
    /**
     * Affiche une liste des activités.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activite::all();
        return view('activites.index')->with('activites', $activites);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle activité.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activites.create'); // Vue pour créer une nouvelle activité
    }

    /**
     * Stocke une nouvelle activité dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:50',
            'niveau_durabilite' => 'required|integer|min:1|max:10', // Exemple: niveau de durabilité entre 1 et 10
            'prix' => 'required|numeric|min:0',
        ]);

        // Création de l'activité
        Activite::create($validatedData);

        return redirect('activite')->with('flash_message', 'Activité ajoutée avec succès!');
    }

    /**
     * Affiche les détails d'une activité spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activite = Activite::find($id);
        return view('activites.show')->with('activites', $activite);
    }

    /**
     * Affiche le formulaire d'édition d'une activité spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activite::find($id);
        return view('activites.edit')->with('activites', $activite);
    }

    /**
     * Met à jour une activité spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

 
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|max:50',
            'niveau_durabilite' => 'required|integer|min:1|max:10',
            'prix' => 'required|numeric|min:0',
        ]);

        // Trouver l'activité et mettre à jour les informations
        $activite = Activite::find($id);
        $activite->update($validatedData);

        return redirect('activite')->with('flash_message', 'Activité mise à jour avec succès!');
    }

    /**
     * Supprime une activité spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activite::destroy($id);
        return redirect('activite')->with('flash_message', 'Activité supprimée avec succès!');
    }
}
