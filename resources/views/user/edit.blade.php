@extends('layouts.inputUser')

@section('inputcontenido')
    <div class="login_form">
        <form action="{{ route('user.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="titulo">Editar Usuario</div>

            <div class="mb-3">
                <input type="text" placeholder="Apodo" name="apodo" class="form-control" value="{{ old('apodo', $usuario->apodo) }}" required>
            </div>

            <div class="mb-3">
                <input type="text" placeholder="Contraseña" name="contraseña" class="form-control" value="{{ old('contraseña', $usuario->contraseña) }}" required>
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
                <input type="text" placeholder="Foto de perfil (opcional)" name="foto_perfil" class="form-control" value="{{ old('foto_perfil', $usuario->foto_perfil) }}">
            </div>

            <div class="mb-3">
                <input type="text" placeholder="Fondo de perfil (opcional)" name="fondo_perfil" class="form-control" value="{{ old('fondo_perfil', $usuario->fondo_perfil) }}">
            </div>

            <div class="mb-3">
                <input type="text" placeholder="Rol" name="rol" class="form-control" value="{{ old('rol', $usuario->rol) }}">
            </div>
            <button type="submit" class="btn">Actualizar</button>
        </form>
    </div>
    
@endsection