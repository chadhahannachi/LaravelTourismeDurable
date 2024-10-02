<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoyenTransport ;

class MoyenTransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moyenTransports = MoyenTransport::all();
        return view ('moyenTransports.index')->with('moyenTransports', $moyenTransports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moyenTransports.create');
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
        MoyenTransport::create($input);
        return redirect('moyenTransport')->with('flash_message', 'MoyenTransport Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $moyenTransport = MoyenTransport::find($id);
        return view('moyenTransports.show')->with('moyenTransports', $moyenTransport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moyenTransport = MoyenTransport::find($id);
        return view('moyenTransports.edit')->with('moyenTransports', $moyenTransport);
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
        $moyenTransport = MoyenTransport::find($id);
        $input = $request->all();
        $moyenTransport->update($input);
        return redirect('moyenTransport')->with('flash_message', 'moyenTransport Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MoyenTransport::destroy($id);
        return redirect('moyenTransport')->with('flash_message', 'MoyenTransport deleted!');
    }
}
