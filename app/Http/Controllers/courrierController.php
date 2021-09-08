<?php

namespace App\Http\Controllers;

use App\courrier;
use Illuminate\Http\Request;

class courrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courrier=courrier::latest()->paginate(5);
        return view('courrier.index',compact('courrier'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courrier.create');
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
            'client'=> 'required',
            'date'=> 'required',
            'statut'=> 'required',
            'fileUrl'=> 'required',
            
        ]);
        courrier::create($request->all());

        return redirect()->route('courrier.index')
        ->with('success','courrier created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(courrier $courrier)
    {
        return view('courrier.show', compact('courrier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function edit(courrier $courrier)
    {
        return view ('courrier.edit', compact('courrier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, courrier $courrier)
    {
        $request->validate( [

        ]);
        $courrier->update($request->all());

        return redirect()->route(courrier.index)
        ->with('success', 'courrier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(courrier $courrier)
    {
        $courrier->delete();
        return redirect()->route('courrier.index')
        ->with('success','courrier deleted successfully');
    }
}
