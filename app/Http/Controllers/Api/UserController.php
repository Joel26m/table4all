<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\UserController;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::all();
        //$User = User::where('IDuser', '=', 4)->first();


        return UserResource::collection($Users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $User = new User();
        $User->ID = $request->input('ID');
        $User->UserName = $request->input('userName');
        $User->Password = $request->input('password');

        $User->rol = $request->input('rol');

        try 
        {
            $User->save();
            $response = (new UserResource($User))
                        ->response()
                        ->setStatusCode(201);
        } 
        catch (QueryException $ex) 
        {
            $menasje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {

        $User->ID = $request->input('ID');
        $User->UserName = $request->input('userName');
        $User->Password = $request->input('password');
        $User->rol = $request->input('rol');

        try 
        {
            $User->save();
            $response = (new UserResource($User))
                        ->response()
                        ->setStatusCode(201);
        } 
        catch (QueryException $ex) 
        {
            $menasje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        try 
        {
            $User->delete();
            $response = \response()
                        ->json(['mensaje' => 'Registro borrado correctamente'], 200);
        } 
        catch (QueryException $ex) 
        {
            $menasje = Utilitat::errorMessage($ex);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
        }
        return $response;
    }
}

