<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itineraire ;

class ItineraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itineraires = Itineraire::all();
        return view ('itineraires.index')->with('itineraires', $itineraires);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itineraires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Itineraire::create($input);
        return redirect('itineraire')->with('flash_message', 'Itineraire Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itineraire = Itineraire::find($id);
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
        $itineraire = Itineraire::find($id);
        $input = $request->all();
        $itineraire->update($input);
        return redirect('itineraire')->with('flash_message', 'itineraire Updated!');  
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
