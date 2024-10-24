<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hebergement; // The model for Hebergement
use App\Models\LabelEcologique; // The model for LabelEcologique
use Illuminate\Support\Facades\Validator;

class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all hebergements with their associated ecological labels
        $hebergements = Hebergement::with('labelEcologique')->get();
        return view('hebergements.index', compact('hebergements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all ecological labels to populate the dropdown in the form
        $labels = LabelEcologique::all();
        return view('hebergements.create', compact('labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'label_ecologique_id' => 'required|exists:label_ecologiques,id',
            'impact' => 'required|string|max:1000',
        ]);

        // Store the new hebergement in the database
        Hebergement::create($request->all());

        // Redirect to index with a success message
        return redirect('hebergement')->with('flash_message', 'Hebergement Added!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $hebergement = Hebergement::with('labelEcologique')->find($id); // Use with() to load the relationship

    if (!$hebergement) {
        return redirect()->route('hebergement.index')->with('error', 'Hébergement non trouvé.');
    }

    return view('hebergements.show', compact('hebergement'));
}
    public function edit($id)
    {
        $hebergement = Hebergement::findOrFail($id);
        $labels = LabelEcologique::all(); // Get all labels for the dropdown
        return view('hebergements.edit', compact('hebergement', 'labels'));
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
        // Validate incoming request data
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'label_ecologique_id' => 'required|exists:label_ecologiques,id',
            'impact' => 'required|string|max:1000',
        ]);

        $hebergement = Hebergement::findOrFail($id);
        $hebergement->update($request->all());
        return redirect('hebergement')->with('flash_message', 'Hebergement Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hebergement::destroy($id);
        return redirect('hebergement')->with('flash_message', 'Hebergement deleted!');  
    }
}
