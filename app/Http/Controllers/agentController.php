<?php

namespace App\Http\Controllers;

use App\agent;
use Illuminate\Http\Request;

class agentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent=agent::latest()->paginate(5);
        return view('agent.index',compact('agent'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(agent $agent)
    {
        return view('agent.show', compact('agent'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(agent $agent)
    {
        return view ('agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agent $agent)
    {
        $request->validate( [

        ]);
        $agent->update($request->all());

        return redirect()->route(agent.index)
        ->with('success', 'agent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(agent $agent)
    {
        $agent->delete();
        return redirect()->route('agent.index')
        ->with('success','agent deleted successfully');
    }
}