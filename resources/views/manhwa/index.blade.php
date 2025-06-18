@extends('layouts.app')

@section('contenido')
        <div class="ad-left">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
        </div>

        <div class="main-content">
            <div class="title">Nuevos Lanzamientos:</div>
            <!-- solo un div de clase manga display sera colocado aqui dentro de un for-->
            <!-- generando las imagenes y titulos con sus respectivos links-->
            <div class="manga-display">
              <div class="manga">
                <img src="{{ asset('archivos/portada.jpg') }}" alt="ad" style="object-fit: contain; width: 100%; height: 100%;">
              </div>
              <a href="{{ route('manhwa.viewObra') }}" class="manga-titulo">nombre</a>
              <div class="manga-fecha">Fecha</div>
              <div class="manga-descripcion">Descripcion: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est.</div>
            </div>
            <div class="manga-display">
              <div class="manga">Manga2</div>
              <div class="manga-titulo">Nombre</div>
              <div class="manga-fecha">Fecha</div>
              <div class="manga-descripcion">Descripcion: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. </div>
            </div>
        </div>
      
        <div class="ad-right">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
        </div>

@endsection

