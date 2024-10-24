<?php

namespace App\Http\Controllers;

use App\Models\LabelEcologique; // Ensure model is imported
use Illuminate\Http\Request;

class LabelEcologiqueController extends Controller
{
    // Show the form for creating a new ecological label
    public function create()
    {
        return view('label.create');
    }

    // Handle the form submission for creating a new label
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'criteres' => 'required|string|max:1000',
        ]);

        // Create a new ecological label
        LabelEcologique::create($request->all());

        // Redirect back to the form with a success message
        return redirect()->route('label.create')->with('success', 'Label écologique créé avec succès.');
    }
}
