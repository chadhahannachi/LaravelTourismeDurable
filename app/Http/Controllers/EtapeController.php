<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etape ;

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
    public function create()
    {
        return view('etapes.create');
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
        Etape::create($input);
        return redirect('etape')->with('flash_message', 'Etape Addedd!');
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
        return redirect('etape')->with('flash_message', 'etape Updated!');  
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
        return redirect('etape')->with('flash_message', 'Etape deleted!');
    }
}
