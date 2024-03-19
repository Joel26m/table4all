@extends('layouts.mainLogin')

@section('titulo.', 'login')

@section('contenido')

<div class="separador">
    <h3>INICIA SESIÓN</h3>
</div>
<div class="form-login">
<form class="login_formulario" action="{{action([App\Http\Controllers\UsersController::class, 'login']) }}" method="POST">
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
        @if (session('error'))
            
          <span class="badge text-bg-danger">{{session('error')}} </span>
            
        @endif

        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-primary" id="boton-login">INICIAR SESIÓN</button>
        </div>
       
        <div class="enlace_registro">
          <p>¿No tienes cuenta? <a href="http://" target="_blank" rel="noopener noreferrer">Registrate</a></p>
        </div>
      
      </form>
  </div>
    
@endsection
