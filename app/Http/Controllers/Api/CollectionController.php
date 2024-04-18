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
    public function update(Request $request, Provider $Provider)
    {

        $collection->Rider = $request->input('rider');
        $collection->Provider = $request->input('provider');
        $collection->QuantityMenus = $request->input('quantityMenus');
        $collection->Date = $request->input('date');
        $collection->Completed = $request->input('completed');



        try 
        {
            $Collection->save();
            $response = (new CollectionResource($Collection))
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
