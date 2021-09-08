<?php

namespace App\Http\Controllers;

use App\roles;
use Illuminate\Http\Request;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=roles::latest()->paginate(5);
        return view('roles.index',compact('roles'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            'Code'=> 'required',
            'Departement'=> 'required',
            'Sigle'=> 'required',
            'Chef de departement'=> 'required',
            'Id'=> 'required',
            'Entite parent'=> 'required',
            
        ]);
        roles::create($request->all());

        return redirect()->route('roles.index')
        ->with('success','roles created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(roles $roles)
    {
        return view('roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(roles $roles)
    {
        return view ('roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, roles $roles)
    {
        $request->validate( [

        ]);
        $roles->update($request->all());

        return redirect()->route(roles.index)
        ->with('success', 'roles updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(roles $roles)
    {
        $roles->delete();
        return redirect()->route('roles.index')
        ->with('success','roles deleted successfully');
    }
}
