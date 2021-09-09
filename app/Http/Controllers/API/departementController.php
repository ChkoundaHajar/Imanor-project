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
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'departement'=> 'required',
            'sigle'=> 'required',
            'chef_id'=> 'required',
            'parent'=> 'required',

        ]);
        
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {

        $departement = new departement;
        $departement -> id = $request->input('id');
        $departement -> departement = $request->input('departement');
        $departement -> sigle = $request->input('sigle');
        $departement -> chef_id = $request->input('chef_id');
        $departement -> parent = $request->input('parent');
        $departement-> save();

         
        return response()->json([
            'status'=>200,
            'message' => 'departement added successfully',
        ]);

        } 
         
    }


    public function edit($id)

    {
        $departement = departement::find($id);

        if($departement)
        {
            return response()->json([
                'status'=>200,
                'departement' => $departement,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message' => 'No departement id found',
            ]);
        }
        

    }



    public function update(Request $request, $id)
    {
        $validator= validator::make($request->all(),[
            'id'=> 'required',
            'departement'=> 'required',
            'sigle'=> 'required',
            'chef_id'=> 'required',
            'parent'=> 'required',

        ]);
        
        if($validator->fails())
        {
            return response()->json([
                'validate_err'=>$validator->messages(),
                
            ]);

        }
        else
        {
            $departement =  departement::find($id);
            if($departement)
            {

            
                $departement -> id = $request->input('id');
                $departement -> departement = $request->input('departement');
                $departement -> sigle = $request->input('sigle');
                $departement -> chef_id = $request->input('chef_id');
                $departement -> parent = $request->input('parent');
                $departement-> update();

         
                return response()->json([
                   'status'=>200,
                   'message' => 'departement updated successfully',
                ]);
            }
            else 
            {
                return response()->json([
                    'status'=>404,
                    'message' => 'No departement id found',
                ]);
            }
        }    
    }

    public function destroy()
    {
        $departement =  departement::find($id);
        $departement->delete();


        return response()->json([
            'status'=>200,
            'message' => 'departement deleted successfully',
        ]);

    }
}
