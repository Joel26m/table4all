<?php

namespace App\Http\Controllers\Api;

use Utilitat;
use Illuminate\Http\Request;
use App\Models\ProviderMenus;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\ProviderMenusResource;


class ProviderMenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providerMenus = ProviderMenus::all();
        return ProviderMenusResource::collection($providerMenus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $providerMenus = new ProviderMenus();
        $providerMenus->IDuser = $request->input('IDProvider');
        $providerMenus->latitude = $request->input('IDMenu');
        $providerMenus->longitude = $request->input('quantity');

        try 
        {
            $providerMenus->save();
            $response = (new ProviderResource($providerMenus))
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
     * Display the specified resource.
     *
     * @param  \App\Models\ProviderMenus  $providerMenus
     * @return \Illuminate\Http\Response
     */
    public function show($providerId)
    {
        // Busca todos los registros de ProviderMenus que pertenecen a un proveedor específico.
        $providerMenus = ProviderMenus::where('IDProvider', $providerId)->get();
    
        // Verifica si la colección está vacía
        if ($providerMenus->isEmpty()) {
            return response()->json(['message' => 'No menus found for this provider'], 404);
        }
    
        // Usando el Resource para formatear la salida
        return ProviderMenusResource::collection($providerMenus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProviderMenus  $providerMenus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProviderMenus $providerMenus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderMenus  $providerMenus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProviderMenus $providerMenus)
    {
        //
    }
}
