<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\departement;

class departementController extends Controller
{
    public function index()
    {
        $departement=departement::all();
        return response()->json([
            'status'=>200,
            'departement' => $departement,
        ]);
    }




    public function store(Request $request)
    {
        $departement = new departement;
        $departement -> id = $request->input('id');
        $departement -> departement = $request->input('departement');
        $departement -> sigle = $request->input('sigle');
        $departement -> chef_id = $request->input('chef_id');
        $departement -> parent = $request->input('parent');
         
        return response()->json([
            'status'=>200,
            'message' => 'departement added successfully',
        ]);
         
}


        
    

    public function edit($id)

    {
        $departement = departement::find($id);
        return response()->json([
            'status'=>200,
            'departement' => $departement,
        ]);
         
}
}
