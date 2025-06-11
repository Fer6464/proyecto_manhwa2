<!doctype html>
<html lang="en">




<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manhwa</title>
  <link rel="stylesheet" href="styles.css">
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
      color: rgb(0, 0, 0);
      text-decoration: none;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 10%;
      background-color: #0cc0df;
      position: fixed;
      width: 100%;
    }

    .contenedor {
      display: flex;
      align-items: center;
      background-color: #0cc0df;
      gap: 10px;
    }

    .pfp {
      background-color: white;
      border-color: white;
      border-radius: 100%;
      align-items: center;
      gap: 10px;
      width: 40px;
      height: 40px;
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

    .main-content {
      font-family: "Montserrat", sans-serif;
      margin: 0 14%;
      padding: 80px 30px;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      background-color: #ffffff;
    }

    .manga-display {
      margin: 0;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      background-color: #ffffff;
      grid-auto-rows: minmax(10px, auto);
      height: 200px;
    }

    .manga-titulo {
      padding: 5px 0px;
      padding-right: 5px;
      font-size: 15px;
      grid-column: 2/4;
      grid-row: 1;
    }

    .manga-fecha {
      padding: 5px 0px;
      padding-right: 5px;
      font-size: 15px;
      grid-column: 2/4;
      grid-row: 2;
    }

    .manga-descripcion {
      padding: 5px 0px;
      padding-right: 5px;
      font-size: 15px;
      grid-column: 2/4;
      grid-row: 3/10;
      align-self: stretch;


    }

    .manga {
      padding: 0px;
      height: 200px;
      grid-column: 1;
      grid-row: 1/3;
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
</head>
<body>
  <!-- Aqui falta modificar para manejar si el usuario inicio sesion o no con una instancia unica-->
  <!-- eso o la logica sera hecha con php y no aca-->
  <!-- Tambien falta modificar la barra buscadora con css para tener el boton de buscar "dentro" del input-->
    <header>
        <a class="aaa" href="#">Proyecto_Manhwa</a>
        <div>
            <form>
            <input class="buscador" placeholder="busca algo we" type="text" id="fname" name="fname"><button>Buscar</button>
            </form>
        </div>  
        <div class="contenedor">
        <img class="pfp" src="{{ asset('archivos/foto.png') }}" alt="pfp">
        <a class="cta"style="background-color: #0cc0df;" href="#">Nombre_Usuario</a>
        </div>
    </header>

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
          <div class="manga-titulo">Nombre</div>
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

</body>
