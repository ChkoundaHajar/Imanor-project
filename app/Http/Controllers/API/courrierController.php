<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\courrier;

class courrierController extends Controller
{
    public function index()
    {
        $courrier = courrier::all();
        return response()->json([
            'status'=>200,
            'courrier' => $courrier,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id'=> 'required',
            'client'=> 'required',
            'date'=> 'required',
            'statut'=> 'required',
            'fileUrl'=> 'required',
            'departement_affecte '=> 'required',
            'agent_affecte'=> 'required',
                  
            
        ]);
        courrier::create($request->all());

        return redirect()->route('courrier.index')
        ->with('success','courrier created successfully');
    }

    public function edit($id)

    {
        $courrier = courrier::find($id);
        return response()->json([
            'status'=>200,
            'courrier' => $courrier,
        ]);
         
}

}
