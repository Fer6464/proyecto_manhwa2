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
    https://i.pinimg.com/736x/30/6f/56/306f56b5f496dd5b3721ea779bf886de.jpg
@endsection

@section('nombre_usuario')
    {{ session('nombre') }}
@endsection

@section('contenido')
    <div class="ad-left">
        <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
    </div>
    <div class="body_2">
        <div class="profile-card">
            <div class="profile-banner">
                <img src="https://i.idol.st/u/card/art/2x/913UR-Tennoji-Rina-I-Like-Photography-More-Than-Before-Classical-Gothic-Mai-gnnomt.png" alt="Banner del perfil">
            </div>

            <div class="profile-content">
                <img class="profile-picture" src="https://i.pinimg.com/736x/30/6f/56/306f56b5f496dd5b3721ea779bf886de.jpg" alt="Foto de perfil">

                <div class="user-info">
                    <h1 class="user-name">{{session('nombre')}}</h1>
                    <p class="user-detail">Fecha cuando se unió: ...</p>
                    <p class="user-detail">Roles(o descripcion, que se yo): admin, traductor/a, editor/a</p>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
            <div class="title">Mangas Subidos por el usuario:</div>
            <!-- solo un div de clase manga display sera colocado aqui dentro de un for-->
            <!-- generando las imagenes y titulos con sus respectivos links-->
            <!-- como decia, copiar y pegar xd-->
            <div class="manga-display">
                <div class="manga">
                    <img src="{{ asset('archivos/portada.jpg') }}" alt="ad" style="object-fit: contain; width: 100%; height: 100%;">
                </div>
                <div class="manga-titulo">Nombre</div>
                <div class="manga-fecha">Fecha</div>
                <div class="manga-descripcion">Descripcion: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est.</div>
                </div>
            <div class="manga-display">
                <div class="manga">
                    <img src="{{ asset('archivos/portada.jpg') }}" alt="ad" style="object-fit: contain; width: 100%; height: 100%;">
                </div>
                <div class="manga-titulo">Nombre</div>
                <div class="manga-fecha">Fecha</div>
                <div class="manga-descripcion">Descripcion: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est.</div>
            </div>
        </div>
    <div class="ad-right">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
    </div>

@endsection