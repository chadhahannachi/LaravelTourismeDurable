<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape ;
use App\Models\Itineraire ;


class EtapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etapes = Etape::all();
        return view ('etapes.index')->with('etapes', $etapes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create()
    // {
    //     return view('etapes.create');
    // }

    public function create(Itineraire $itineraire)
    {
        return view('etapes.create')->with('itineraire', $itineraire);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


   


    public function store(Request $request) {
        $request->validate([
            'itineraire_id' => 'required',
            'impact' => 'boolean', 
            'nomEtape' => 'required|max:7', // Limite à 7 caractères
            'description' => 'required|min:10', // Min 10 caractères
        ], [
            'nomEtape.max' => 'Le nom ne doit pas dépasser 7 caractères.', // Message personnalisé
            'description.min' => 'La description doit contenir au moins 10 caractères.', // Message personnalisé
        ]);
    
        $etape = new Etape();
        $etape->itineraire_id = $request->input('itineraire_id');
        // autres attributs à définir nomEtape', 'description', 'localisation', 'impact'
        $etape->nomEtape = $request->input('nomEtape');
        $etape->description= $request->input('description');
        $etape->localisation = $request->input('localisation');
        $etape->impact = $request->input('impact') ? true : false;
        $etape->save();
        
        return redirect('/itineraire')->with('flash_message', 'etape ajoutée!');  

    }
    



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etape = Etape::find($id);
        return view('etapes.show')->with('etapes', $etape);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etape = Etape::find($id);
        return view('etapes.edit')->with('etapes', $etape);
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
        $etape = Etape::find($id);
        $input = $request->all();
        $etape->update($input);
        return redirect('/itineraire')->with('flash_message', 'etape deleted!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Etape::destroy($id);
        // return redirect('etape')->with('flash_message', 'Etape deleted!');
        return redirect('/itineraire')->with('flash_message', 'etape deleted!');  

    }


    public function stats()
{
    $etapes = Etape::all();
    $impactCount = $etapes->where('impact', true)->count();
    $noImpactCount = $etapes->where('impact', false)->count();

    $totalCount = $impactCount + $noImpactCount;

    // Calculer les pourcentages
    $impactPercentage = $totalCount > 0 ? ($impactCount / $totalCount) * 100 : 0;
    $noImpactPercentage = $totalCount > 0 ? ($noImpactCount / $totalCount) * 100 : 0;

    return view('stats', [
        'impactCount' => $impactCount,
        'noImpactCount' => $noImpactCount,
        'impactPercentage' => $impactPercentage,
        'noImpactPercentage' => $noImpactPercentage,
    ]);
}



}
