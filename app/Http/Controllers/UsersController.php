<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function showLogin()
    {
            //$user = new Users();
            //$user->userName = 'Joel123';
            //$user->password = \bcrypt('joel');
            //$user->rol = 'rider';

            //$user->save();

        return view('auth.login');
    }

    public function login(Request $request) {
        $userName = $request->input('userName');
        $password = $request->input('password');

        $user = Users::where('userName', $userName)->first();

        if ($user != null && Hash::check($password, $user->password) ) {
           Auth::login($user);

           $response = redirect('/home');
        }else {
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            $response = redirect('/login')->withInput();
        }
        return $response;
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        //
    }
}
