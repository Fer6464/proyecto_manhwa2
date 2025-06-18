@extends('layouts.inputUser')

@section('inputContenido')
    <div class="login_form">
        <form action="{{route('user.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="titulo">INICIO SESION</div>
            <div class="mb-3">
                <input type="text" placeholder="Nombre de usuario..." name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="text" placeholder="Contraseña..." name="contraseña" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection