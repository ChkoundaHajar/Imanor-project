<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\agent;

class agentController extends Controller
{
    public function index()
    {
        $agent = agent::all();
        return response()->json([
            'status'=>200,
            'agent' => $agent,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'mdp'=> 'required',
            'departement'=> 'required',
            'role'=> 'required',
        ]);
        agent::create($request->all());

        return redirect()->route('agent.index') ->with('success','agent created successfully');
    }

    public function edit($id)

    {
        $agent = agent::find($id);
        return response()->json([
            'status'=>200,
            'agent' => $agent,
        ]);
         
}
}