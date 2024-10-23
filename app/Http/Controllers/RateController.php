<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    //
    public function store(Request $request, $destinationId)
    {
        // Validate the request inputs
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:10|max:1000',
        ]);

        // Check if the destination exists
        $destination = Destination::findOrFail($destinationId);

        // Create a new review
        Rate::create([
            'stars' => $request->input('rating'),
            'review' => $request->input('review'),
            'destination_id' => $destination->id,
            'user_id' => Auth::id(),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
}
