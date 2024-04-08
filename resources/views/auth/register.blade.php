@extends('layouts.mainLogin')

@section('titulo.', 'login')

@section('contenido')

<div class="separador">
    <h3>REGISTARSE</h3>
</div>
<div class="form-login">
  <form class="login_formulario" action="{{ route('register') }}" method="POST">
@csrf
  <div class="d-grid gap-2" id="redes-login">
    <div class="b-redes d-flex justify-content-center"> 
      <button type="submit" class="btn btn-primary me-2" id="b-facebook"><i class="fa-brands fa-facebook"></i></button>
      <button type="submit" class="btn btn-primary" id="b-google"><i class="fa-brands fa-google"></i></button>
    </div>
  </div>
  
    <div class="mb-3">
          <label for="userName" class="form-label">NOMBRE DE USUARIO</label>
          <input type="text" class="form-control" id="userName" name="userName" value="{{old('userName')}}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">CONTRASEÑA</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="confirmPassword" class="form-label">CONFIRMAR CONTRASEÑA</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
          </div>


        @if (session('error'))
            
          <span class="badge text-bg-danger">{{session('error')}} </span>
            
        @endif

        <div class="mb-3">
          <label for="role" class="form-label">Tipus d'Usuari</label>
          <select class="form-select" id="role" name="role">
              <option value="provider">Provider</option>
              <option value="rider">Rider</option>
          </select>
        </div>

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary" id="boton-login">REGISTRARSE</button>
        </div>
       
        <div class="enlace_registro">
          <p>¿Ya tienes cuenta? <a href="{{action([App\Http\Controllers\UsersController::class, 'login']) }}" target="_blank" rel="noopener noreferrer">Incia sessión </a></p>
        </div>
      
      </form>
  </div>
    
@endsection
