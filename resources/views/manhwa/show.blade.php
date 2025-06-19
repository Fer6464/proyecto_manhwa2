@extends('layouts.app')
@section('link')


@section('imagen_usuario')
    {{ session('fotoperfil') ?? asset('archivos/foto.png') }}
@endsection

@section('nombre_usuario')
    {{ session('apodo') ?? 'invitado' }}
@endsection

@endsection
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
<div class="ad-left">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
<div class="container">
    <div class="row justify-content-center" style="padding: 80px 0px;">
        
        <!-- Contenido principal -->
         <div class="col-md-8">
            <div class="text-center mb-4">
                <img src="{{ $obra->portada ?? '/images/placeholder.jpg' }}" class="img-thumbnail" style="max-width: 250px;" alt="Portada de la obra">
                <h2 class="mt-3">{{ $obra->nombre ?? 'Aquí iría el título' }}</h2>
                <p><strong>Autor:</strong> {{ $obra->autor ?? 'Desconocido' }}</p>
                <p><strong>Fecha de creación:</strong> 
                    {{ $obra->fecha_creacion ? \Carbon\Carbon::parse($obra->fecha_creacion)->format('d/m/Y') : 'No disponible' }}
                </p>
                <p><strong>Fecha de finalización:</strong> 
                    {{ $obra->fecha_finalizacion ?? 'Sigue en emisión' }}
                </p>
                <p>{{ $obra->descripcion ?? 'Sin descripción aún.' }}</p>
                @if($obra->tags->count())
                    <div class="mb-3">
                        <strong>Tags:</strong>
                        @foreach($obra->tags as $tag)
                            <span class="badge bg-info text-dark">{{ $tag->nombre }}</span>
                        @endforeach
                    </div>
                @else
                    <div class="mb-3">
                        <strong>Tags:</strong>
                        <span class="text-muted">Sin tags asignados</span>
                    </div>
                @endif
                <span class="badge bg-secondary">{{ $obra->estado }}</span>

                <div class="mt-3">
                    <a href="{{ route('manhwa.edit', $obra->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('manhwa.createChapter', $obra->id) }}" class="btn btn-primary">Subir Capítulo</a>
                    <form action="{{ route('manhwa.destroy', $obra->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta obra?');" class="d-inline">
                        @csrf
                        @method('DELETE')   

                        <input type="password" name="password" class="form-control d-inline w-auto" placeholder="Contraseña" required>
                        <button type="submit" class="btn btn-danger">Eliminar Obra</button>
                    </form>
                </div>
            </div>

            <h4>Capítulos:</h4>
            @if($obra->capitulos->count() > 0)
                <ul class="list-group">
                    @foreach ($obra->capitulos as $capitulo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <a href="{{ route('manhwa.chapterview', $capitulo->id) }}">
                                    Capítulo {{ $capitulo->numero }}: {{ $capitulo->titulo }}
                                </a>
                                <small class="text-muted"> | Subido el: {{ $capitulo->created_at->format('d/m/Y') }}</small>
                            </div>

                            <!-- Botón para mostrar formulario -->
                            <button class="btn btn-danger btn-sm" onclick="mostrarFormulario('{{ $capitulo->id }}')">Eliminar</button>

                            <!-- Formulario oculto -->
                            <form id="form-eliminar-{{ $capitulo->id }}" action="{{ route('manhwa.destroyChapter', $capitulo->id) }}" method="POST" class="d-none mt-2">
                                @csrf
                                @method('DELETE')
                                <input type="password" name="password" class="form-control form-control-sm my-1" placeholder="Contraseña">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Confirmar</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay capítulos aún. ¡Sube uno con el botón de arriba! 👆</p>
            @endif

            <footer class="mt-5">
                <p class="text-center">&copy; Nuestro sitio - Todos los derechos reservados<br><small>"Copyright NoCopien"</small></p>
            </footer>
        </div>

       
    </div>
</div>
<div class="ad-right">
          <img src="{{ asset('archivos/ad.png') }}" alt="ad" style="object-fit: cover; width: 100%; height: 100%;">
</div>
<script>
    function mostrarFormulario(id) {
        const form = document.getElementById('form-eliminar-' + id);
        form.classList.toggle('d-none');
    }
</script>   
@endsection


