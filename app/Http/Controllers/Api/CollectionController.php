<?php

namespace App\Http\Controllers\Api;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CollectionResource;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::with('rider')->get();

        return CollectionResource::collection($collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = new Collection();
        $collection->provider = $request->input('provider');
        $collection->quantityMenus = $request->input('quantityMenus');
        // $collection->rider = $request->input('rider');

    
        $collection->save();
    
        return response()->json(['message' => 'Reserva realizada con éxito', 'data' => $collection], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $collection = Collection::findOrFail($id);
        $collection->Completed = $request->input('completed', 1); // Suponemos que 'completed' viene en el request, o por defecto es 1
    
        try {
            $collection->save();
            return response()->json(['message' => 'Colección actualizada con éxito', 'data' => $collection], 200);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            return response()->json(['error' => $mensaje], 400);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $Collection
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
}
