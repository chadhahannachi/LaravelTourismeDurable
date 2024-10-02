<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Hebergement; //add Hebergement Model - Data is coming from the database via Model.
 
class HebergementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hebergements = Hebergement::all();
        return view ('hebergements.index')->with('hebergements', $hebergements);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hebergements.create');
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
        Hebergement::create($input);
        return redirect('hebergement')->with('flash_message', 'Hebergement Addedd!');  
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hebergement = Hebergement::find($id);
        return view('hebergements.show')->with('hebergements', $hebergement);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hebergement = Hebergement::find($id);
        return view('hebergements.edit')->with('hebergements', $hebergement);
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
        $hebergement = Hebergement::find($id);
        $input = $request->all();
        $hebergement->update($input);
        return redirect('hebergement')->with('flash_message', 'hebergement Updated!');  
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