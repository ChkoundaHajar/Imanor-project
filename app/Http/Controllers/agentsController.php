<?php

namespace App\Http\Controllers;

use App\agents;
use Illuminate\Http\Request;

class agentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents=agents::latest()->paginate(5);
        return view('agents.index',compact('agents'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.create');
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
            'Nom'=> 'required',
            'Prenom'=> 'required',
            'E-mail'=> 'required',
            'Mot de passe'=> 'required',
            'Code'=> 'required',
            'Profil'=> 'required',
        ]);
        agents::create($request->all());

        return redirect()->route('agents.index') ->with('success','agents created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show(agents $agents)
    {
        return view('agents.show', compact('agents'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit(agents $agents)
    {
        return view ('agents.edit', compact('agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agents $agents)
    {
        $request->validate( [

        ]);
        $agents->update($request->all());

        return redirect()->route(agents.index)
        ->with('success', 'agents updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy(agents $agents)
    {
        $agents->delete();
        return redirect()->route('agents.index')
        ->with('success','agent deleted successfully');
    }
}
