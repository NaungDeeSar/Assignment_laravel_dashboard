<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{

   //all show departments
    public function index()
    {
       $deps=Department::all();
        return response()->json([
            'status' => 'ok',
            'totalResults' => count($deps),
            'deps'=> DepartmentResource::collection($deps)
        ]);
    }

   //add new department
    public function store(Request $request)
    {
            //validate
            $request->validate([
                'name'=>'required'    
            ]);        
           
       $deps=Department::create($request->only('name'));
      
        return new DepartmentResource($deps);
    }

    //show each department
    public function show($id)
    {
         $deps=Department::findOrFail($id);
        return new DepartmentResource($deps);
    }


   //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
           
        ]);

        $deps=Department::findOrFail($id);
        $deps->update($request->only('name'));
        return new DepartmentResource($deps);
    }

    //remove
    public function destroy($id)
    {
        $deps=Department::findOrFail($id);
        $deps->delete();
        return new DepartmentResource($deps);
        
    }
}
