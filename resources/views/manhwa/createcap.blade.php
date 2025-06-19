@extends('layouts.app')

@section('imagen_usuario')
    {{ session('fotoperfil') ?? asset('archivos/foto.png') }}
@endsection

@section('nombre_usuario')
    {{ session('apodo') ?? 'invitado' }}
@endsection

@section('estilos')
<!-- No se que hice aca pero sirve we-->
<style> 

       @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    .div_body {
        padding: 50px 17%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        font-family: 'Montserrat', sans-serif;
    }

    .login_form {
        background-color: #fff;
        padding: 2rem;
        border-radius: 15px;
        width: 100%;
     
    }

    .titulo {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    .btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
        background-color: #0cc0df;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0999ae;
    }
</style>

@endsection

@section('contenido')
<div class="ad-left">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
</div>
<div class="div_body">
    <div class="login_form">
    <h1>Subir Capítulo para: {{ $obra->nombre ?? 'Obra desconocida' }}</h1>
    <br>
        <form action="{{ route('manhwa.storeChapter', $obra->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

    
            <div class="mb-3">
                <label for="numero" class="form-label">Número de Capítulo</label>
                <input type="number" name="numero" class="form-control" value="{{ old('numero') }}">
                @error('numero')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título del Capítulo</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}">
                @error('titulo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imagenes" class="form-label">Imágenes del Capítulo</label>
                <input type="file" name="imagenes[]" class="form-control" multiple>
                @error('imagenes.*')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Subir Capítulo</button>
        </form>
    </div>
</div>
<div class="ad-right">
  <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
</div>
@endsection

