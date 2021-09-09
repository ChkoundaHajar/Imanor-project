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
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'mdp'=> 'required',
            'departement'=> 'required',
            'role'=> 'required',

        ]);

         
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {

          $agent = new agent;
          $agent -> id = $request->input('id');
          $agent -> nom = $request->input('nom');	
          $agent -> prenom = $request->input('prenom');
          $agent -> email = $request->input('email');
          $agent -> mdp = $request->input('mdp');
          $agent -> departement = $request->input('departement');
          $agent -> role = $request->input('role');
          $agent-> save();
         
        return response()->json([
            'status'=>200,
            'message' => 'agent added successfully',
        ]);

    }
         
    }


    public function edit($id)

    {
        $agent = agent::find($id);

        if($agent)
        {
            return response()->json([
                'status'=>200,
                'agent' => $agent,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message' => 'No agent Id found',
            ]);
        }
        
         
    }



    public function update(Request $request, $id)
    { 
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'email'=> 'required',
            'mdp'=> 'required',
            'departement'=> 'required',
            'role'=> 'required',

        ]);

         
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {
           $agent = agent::find($id);
           if($agent)
           {

               
                $agent -> id = $request->input('id');
                $agent -> nom = $request->input('nom');	
                $agent -> prenom = $request->input('prenom');
                $agent -> email = $request->input('email');
                $agent -> mdp = $request->input('mdp');
                $agent -> departement = $request->input('departement');
                $agent -> role = $request->input('role');
                $agent-> update();
         
                return response()->json([
                   'status'=>200,
                   'message' => 'agent updated successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message' => 'No agent Id found',
                ]);
            }
        }
         
    }


    public function destroy()
    {
        $agent = agent::find($id);
        $agent->delete();

    
        return response()->json([
            'status'=>200,
            'message' => 'agent deleted successfully',
        ]);
        
    }


    
}