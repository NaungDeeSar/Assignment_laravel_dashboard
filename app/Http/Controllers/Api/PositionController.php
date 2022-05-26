<?php

namespace App\Http\Controllers\api;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions=Position::all();
        return response()->json([
            'status'=>'OK',
            'TotalResoult'=>count($positions),
            'Positions'=>PositionResource::collection($positions),

        ]);
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
            'name'=>'required',
            'price'=>'required',
            'dep_id'=>'required',
        ]);
        $position=Position::create($request->only('name','price','dep_id'));
        return new PositionResource($position);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pos=Position::findOrFail($id);
        return new PositionResource($pos);
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
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'dep_id'=>'required',
        ]);
        $position=Position::findOrFail($id);
        $position->update($request->only('name','price','dep_id'));
        return new PositionResource($position);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pos=Position::findOrFail($id);
        $pos->delete();
        return new PositionResource($pos);
    }
}
