<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itineraire ;
use App\Models\MoyenTransport ;


class ItineraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $itineraires = Itineraire::all();
    //     return view ('itineraires.index')->with('itineraires', $itineraires);
    // }

    public function index()
{
    $itineraires = Itineraire::all(); // Récupérer tous les itinéraires
    $moyenTransports = MoyenTransport::all(); // Récupérer tous les moyens de transport

    return view('itineraires.index', compact('itineraires', 'moyenTransports'));
}


    public function itinerairelistfront()
    {
        $itineraires = Itineraire::all();
        return view ('itineraires.itinerairelistfront')->with('itineraires', $itineraires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Récupérez tous les moyens de transport
        $moyenTransports = MoyenTransport::all();

        // Retournez la vue avec la variable
        return view('itineraires.create', compact('moyenTransports'));
        // return view('itineraires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
{
    $validatedData = $request->validate([
        'nomItineraire' => 'required|string|max:10',
        'distance' => 'required|numeric|min:0',
        'moyenTransport' => 'required|string', // Validation du moyen de transport

    ]);

    $itineraire = new Itineraire();
    $itineraire->nomItineraire = $validatedData['nomItineraire'];
    $itineraire->distance = $validatedData['distance'];
    $itineraire->moyenTransport = $validatedData['moyenTransport'];

    $itineraire->save();

    return redirect('/itineraire')->with('success', 'Itinéraire ajouté avec succès!');
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $itineraire = Itineraire::find($id);
        $itineraire = Itineraire::with('etapes')->find($id);
        return view('itineraires.show')->with('itineraires', $itineraire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function edit($id)
{
    $itineraire = Itineraire::find($id);

    if (!$itineraire) {
        return redirect('/itineraire')->with('error', 'Itinéraire non trouvé.');
    }

    return view('itineraires.edit')->with('itineraires', $itineraire);
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
        {
            // Validation des données entrées par l'utilisateur
            $validatedData = $request->validate([
                'nomItineraire' => 'required|string|max:10',
                'distance' => 'required|numeric|min:0',
                'moyenTransport' => 'required|string', // Validation du moyen de transport

            ]);

            // Récupération de l'itinéraire par son ID
            $itineraire = Itineraire::find($id);

            // Vérification si l'itinéraire existe
            if (!$itineraire) {
                return redirect()->back()->with('error', 'Itinéraire non trouvé.');
            }

            // Mise à jour de l'itinéraire avec les données validées
            $itineraire->update($validatedData);

            // Redirection après succès
            return redirect('itineraire')->with('flash_message', 'Itinéraire mis à jour avec succès !');
        }


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Itineraire::destroy($id);
        return redirect('itineraire')->with('flash_message', 'Itineraire deleted!');
    }
    
}
