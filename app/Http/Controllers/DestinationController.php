<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    /**
     * Affiche une liste des activités.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('destination.index')->with('destinations', $destinations);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle activité.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destination.create');
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
            'localisation' => 'required',
            'niveauDurabilite' => 'required|integer|min:1|max:10',
            'description' => 'required',
            'nonAttraction' => 'array',
            'typeAttraction' => 'array',
            'descriptionAttraction' => 'array',
            'nonAttraction.*' => 'required|string',
            'typeAttraction.*' => 'required|string',
            'descriptionAttraction.*' => 'required|string',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
        $destination = Destination::create($validatedData);



        // Adding attractions to the destination
        if ($request->has('nonAttraction')) {
            foreach ($request->nonAttraction as $key => $value) {
                $attractionData = [
                    'nomAttraction' => $value,
                    'typeAttraction' => $request->typeAttraction[$key],
                    'descriptionAttraction' => $request->descriptionAttraction[$key],
                    'destination_id' => $destination->id, // Link to the created destination
                ];
                Attraction::create($attractionData);
            }
        }

        return redirect('destination')->with('flash_message', 'Destination ajoutée avec succès!');
    }


    /**
     * Affiche les détails d'une activité spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destination = Destination::find($id);
        return view('destination.show')->with('destination', $destination);
    }

    /**
     * Affiche le formulaire d'édition d'une activité spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);
        return view('destination.edit')->with('destination', $destination);
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
            'localisation' => 'required',
            'niveauDurabilite' => 'required|integer|min:1|max:10',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        // Trouver l'activité et mettre à jour les informations
        $destination = Destination::find($id);
        $destination->update($validatedData);

        return redirect('destination')->with('flash_message', 'Déstination mise à jour avec succès!');
    }

    /**
     * Supprime une activité spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Destination::destroy($id);
        return redirect('destination')->with('flash_message', 'Déstination supprimée avec succès!');
    }
}
