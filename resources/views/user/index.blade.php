@extends('layouts.app')

@section('estilos')
<style>
    .body_2 {
        font-family: "Montserrat", sans-serif;
        background-color: #ffffff;
        display: flex;
        justify-content: center;
        padding: 0px 13%;
        
    }

    .profile-card {
        width: 100%;
        top: 50px;
        position: relative;

    }

    .profile-banner {
        height: 280px;
    }

    .profile-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
    }

    .profile-content {
        padding: 20px;
        padding-left: 200px;
        padding-top: 40px; 
        background-color: #ffffff;
    }

    .profile-picture {
        position: absolute; 
        top: 175px;  
        left: 30px;
        width: 200px;
        height: 200px; 
        border: 5px solid #ffffff; 
        object-fit: cover;
    }

    .user-info {
        padding-left: 60px; 
    }

    .user-name {
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 8px 0; 
        color: #1c1e21;
    }

    .user-detail {
        font-size: 15px;
        color: #65676b;
        margin: 4px 0;
    }

    

</style>
@endsection

<!--aca tambien falta algo como session('fotoperfil') y lo mismo con el fondo de perfil-->
@section('imagen_usuario')
    {{ session( 'fotoperfil' )}}
@endsection

@section('nombre_usuario')
    {{ session('apodo') }}
@endsection

@section('opciones')
<a href="{{ route('user.edit', session('id')) }}">Editar Perfil</a>
<hr>
@endsection

@section('contenido')
    <div class="ad-left">
        <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
    </div>
    <div class="body_2">
        <div class="profile-card">
            <div class="profile-banner">
                <img src="{{ session('fondoperfil' )}}" alt="Banner del perfil">
            </div>

            <div class="profile-content">
                <img class="profile-picture" src="{{ session('fotoperfil') }}" alt="Foto de perfil">

                <div class="user-info">
                    <h1 class="user-name">{{session('apodo')}}</h1>
                    <p class="user-detail">Fecha de union: {{session('fecha_creacion')}}</p>
                    <p class="user-detail">Rol: {{session('rol')}}</p> 
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
            <div class="title">Obras subidos por el usuario:</div>
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
              <p class="no-content-message">Este usuario no subió nada!</p>
          @endforelse
    </div>
    <div class="ad-right">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
    </div>

@endsection