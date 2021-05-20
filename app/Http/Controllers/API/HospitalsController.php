<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Record\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hospital::orderBy('id', 'DESC')->get();
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
            'name' => 'required',
            'address' => 'required',
            'contact1' => 'min:7|max:13',
            'contact2' => 'min:7|max:13',
            'type' => 'required',
            ]);

         $hospital = new Hospital([
            'name' => $request->name,
            'address' => $request->address,
            'contact1' => $request->contact1,
            'contact2' => $request->contact2,
            'type' => $request->type
        ]);
        $hospital->save();
        // Hospital::create($request->all());
        return response()->json('The hospital successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return response()->json($hospital);
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
        $hospital = Hospital::find($id);
        $hospital->update($request->all());

        return response()->json('The hospital successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();
        return response()->json('The hospital successfully deleted');
    }

}