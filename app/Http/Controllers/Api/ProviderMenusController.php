<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Models\ProviderMenus;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\ProviderMenusResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
    public function show($providerId) {
        try {
            $providerMenus = ProviderMenus::where('IDProvider', $providerId)->get();
            if ($providerMenus->isEmpty()) {
                return response()->json(['message' => 'No menus found for this provider'], 404);
            }
            return ProviderMenusResource::collection($providerMenus);
        } catch (\Exception $e) {
            \Log::error('Error fetching provider menus', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Server error'], 500);
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProviderMenus  $providerMenus
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $providerId, $menuId)
{
    try {
        $provider = Provider::findOrFail($providerId);
        $menu = $provider->menus()->findOrFail($menuId);

        // Actualizar la cantidad en la tabla pivot
        $quantityToAdd = (int) $request->input('quantity');
        $currentQuantity = (int) $menu->pivot->quantity;
        $newQuantity = $currentQuantity + $quantityToAdd;

        $provider->menus()->updateExistingPivot($menuId, ['quantity' => $newQuantity]);

        return response()->json(['message' => 'Cantidad actualizada correctamente'], 200);
    } catch (ModelNotFoundException $ex) {
        return response()->json(['error' => 'Menú o proveedor no encontrado'], 404);
    } catch (QueryException $ex) {
        return response()->json(['error' => $ex->getMessage()], 400);
    }
}

    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProviderMenus  $providerMenus
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId)
{
    try {
        $providerMenu = ProviderMenus::findOrFail($menuId);
        $providerMenu->delete();

        return response()->json(['message' => 'Menú eliminado correctamente'], 200);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
        return response()->json(['error' => 'Menú no encontrado'], 404);
    } catch (\Exception $ex) {
        return response()->json(['error' => $ex->getMessage()], 500);
    }
}
}
