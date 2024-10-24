<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite; // Modèle Activite
use App\Enums\ActivityType;

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
        $activityTypes = ActivityType::cases();
        return view('activites.create', compact('activityTypes')); // Pass enum values to the view
    
       // return view('activites.create'); // Vue pour créer une nouvelle activité
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
            'disponibilite' => 'required|integer|min:1|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour l'image   
        ]);
    
        $imagePath = null; // Initialize image path

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Create a unique filename for the image
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Store the image in the 'images' directory in the public disk
            $imagePath = $request->file('image')->storeAs('images', $fileName, 'public');
        }
    
        // Set the image path correctly
        if ($imagePath) {
            // Remove the leading '/storage/' since $imagePath already contains it
            $validatedData['image'] = $imagePath; // Just store the relative path
        }
    
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
