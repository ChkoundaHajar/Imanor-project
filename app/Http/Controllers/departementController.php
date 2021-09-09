<?php

namespace App\Http\Controllers;

use App\departement;
use Illuminate\Http\Request;

class departementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement=departement::latest()->paginate(5);
        return view('departement.index',compact('departement'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departement.create');
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
            'departement'=> 'required',
            'sigle'=> 'required',
            'chef_id'=> 'required',
            'parent'=> 'required',
            
            
        ]);
        departement::create($request->all());

        return redirect()->route('departement.index')
        ->with('success','departement created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(departement $departement)
    {
        return view('departement.show', compact('departement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(departement $departement)
    {
        return view ('departement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departement $departement)
    {
        $request->validate( [

        ]);
        $departement->update($request->all());

        return redirect()->route(departement.index)
        ->with('success', 'departement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(departement $departement)
    {
        $departement->delete();
        return redirect()->route('departement.index')
        ->with('success','departement deleted successfully');
    }
}
