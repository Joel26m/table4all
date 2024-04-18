<?php

namespace App\Http\Controllers\Api;

use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $collection->collection = $request->input('collection');
        $collection->beneficiary = $request->input('beneficiary');
        $collection->completed = $request->input('completed');
        $collection->quantityMenus = $request->input('quantityMenus');


        try 
        {
            $collection->save();
            $response = (new CollectionResource($collection))
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
     * @param  \App\Models\Deliveries  $deliveries
     * @return \Illuminate\Http\Response
     */
    public function show(Deliveries $deliveries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deliveries  $deliveries
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliveries $deliveries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deliveries  $Deliveries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliveries $Deliveries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deliveries  $deliveries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliveries $deliveries)
    {
        //
    }
}
