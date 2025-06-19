@extends('layouts.inputUser')

@section('inputcontenido')
    <div class="login_form">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="titulo">Crear Usuario</div>

            <div class="mb-3">
                <input type="text" placeholder="Apodo" name="apodo" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Contraseña" name="contraseña" class="form-control" required>
            </div>
            <div class="mb-3">
                <select name="genero" class="form-control" placeholder="Selecciona género" required>
                    <option value="Otro">Selecciona tu género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Foto de perfil (opcional)" name="foto_perfil" class="form-control">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Fondo de perfil (opcional)" name="fondo_perfil" class="form-control">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Rol" name="rol" class="form-control">
            </div>
            <button type="submit" class="btn">Crear</button>
        </form>
        <br>
        <a href="{{ route('user.login') }}">Ya tienes una cuenta? Inicia sesion!</a>
    </div>
    
@endsection