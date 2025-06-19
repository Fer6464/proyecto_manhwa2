@extends('layouts.app')

@section('imagen_usuario')
    {{ session('fotoperfil') ?? asset('archivos/foto.png') }}
@endsection

@section('nombre_usuario')
    {{ session('apodo') ?? 'invitado' }}
@endsection

@section('contenido')
<div class="container">
    <h2 class="mb-4">Capítulo {{ $capitulo->numero }}: {{ $capitulo->titulo }}</h2>
    <p><strong>Obra:</strong> {{ $capitulo->obra->nombre }}</p>

    <!-- Botones de navegación arriba -->
    <div class="d-flex justify-content-between my-3">
        @if($anterior)
            <a href="{{ route('manhwa.chapterview', $anterior->id) }}" class="btn btn-outline-secondary">
                ← Capítulo {{ $anterior->numero }}
            </a>
        @else
            <div></div>
        @endif

        @if($siguiente)
            <a href="{{ route('manhwa.chapterview', $siguiente->id) }}" class="btn btn-outline-secondary">
                Capítulo {{ $siguiente->numero }} →
            </a>
        @endif
    </div>

    <!-- Mostrar imágenes del capítulo -->
    @foreach($capitulo->imagenes as $imagen)
        <div class="mb-3 text-center">
            <img src="{{ asset($imagen->url) }}" class="img-fluid" alt="Imagen del capítulo">
        </div>
    @endforeach

    <!-- ✅ Botones de navegación abajo -->
    <div class="d-flex justify-content-between my-5">
        @if($anterior)
            <a href="{{ route('manhwa.chapterview', $anterior->id) }}" class="btn btn-outline-secondary">
                ← Capítulo {{ $anterior->numero }}
            </a>
        @else
            <div></div>
        @endif

        @if($siguiente)
            <a href="{{ route('manhwa.chapterview', $siguiente->id) }}" class="btn btn-outline-secondary">
                Capítulo {{ $siguiente->numero }} →
            </a>
        @endif
    </div>

    <div class="mt-3">
        <a href="{{ route('manhwa.show', $capitulo->obra->id) }}" class="btn btn-secondary">← Volver a la obra</a>
    </div>
</div>
@endsection
