<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\ProviderResource;


class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        //$provider = Provider::where('IDuser', '=', 4)->first();


        return ProviderResource::collection($providers);
    }

    
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function collections($id)
    {
        $provider = Provider::with('collections')->find($id);

        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        return response()->json($provider->collections);
    }

    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->IDuser = $request->input('IDuser');
        $provider->latitude = $request->input('latitude');
        $provider->longitude = $request->input('longitude');
        $provider->quantityMenus = $request->input('quantityMenus');

        try 
        {
            $provider->save();
            $response = (new ProviderResource($provider))
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
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return new ProviderResource($provider);
    }

    public function showProfile() 
    {
        $providerId = session('providerId'); // Obtener el ID del proveedor de la sesión
        $provider = Provider::find($providerId); // Encuentra el proveedor por ID

        if ($provider) {
            // Mostrar la vista del perfil del proveedor con sus datos
            return view('provider.profile', ['provider' => $provider]);
        } else {
            // Redirigir o manejar el caso en que el proveedor no se encuentre
            return redirect('/somewhere-else')->with('error', 'Proveedor no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        try {
            // Actualizar solo la cantidad de menús, suponiendo que 'quantityMenus' es un campo en tu modelo Provider
            if ($request->has('quantityMenus')) {
                $quantityToDeduct = (int) $request->input('quantityMenus');
                $currentQuantity = (int) $provider->quantityMenus;
    
                // Asegúrate de que no deduces más de lo disponible
                if ($quantityToDeduct > $currentQuantity) {
                    return response()->json(['error' => 'Cantidad no disponible'], 400);
                }
    
                $provider->quantityMenus = $currentQuantity - $quantityToDeduct;
                $provider->save();
    
                return response()->json(new ProviderResource($provider), 200);
            } else {
                return response()->json(['error' => 'No se especificó la cantidad de menús para actualizar'], 400);
            }
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            return response()->json(['error' => $mensaje], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $Provider
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $Provider)
    {
        try 
        {
            $Provider->delete();
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