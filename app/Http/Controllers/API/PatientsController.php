<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Record\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Patient::orderBy('id', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        Patient::create($request->all());
        return response()->json('The Patient screening successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $patient = Patient::whereNotNull($id);
        // $patient = Patient::where(key->value, '!=', null,'')->find($id);
        $patient = Patient::find($id);

        /* foreach($patient as $key => $value) {
            if ($value == null) {
                unset($patient[$key]);
            }
            return response()->json($patient);
        } */
        return response()->json($patient);
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
        $patient = Patient::find($id);
        $patient->update(
            array_filter($request->all())
        );
        // $patient->update($request->all());
        return response()->json('The patient successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->user_type !==3) {
            return false;
        } else {
        $patient = Patient::find($id);
        $patient->delete();
        return response()->json('The patient successfully deleted');
        }
    }
}