<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UsersController;

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
        // Verificar el rol del usuario
        if ($user->rol == 'provider') {
            $response = redirect('/home_provider');
        } elseif ($user->rol == 'rider') {
            $response = redirect('/welcome');
        } else {
            $response = redirect('/homeAdmin');
        }
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
    

    public function showRegister(){
        return view('auth.register');
    }

    
    public function register(Request $request)
    {

        $user = new Users();
        $user->userName = $request->input('userName');
        $user->password = Hash::make($request->input('password'));
        $user->rol = $request->input('rol'); // Emmagatzema el rol seleccionat
        $user->save();
    
        return redirect()->route('login')->with('success', 'Your account has been registered. Please log in.');

    }


    
    public function index()
    {
        $usuarios = Users::paginate(4)
        ->withQueryString();
        foreach ($usuarios as $usuario) {
            $usuario->activo_checkbox = $usuario->actiu ? 'checked' : '';
        }
        return view('usuaris\index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuaris\create');
    }

    public function store(Request $request)
    {
        try {
            $usuarios = new Users();
            $usuarios->nom_usuari = $request->input('nom_usuari');
            $usuarios->contrasenya= $request->input('contrasenya');
            $usuarios->correu= $request->input('correu');
            $usuarios->nom= $request->input('nom');
            $usuarios->cognom= $request->input('cognom');
            $usuarios->actiu = $request->input('activo');
            $usuarios->tipus_usuaris_id= $request->input('tipus_usuaris_id');
    
            $usuarios->actiu = ($request->input('activo') == 'activo');
            $usuarios->save();
            return redirect()->action([UsuarisController::class, 'index']);

        } catch (Exception $e) {
            // Catching the exception and handling it
            echo "Error: " . $e->getMessage();
        }
        
    
    }

    public function edit(Users $usuarios)
    {
    }

    public function update(Request $request, Users $usuarios)
    {

    }
        

    public function destroy(Users $usuarios, Request $request)
    {
        $usuarios->delete();

        return redirect()->action([UsersController::class, 'index']);
    }
}


