<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\courrier;

class courrierController extends Controller
{
    public function index()
    {
        $courrier =courrier::all();
        return response()->json([
            'status'=>200,
            'courrier' => $courrier,
        ]);
    }

    
    public function store(Request $request)
    {
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'client'=> 'required',
            'date'=> 'required',
            'statut'=> 'required',
            'fileUrl'=> 'required',
            'departement_affecte '=> 'required',
            'agent_affecte'=> 'required',

        ]);

         
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {


        $courrier = new courrier;
        $courrier -> id = $request->input('id');
        $courrier -> client = $request->input('client');	
        $courrier -> date = $request->input('date');
        $courrier -> statut = $request->input('statut');
        $courrier -> fileUrl = $request->input('fileUrl');
        $courrier -> departement_affecte = $request->input('departement_affecte');
        $courrier -> agent_affecte = $request->input('agent_affecte');
        $courrier-> save();
         
        return response()->json([
            'status'=>200,
            'message' => 'courrier added successfully',
        ]);

        }
         
    }


    public function edit($id)

    {
        $courrier = courrier::find($id);

        if($courrier)
        {
            return response()->json([
                'status'=>200,
                'courrier' => $courrier,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message' => 'No courrier id found',
            ]);
        }
       
         
    }

    public function update(Request $request,$id)
    {
        
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'client'=> 'required',
            'date'=> 'required',
            'statut'=> 'required',
            'fileUrl'=> 'required',
            'departement_affecte '=> 'required',
            'agent_affecte'=> 'required',

        ]);

         
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {
            $courrier = courrier::find($id);

            if($courrier)
            {
               $courrier -> id = $request->input('id');
               $courrier -> client = $request->input('client');	
               $courrier -> date = $request->input('date');
               $courrier -> statut = $request->input('statut');
               $courrier -> fileUrl = $request->input('fileUrl');
               $courrier -> departement_affecte = $request->input('departement_affecte');
               $courrier -> agent_affecte = $request->input('agent_affecte');
               $courrier-> update();
         
                return response()->json([
                    'status'=>200,
                    'message' => 'courrier updated successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message' => 'No courrier id found',
                ]);
            }
        }

    }


    public function destroy()
    {
        $courrier = courrier::find($id);
        $courrier->delete();

        return response()->json([
            'status'=>200,
            'message' => 'courrier deleted successfully',
        ]);

    }

}
