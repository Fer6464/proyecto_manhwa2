
@extends('layouts.inputUser')


@section('inputcontenido')
    <div class="login_form">
        <form action="{{route('user.sesionstore')}}" method="post">
            @csrf
            @method('POST')
            <div class="titulo">Inicio sesión</div>
            <div class="mb-3">
                <input type="text" placeholder="Nombre de usuario" name="apodo" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Contraseña" name="contraseña" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
        <a href="{{ route('user.create') }}">No tienes una cuenta? Crea una!</a>
    </div>
@endsection
