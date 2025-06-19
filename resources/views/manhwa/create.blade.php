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
    <form action="{{ route('manhwa.store') }}" method="POST">
        @csrf
         <div class="mb-3">
            <label for="user_id" class="form-label">Id de usuario</label>
            <input type="text" name="user_id" class="form-control" value="{{ session('id') }}" readonly required>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Título de la obra</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="portada" class="form-label">URL de la portada</label>
            <input type="url" name="portada" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_creacion" class="form-label">Fecha de creación</label>
            <input type="date" name="fecha_creacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_finalizacion" class="form-label">Fecha de finalización</label>
            <input type="date" name="fecha_finalizacion" class="form-control" id="fecha_finalizacion">
            <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="sigueEmision" onchange="toggleFechaFinalizacion()">
                <label class="form-check-label" for="sigueEmision">
                    Sigue en emisión
                </label>
            </div>
            
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control">
                <option value="En emisión">En emisión</option>
                <option value="Finalizado">Finalizado</option>
                <option value="En Hiatus">En Hiatus</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select name="tags[]" class="form-control" multiple >
                @foreach(App\Models\Tag::all() as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->nombre }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">*Mantén Ctrl/Cmd presionado para seleccionar múltiples tags.</small>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
  </div>
</div>

<div class="ad-right">
  <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
</div>

<script>
    function toggleFechaFinalizacion() {
        const checkbox = document.getElementById('sigueEmision');
        const input = document.getElementById('fecha_finalizacion');
        input.disabled = checkbox.checked;
        if (checkbox.checked) input.value = ''; // Limpiar el campo si está deshabilitado
    }
</script>
@endsection
