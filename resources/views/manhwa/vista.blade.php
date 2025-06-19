@extends('layouts.app')

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
    <div class="manga-display">
        <div class="manga">
            <img src="{{ asset('archivos/portada.jpg') }}" alt="ad" style="object-fit: contain; width: 100%; height: 100%;">
        </div>
        <div class="manga-titulo">Nombre</div>
        <div class="manga-fecha">Fecha</div>
        <div class="manga-descripcion">Descripcion: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aut cum eum id quos est.</div>
    </div>
    <div class="ad-right">
        <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
    </div>
@endsection