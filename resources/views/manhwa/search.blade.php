@extends('layouts.app')

@section('imagen_usuario')
    {{ session('fotoperfil') ?? asset('archivos/foto.png') }}
@endsection

@section('nombre_usuario')
    {{ session('apodo') ?? 'invitado' }}
@endsection

@section('contenido')
        <div class="ad-left">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <div class="main-content">
          <div class="title-container">
              <div class="title">Resultados:</div>
          </div>

          @forelse($obras as $obra)
              <div class="manga-display">
                  <a href="{{ route('manhwa.show', $obra->id) }}" class="manga-cover-link">
                      <img src="{{ $obra->portada ?? '/images/placeholder.jpg' }}" class="manga-cover-img" alt="Portada de {{ $obra->nombre }}">
                  </a>
                  <div class="manga-info">
                      <a href="{{ route('manhwa.show', $obra->id) }}" class="manga-titulo">{{ $obra->nombre }}</a>
                      <div class="manga-autor"><strong>Autor:</strong> {{ $obra->autor }}</div>
                      <div class="manga-descripcion">{{ \Illuminate\Support\Str::limit($obra->descripcion, 150) }}</div>
                  </div>
              </div>
          @empty
              <p class="no-content-message">No existen resultados!</p>
          @endforelse
              
        </div>
        <div class="ad-right">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
@endsection