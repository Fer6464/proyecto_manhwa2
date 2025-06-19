<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manhwa</title>
  @yield('link')
  <!--Aca todo el css pq no se donde poner el archivo de css para conectar con el html xd-->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    li, a, button {
      font-family: "Montserrat", sans-serif;
      font-weight: 500;
      font-size: 16px;
      text-decoration: none;
    }

    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 2%; 
    background-color: #0cc0df;
    position: fixed;
    width: 100%;
    z-index: 1000; 
    gap: 20px;
  }

  .header-left, .header-center, .header-right {
      display: flex;
      align-items: center;
  }


  .header-left {
      flex: 1; 
  }

  .header-center {
      flex: 2; 
      justify-content: center;
  }

  .header-right {
      flex: 1; 
      justify-content: flex-end; 
  }

  .logo {
      font-weight: bold;
      font-size: 20px;
  }


  .search-form {
      display: flex;
      width: 100%;
      max-width: 450px;
  }

  .buscador {
      width: 100%; 
      border-radius: 20px 0 0 20px; 
      border-right: none;
  }

  .search-button {
      padding: 8px 15px;
      border: 2px solid #0cc0df;
      background-color: #0a9eb8;
      color: white;
      border-radius: 20px 20px 20px 20px; 
      cursor: pointer;
      font-family: "Montserrat", sans-serif;
  }

  .search-button:hover {
      background-color: #087a91;
  }


  .user-menu {
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative; 
  }

  .pfp {
      width: 40px;
      height: 40px;
      background-color: white;
      border-radius: 50%;
  }

  .username {
      font-weight: bold;
      color: #fff; 
      white-space: nowrap; 
  }


  .dropdown {
      position: relative;
      display: inline-block;
  }

  .dropdown-toggle {
      background: none;
      border: none;
      color: white;
      font-size: 18px;
      cursor: pointer;
      padding: 5px;
  }

  .dropdown-content {
      display: none; 
      position: absolute;
      right: 0; 
      top: 100%; 
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 5px;
      padding: 5px 0;
  }

  .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 14px;
  }

  .dropdown-content a:hover {
      background-color: #f1f1f1;
  }

  .user-menu:hover .dropdown-content {
      display: block;
  }

  .dropdown-content hr {
      border: 0;
      height: 1px;
      background: #e0e0e0;
      margin: 5px 0;
  }


    .buscador {
      background-color: #FFFFFF;
      padding: 8px 10px;
      width: 350px;
      text-align: start;
      border: 2px solid #0cc0df;
      border-radius: 20px;
      outline: none;
      font-size: 16px;
    }

    .ad-left, .ad-right {
      position: fixed;
      top: 50px;
      bottom: 0;
      width: 13%;

    }

    .ad-right {
      right: 0;
      left: auto;
    }

    .ad-left {
      left: 0;
    }

    /* Contenedor principal que organiza las tarjetas */
.main-content {
    font-family: "Montserrat", sans-serif;
    margin: 0 14%;
    padding: 80px 30px;
    display: grid;
    /* LA CLAVE: Dos columnas de fracción igual, creando el grid 2xN */
    grid-template-columns: repeat(2, 1fr);
    /* Define que las filas se creen automáticamente según sea necesario */
    grid-auto-rows: min-content;
    gap: 25px; /* Un poco más de espacio entre tarjetas */
}

/* Contenedor para el título y el botón de agregar */
.title-container {
    grid-column: 1 / -1; /* Ocupa las dos columnas */
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.title {
    font-size: 28px;
    font-weight: bold;
}

.btn-create {
    background-color: #0cc0df;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    white-space: nowrap;
}

/* --- ESTILOS DE LA TARJETA DE MANGA (LA PARTE MÁS IMPORTANTE) --- */

.manga-display {
    display: flex; /* Usamos Flexbox para el layout interno */
    flex-direction: row; /* Elementos internos en fila (imagen a la izquierda, info a la derecha) */
    gap: 15px;
    padding: 15px;
    background-color: #fdfdfd;
    border: 1px solid #eee;
    border-radius: 8px;
    
    /* LA SOLUCIÓN: Se establece una altura fija para todas las tarjetas. */
    /* Todas las tarjetas medirán 240px de alto, sin importar su contenido. */
    height: 240px; 
    
    /* Evita que el contenido interno se desborde si es muy largo */
    overflow: hidden; 
}

/* Columna de la portada (izquierda) */
.manga-cover-link {
    flex-shrink: 0; /* Evita que la imagen se encoja */
    width: 35%; /* Ancho fijo para la columna de la imagen */
}

.manga-cover-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Cubre el espacio asignado sin deformarse */
    border-radius: 4px;
}

/* Columna de la información (derecha) */
.manga-info {
    display: flex;
    flex-direction: column; /* Organiza el texto verticalmente */
    gap: 8px;
    /* Evita que la descripción se desborde del contenedor de información */
    overflow: hidden; 
}

.manga-titulo {
    font-size: 1.1em;
    font-weight: bold;
    color: #333;
    text-decoration: none;
}
.manga-titulo:hover {
    text-decoration: underline;
}

.manga-autor {
    font-size: 0.9em;
    color: #666;
}

.manga-descripcion {
    font-size: 0.9em;
    line-height: 1.5;
    color: #555;
    /* El texto que no quepa simplemente se cortará gracias al overflow:hidden del padre */
}

/* Mensaje cuando no hay contenido */
.no-content-message {
    grid-column: 1 / -1; /* Ocupa todo el ancho */
    text-align: center;
    padding: 40px;
    color: #888;
}

    .title {
      font-family: "Montserrat", sans-serif;
      grid-column: 1 / -1;
      font-size: 28px;
      font-weight: bold;
      text-align: left;
      margin-bottom: 20px;
      color: #444;
    }

    @media (max-width: 768px) {
      .ad-left, .ad-right {
        display: none;
      }

      .main-content {
        margin: 0;
        grid-template-columns: 1fr;
      }
    }
  </style>
  @yield('estilos')
</head>

<body>

    <header>
        <div class="header-left">
            <a href="{{ route('manhwa.index') }}" class="logo" style="color: #fff;">Proyecto_Manhwa</a>
        </div>

        <div class="header-center">
            <form action="{{ route('manhwa.search') }}" method="GET" class="search-form">
                <input class="buscador" placeholder="Buscar Manga/Manhwa/Webtoon..." type="search" id="search" name="search" value="{{ request('search') }}">
                <button type="submit" class="search-button">Buscar</button>
            </form>
        </div>

        <div class="header-right">
            <div class="user-menu">
                <img class="pfp" src="@yield('imagen_usuario')" alt="pfp">
                <a href="{{ route('user.index') }}" class="username">@yield('nombre_usuario', 'invitado')</a>
                <div class="dropdown">
                    <button class="dropdown-toggle">&#9662;</button>
                    <div class="dropdown-content">
                        <a href="{{ route('user.index') }}">Mi Perfil</a>
                        <hr>
                        @yield('opciones')
                        <a href="{{ route('logout') }}">Cerrar Sesión</a> 
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('contenido')
    </main>

</body>