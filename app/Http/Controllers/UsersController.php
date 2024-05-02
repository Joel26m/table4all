<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Rider;
use App\Models\Provider;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UsersController;
use Symfony\Component\HttpFoundation\Request;

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
            $response = redirect('/home_provider'. $user->ID);
        } elseif ($user->rol == 'rider') {
            $response = redirect('/nav');
        } else {
            $response = redirect('/admin');
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
    
        $rol = $request->input('rol');

        switch ($rol) {
            case 'rider':
                $rider = new Rider();
                $rider->IDuser = $user->ID;
                $rider->rol = $user->rol;
                $rider->save();
                break;
            case 'provider':
                $provider = new Provider();
                $provider->IDuser = $user->ID;
                $provider->save();
                break;
            case 'admin':
                $admin = new Admin();
                $admin->IDuser = $user->ID;
                $admin->rol = $user->rol;
                $admin->save();
                break;
            default:
                break;
        }

        return redirect()->route('login')->with('success', 'Your account has been registered. Please log in.');
    }


    
    public function index()
    {
        // Obtener la cantidad de usuarios por rol
        $totalRiders = Users::where('rol', 'rider')->count();
        $totalProviders = Users::where('rol', 'provider')->count();
    
        // Obtener todos los usuarios
        $usuariosad = Users::all();
    
        // Pasar los datos a la vista
        return view('usuariosad.index', compact('usuariosad', 'totalRiders', 'totalProviders'));
    }
    

    public function create()
    {
        return view('usuariosad\create');
    }

    public function store(Request $request)
    {
        try {
            $usuariosad = new Users();
            $usuariosad->userName = $request->input('userName');
            $usuariosad->password= $request->input('password');
            $usuariosad->rol= $request->input('rol');
       
    
            $usuariosad->save();
            return redirect()->action([UsersController::class, 'index']);

        } catch (Exception $e) {
            // Catching the exception and handling it
            echo "Error: " . $e->getMessage();
        }
        
    
    }
    public function edit($ID)
    {
        $usuario = Users::findOrFail($ID);
        return view('usuariosad.edit', ['usuario' => $usuario]);
    }
    

    public function update(Request $request, $admin)
    {

        try {
            $usuario = Users::findOrFail($admin);
            
            // Actualizar los campos con los nuevos valores del formulario
            $usuario->userName = $request->input('userName');
            $usuario->password = $request->input('password');
            $usuario->rol = $request->input('rol');
          
    
            // Verificar si se proporcionó una nueva contraseña
            $nuevaContrasenya = $request->input('password');
            if ($nuevaContrasenya) {
                $usuario->password = bcrypt($nuevaContrasenya);
            }
    
            $usuario->save();
            
            return redirect()->action([UsersController::class, 'index']);
    
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

    }
        

    public function destroy(Request $request, $admin)
    {
        $usuario = Users::findOrFail($admin);
    
        try {
            $usuario->delete();
            $request->session()->flash('mensaje', 'El usuario ha sido eliminado correctamente.');
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
        }
    
        return redirect()->action([UsersController::class, 'index']);
    }
    



}


