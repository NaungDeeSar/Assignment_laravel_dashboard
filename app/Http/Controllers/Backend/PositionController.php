<?php

namespace App\Http\Controllers\backend;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $positions = Position::all();
      
        return view('backend.admin_position.index',compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deps = Department::all();
        $deps = json_decode(json_encode($deps));
        return view('backend.admin_position.create',compact('deps'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Position::create([
            'name'=> $request->name,
            'dep_id'=> $request->dep_id,
            'price'=> $request->price,
        ]);
        return redirect()->route('admin.position.index')->with('create','create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pos=Position::findOrFail($id);
        $deps = Department::all();
        return view('Backend.admin_position.edit',compact('pos','deps'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Position::findOrFail($id)->update([
            'name' =>$request->name,
            'dep_id' =>$request->dep_id,
            'price' =>$request->price,
        ]);
        return redirect()->route('admin.position.index')->with('update','update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dep=Position::findOrFail($id)->delete();
        return redirect()->route('admin.position.index')->with('create','Delete successfully');
    }
}
