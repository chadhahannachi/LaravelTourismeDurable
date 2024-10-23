<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DestinationController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::with('attractions')->get();
        return view('destination.index', compact('destinations'));
    }
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function DisplayDestination()
    {
        $destinations = Destination::all();
        return view('destination.FrontOffice.indexFront')->with('destinations', $destinations);
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
            'niveauDurabilite' => 'required|integer|min:1|max:5',
            'description' => 'required|min:10',
            'nonAttraction' => 'array',
            'typeAttraction' => 'array',
            'descriptionAttraction' => 'array',
            'nonAttraction.*' => 'string|required',
            'typeAttraction.*' => 'string|required',
            'descriptionAttraction.*' => 'string|min:10',
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

    public function destinationDetails($id)
    {
        $destination = Destination::with(['attractions', 'rates.user'])->find($id);
        return view('destination.FrontOffice.destinationDetails', compact('destination'))->with('destination', $destination);
    }
    /**
     * Affiche le formulaire d'édition d'une activité spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::with('attractions')->findOrFail($id);
        return view('destination.edit', compact('destination'));
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
        // Validate incoming request data
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'localisation' => 'required',
            'niveauDurabilite' => 'required|integer|min:1|max:5',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        // Find the destination and update its information
        $destination = Destination::find($id);
        $destination->update($validatedData);

        // Delete all existing attractions for this destination
        Attraction::where('destination_id', $destination->id)->delete();

        // Add new attractions if any are provided
        if ($request->has('nonAttraction')) {
            foreach ($request->nonAttraction as $key => $value) {
                // Create new attractions
                Attraction::create([
                    'nomAttraction' => $value,
                    'typeAttraction' => $request->typeAttraction[$key],
                    'descriptionAttraction' => $request->descriptionAttraction[$key],
                    'destination_id' => $destination->id,
                ]);
            }
        }

        return redirect('destination')->with('flash_message', 'Destination mise à jour avec succès!');
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
