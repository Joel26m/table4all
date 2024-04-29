<?php

namespace App\Http\Controllers\Api;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeneficiaryResource;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiaries = Beneficiary::all();


        return BeneficiaryResource::collection($beneficiaries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beneficiary = new Beneficiary();
        $beneficiary->latitude = $request->input('latitude');
        $beneficiary->longitude = $request->input('longitude');
        $beneficiary->state = $request->input('state');

        try 
        {
            $beneficiary->save();
            $response = (new BeneficiaryResource($beneficiary))
                        ->response()
                        ->setStatusCode(201);
        } 
        catch (QueryException $ex) 
        {
            $mensaaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $beneficiary = Beneficiary::findOrFail($id);
            $beneficiary->state = $request->input('state'); 
            $beneficiary->save(); 

        try 
        {
            $beneficiary->save();
            $response = (new BeneficiaryResource($beneficiary))
                        ->response()
                        ->setStatusCode(201);
        } 
        catch (QueryException $ex) 
        {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiary $beneficiary)
    {
        try 
        {
            $Beneficiary->delete();
            $response = \response()
                        ->json(['mensaje' => 'Registro borrado correctamente'], 200);
        } 
        catch (QueryException $ex) 
        {
            $mensaje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }
}
