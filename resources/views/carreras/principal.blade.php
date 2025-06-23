<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Apuestas de Galgos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css"/>
<style>
html, body {
    overflow-x: hidden;
    overflow-y: hidden;
}

    body {
        position: relative;
        /* Ya no necesitas display: flex; aquí, el main-content-wrapper lo manejará */
        margin: 0; /* Es mejor controlar los márgenes con el nuevo contenedor */
        background-color: #f0f0f0;
        /* Añadir un min-height para que el body ocupe al menos toda la ventana */
        min-height: 110vh; 
        display: flex; /* Mantenemos display: flex; en el body */
        flex-direction: column; /* Apilamos los elementos verticalmente */
        align-items: center; /* Centramos el contenido horizontalmente */
    }

    .video-fondo {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 105%;
        overflow: hidden;
        z-index: -1;
    }

    #fondo-video {
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        position: absolute;
        top: 48%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* NUEVOS ESTILOS PARA EL CONTENEDOR PRINCIPAL */
    .main-content-wrapper {
        display: flex; /* Habilita flexbox para las columnas */
        justify-content: center; /* Centra las columnas horizontalmente */
        align-items: flex-start; /* Alinea las columnas en la parte superior */
        width: 100%; /* Ocupa todo el ancho disponible */
        max-width: 1400px; /* Establece un ancho máximo para el diseño */
        margin-top: 2rem; /* Ajusta este margen para dejar espacio al card-top */
        padding: 0 20px; /* Pequeño padding para los lados */
        box-sizing: border-box; /* Incluye padding en el ancho total */
    }

    .columna-derecha {
        /* Ajustamos el width para que sea más flexible dentro del flexbox */
        flex-basis: 15%; /* Define el tamaño base */
        padding-left: 20px;
        border-left: 1px solid #ccc;
    }

    h2 {
        margin-top: 0;
    }

    #proximas-carreras-lista, #carreras-finalizadas-lista, #competidores-lista {
        list-style: none;
        padding: 0;
    }

    .proxima-carrera {
        margin-bottom: 15px;
        border: 1px solid #eee;
        padding: 10px;
    }

    .participante {
        margin-bottom: 5px;
    }

    .competidor {
        margin-bottom: 8px;
        padding: 8px;
        border-bottom: 1px dashed #ddd;
    }

    .carrera-finalizada {
        margin-bottom: 10px;
        padding: 3px;
        border-bottom: 1px dashed #ddd;
        padding-bottom: 10px;
    }

    #video-player {
        width: 100%;
        height: auto;
    }

    #ganadores-container {
        margin-top: 15px;
        font-weight: bold;
    }

    .fullscreen-video-container {
        position: fixed;
        top: -15px;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        background-color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fullscreen-video-container video {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .icono-posicion {
        width: 50px;
        height: auto;
        margin-right: 5px;
        vertical-align: middle;
    }
    
    .icono-posicion2 {
        width: 180px;
        height: auto;
        margin-right: 5px;
        vertical-align: middle;
    }

    .icono-salida-ganador {
        width: 30px !important;
        height: auto;
        margin-right: 5px;
        vertical-align: middle;
    }

    .iconos-salida {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-top: 5px;
    }

    .iconos-llegada {
        margin-top: 5px;
        font-size: 0.8em;
    }

    #siguiente-carrera-info {
        padding: 10px;
        border-bottom: 1px solid #eee;
        margin-bottom: 10px;
    }

    #siguiente-carrera-info h2#siguiente-carrera-titulo {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 0;
        font-size: 1.3em;
    }

    #temporizador-container {
        display: flex;
        align-items: center;         /* 🔑 Centra verticalmente */
        justify-content: center;     /* Centra horizontalmente */
        gap: 40px;                   /* Espacio entre texto y temporizador */
        height: 100px;               /* Ajusta a tu necesidad */
        text-align: center;
    }

    #temporizador-container .texto-fijo {
        font-size: 1.5rem;           /* Tu tamaño original */
        line-height: 1;              /* Elimina espacio vertical innecesario */
    }

    #temporizador-container .time {
        font-size: 2rem;             /* Tu tamaño original del temporizador */
        line-height: 1;              /* Para que no se desplace verticalmente */
    }


    #competidores-container {
        /* Quitamos flex-grow: 1; de aquí para que la tabla pueda crecer más */
        padding: 10px;
        background: #023c67;
        border-top-left-radius: 35px;
        border-bottom-right-radius: 35px;
        margin: 10px;
    }

    #competidores-container h3 {
        margin-top: 0;
        margin-bottom: 10px;
    }

    #competidores-lista {
        list-style-type: none;
        padding: 0;
        margin: 0;
        overflow-y: auto;
        max-height: auto;
    }

    #competidores-lista li {
        padding: 2px 0;
        border-bottom: 1px solid #f2f2f2;
    }

    #competidores-lista li:last-child {
        border-bottom: none;
    }

    #video-container {
        margin-top: 15px;
    }

    #siguiente-carrera-titulo {
        white-space: pre-line;
    }



    .card-i {
        border: 1px solid black;
        border-radius: 0.75rem;
        /* Usamos flex-basis para el ancho en un flex container */
        flex-basis: 15%; 
        height: auto; /* Ajusta la altura a auto para que se adapte al contenido */
        padding-right: 20px;
        margin: 1rem;
        background:  #021F3D;
        background: linear-gradient(177deg,rgba(2, 31, 61, 1) 0%, rgba(1, 17, 33, 1) 50%, rgba(0, 5, 8, 1) 100%);
        color: white; /* Cambia el color del texto a blanco para mejor contraste */
        /* margin-top: 6rem; ya no es necesario aquí, lo maneja el main-content-wrapper */
        box-sizing: border-box; /* Muy importante para el padding */
    }

    .card-i h2 {
        text-align: center;
        margin-top: 1rem;
        font-size: 12px;
    }

    .card-i ul {
        text-align: center;
    }

    .card-c {
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        /* Usamos flex-basis para el ancho en un flex container */
        flex-basis: 70%; 
        margin: 1rem;
        background:  #021F3D;
        background: linear-gradient(177deg,rgba(2, 31, 61, 1) 0%, rgba(1, 17, 33, 1) 50%, rgba(0, 5, 8, 1) 100%);
        color: white; /* Cambia el color del texto a blanco para mejor contraste */
        /* margin-top: 6rem; ya no es necesario aquí, lo maneja el main-content-wrapper */
        box-sizing: border-box; /* Muy importante para el padding */
        
        font-weight: bold;
        border-top-left-radius: 35px;
        border-bottom-right-radius: 35px;
    }

    .card-c h2 {
        text-align: center;
        margin-top: 1rem;
        font-size: 12px;
    }

    .card-d {
        border: 1px solid black;
        border-radius: 0.75rem;
        /* Usamos flex-basis para el ancho en un flex container */
        flex-basis: 15%; 
        padding-right: 20px;
        margin: 1rem;
        background:  #021F3D;
        background: linear-gradient(177deg,rgba(2, 31, 61, 1) 0%, rgba(1, 17, 33, 1) 50%, rgba(0, 5, 8, 1) 100%);
        color: white; /* Cambia el color del texto a blanco para mejor contraste */
        /* margin-top: 6rem; ya no es necesario aquí, lo maneja el main-content-wrapper */
        box-sizing: border-box; /* Muy importante para el padding */
        height: 33rem;
    }

    .card-d h2 {
        text-align: center;
        margin-top: 1rem;
        font-size: 12px;
    }

    .card-d ul {
        text-align: center;
    }

    .circuito-container {
        position: absolute;
        top: 420px; /* Considera si esta posición absoluta es la deseada o si se puede ajustar con flexbox */
        left: 0;
        z-index: 9999;
        width: 300px;
        height: 200px;
        border: 2px solid #333;
        border-radius: 50%;
        transform: rotate(0deg);
        background-color: transparent;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        pointer-events: none;
    }

    .pista {
        width: 100%;
        height: 100%;
        border: 2px dashed #555;
        border-radius: inherit;
    }

    .vehiculo {
        width: 20px;
        height: 20px;
        position: absolute;
        z-index: 11;
        background-color: #86ff33;
        border-radius: 50%;
    }

    .meta {
        position: absolute;
        width: 20px;
        height: 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        left: 184px;
        top: 190px;
        transform: translate(-50%, -50%);
        z-index: 999;
    }

    .cuadro {
        background-color: white;
        width: 100%;
        height: 100%;
    }

    .cuadro-negro {
        background-color: black;
    }

    #tabla-probabilidades-container {
        margin-left: 20px;
        display: flex;
        flex-direction: column;
        flex-grow: 1; /* Esto permitirá que el contenedor de la tabla se expanda */
    }

    #tabla-probabilidades-container h3 {
        margin-top: 0;
        margin-bottom: 10px;
        text-align: center;
    }

    #tabla-probabilidades {
        border-collapse: separate;
        border-spacing: 0;
        width: 97%;
        margin: 0.5rem;
        overflow: hidden;
        border-top-left-radius: 16px;
        border-bottom-right-radius: 16px;
    }

    #tabla-probabilidades th, #tabla-probabilidades td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }

    #tabla-probabilidades th {
        background-color: #f2f2f2;
    }

    /* ESTILOS PARA LAS SEIS CARDS INFERIORES */
    .cards-inferiores-container {
        display: flex;
        justify-content: center; /* Centra las cards horizontalmente */
        align-items: flex-start;
        flex-wrap: wrap;
        margin-top: 20px; /* Espacio superior para separarlo del contenido de arriba */
        gap: 10px;
        width: 100%; /* Ocupa el 100% del body */
        max-width: 1400px; /* Limita el ancho al mismo que el main-content-wrapper */
        box-sizing: border-box; /* Importante para que el padding no desborde */
        padding: 0 20px; /* Añade un padding para los lados */
    }

    

    @keyframes rotar360 {
  from {
    transform: rotateY(0deg);
  }
  to {
    transform: rotateY(360deg);
  }
}
    .card-pequena {
            background:  #021F3D;
        background: linear-gradient(177deg,rgba(2, 31, 61, 1) 0%, rgba(1, 17, 33, 1) 50%, rgba(0, 5, 8, 1) 100%);
        color: white; /* Cambia el color del texto a blanco para mejor contraste */
            border: 1px solid #ccc;
            border-radius: 0.75rem;
            padding: 10px;
            text-align: left;
            box-sizing: border-box;
            flex: 1 1 calc(16.66% - 20px);
            max-width: calc(16.66% - 10px);
            min-width: 100px;
            margin-bottom: 10px;

            opacity: 0;
            transform: translate(-40px, -40px);
            transition: opacity 0.4s ease, transform 0.4s ease;
            transform-style: preserve-3d;
            backface-visibility: hidden;
        }

        .card-pequena.visible {
            opacity: 1;
            transform: translate(0, 0);
        }

        @keyframes parpadeo {
        0%   { opacity: 1; }
        50%  { opacity: 0; }
        100% { opacity: 1; }
        }

        .card-pequena.animar {
        animation: parpadeo 1.5s ease-in-out 1;
        }

    /* Media Queries para responsividad */
    @media (max-width: 1200px) {
        .main-content-wrapper {
            flex-direction: column; /* Apila las columnas verticalmente */
            align-items: center; /* Centra las columnas apiladas */
        }
        .card-i, .card-c, .card-d {
            flex-basis: auto; /* Permite que tomen el ancho completo */
            width: 90%; /* Ajusta el ancho para que ocupen más espacio */
            margin: 1rem 0; /* Ajusta los márgenes para la nueva disposición */
            padding-right: 0; /* Quita el padding de la derecha si ya no tiene borde */
            border-left: none; /* Quita el borde si las columnas ya no están lado a lado */
        }
        .card-c {
            width: 95%; /* La card central puede ser un poco más ancha */
        }
        .card-d {
             padding-left: 0;
        }

        .cards-inferiores-container {
            padding: 0 10px;
        }
        .card-pequena {
            flex: 1 1 calc(33.33% - 15px); /* 3 cards por fila */
            max-width: calc(33.33% - 15px);
        }
    }

    @media (max-width: 768px) {
        .card-pequena {
            flex: 1 1 calc(50% - 10px); /* 2 cards por fila */
            max-width: calc(50% - 10px);
        }
        .card-top {
            width: 90%; /* Ajusta el ancho de la card superior en pantallas pequeñas */
        }
    }

    @media (max-width: 480px) {
        .card-pequena {
            flex: 1 1 98%; /* 1 card por fila */
            max-width: 98%;
        }
    }


    .nombre{
        text-align: center;
        font-weight: bold;
        font-size: 1.2em;
    }

    @keyframes animateBackground {
    0% {
        transform: translate3d(0, 0, 0);
    }
    100% {
        transform: translate3d(0, -396px, 0);
    }
    }

    .estadisticas-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 200%;
    height: 200%;
    background: repeating-linear-gradient(
        45deg,
        rgb(27, 57, 89),
        rgb(27, 57, 89) 70px,
        rgb(31, 64, 100) 70px,
        rgb(31, 64, 100) 140px
    );
    animation: animateBackground 5s linear infinite;
    transform: rotate(20deg);
    z-index: 0;
    opacity: 0.2;
    pointer-events: none;
    }

    svg {
        width: 100%;
        height: auto;
        perspective: 1000px;
    }

    g {
        transform-origin: center;
        transform-style: preserve-3d;
    }

    .offen {
        transform: rotateY(-90deg);
        animation: girarFrente 0.6s ease-out forwards;
    }

    .rollback {
        /* se aplica junto con .offen, opcional */
    }

    .notoffen.roll {
        transform: rotateY(90deg);
        animation: girarAtras 0.6s ease-out forwards;
    }

    @keyframes girarFrente {
        to {
        transform: rotateY(0deg);
        }
    }

    @keyframes girarAtras {
        to {
        transform: rotateY(0deg);
        }
    }

    .time { 
            font-size: 50px;
        }


        /* Transiciones suaves */
    #competidores-container,
    #tabla-probabilidades-container,
    #tabla-probabilidades {
    transition: opacity .5s ease, transform .5s ease;
    }

    /* 1) Ocultar competidores */
    .ocultar {               /* nombre genérico para reusar si quieres */
    opacity: 0;
    pointer-events: none;  /* evita clics mientras está oculto */
    }

    /* 2) Agrandar probabilidades */
    .expandir {
    transform: scale(1.15);   /* ajusta el factor a tu gusto */
    }
    .expandir-flex {
  flex-grow: 1;
}

</style>

</head>
<body>
<div class="video-fondo">
    <video id="fondo-video" autoplay loop muted playsinline>
        <source src="assets/otros/background_video.mp4" type="video/mp4">
        Tu navegador no soporta la reproducción de video.
    </video>
</div>
{{-- <svg viewBox="0 0 1200 600">
  <g class="notoffen roll" style="animation-delay: 250ms;">
    <polygon points="728.677 215.373 691.632 279.539 798.844 279.539 835.889 215.373 728.677 215.373" fill="#4CAF50"/>
  </g>
  <g class="offen rollback" style="animation-delay: 270ms;">
    <polygon points="825.284 111.125 999.465 111.125 1045.402 31.558 871.221 31.558 825.284 111.125" fill="#2196F3"/>
  </g>
  <g class="offen rollback" style="animation-delay: 450ms;">
    <polygon points="900.437 279.539 1009.198 279.539 1055.136 199.972 946.375 199.972 900.437 279.539" fill="#FF5722"/>
  </g>
</svg> --}}
{{-- <div class="card-top">
    <h2>Próximas Carreras</h2>
</div> --}}

<div class="main-content-wrapper">
    <div class="card-i">
        <h2 >Próxima Carrera</h2>
        <ul class="animated infinite pulse" id="proximas-carreras-lista">
        </ul>
        <div class="circuito-container">
            <div class="pista"></div>
            <div class="meta">
                <div class="cuadro cuadro-negro"></div>
                <div class="cuadro"></div>
                <div class="cuadro cuadro-negro"></div>
                <div class="cuadro"></div>
                <div class="cuadro"></div>
                <div class="cuadro cuadro-negro"></div>
                <div class="cuadro"></div>
                <div class="cuadro cuadro-negro"></div>
            </div>
            <div class="vehiculo"></div>
        </div>
    </div>  
    
    <div class="card-c columna-central">
        <div class="estadisticas-background"></div> 
        <h2 id="siguiente-carrera-titulo">Siguiente Carrera</h2>
        <div id="temporizador-container">
        <span class="texto-fijo">EL SIGUIENTE EVENTO COMENZARÁ EN:  </span>
        <span class="time animated infinite bounceOut" id="tiempo-restante">01:45</span>
        </div>
        <div style="display: flex;">
            <div id="competidores-container">
                <ul id="competidores-lista">
                </ul>
            </div>
            <div id="tabla-probabilidades-container">
                <table id="tabla-probabilidades">
                    <thead>
                        <tr>
                            <th></th>
                            <th><img src="assets/iconos/1.png" alt="Perro 1" style="width: 25px; height: 25px;"></th>
                            <th><img src="assets/iconos/2.png" alt="Perro 2" style="width: 25px; height: 25px;"></th>
                            <th><img src="assets/iconos/3.png" alt="Perro 3" style="width: 25px; height: 25px;"></th>
                            <th><img src="assets/iconos/4.png" alt="Perro 4" style="width: 25px; height: 25px;"></th>
                            <th><img src="assets/iconos/5.png" alt="Perro 5" style="width: 25px; height: 25px;"></th>
                            <th><img src="assets/iconos/6.png" alt="Perro 6" style="width: 25px; height: 25px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><img src="assets/iconos/1.png" alt="Perro 1" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                        <tr>
                            <th><img src="assets/iconos/2.png" alt="Perro 2" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                        <tr>
                            <th><img src="assets/iconos/3.png" alt="Perro 3" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                        <tr>
                            <th><img src="assets/iconos/4.png" alt="Perro 4" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                        <tr>
                            <th><img src="assets/iconos/5.png" alt="Perro 5" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                        <tr>
                            <th><img src="assets/iconos/6.png" alt="Perro 6" style="width: 24px; height: 24px;"></th>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                            <td data-probabilidad=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="video-container" style="display: none;">
                <video id="video-player" controls autoplay muted></video>
                <div id="ganadores-container" style="display: none;">
                    <h3>Ganadores</h3>
                    <ul id="ganadores-lista">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card-d columna-derecha">
        <h2>Carreras Finalizadas</h2>
        <ul id="carreras-finalizadas-lista">
        </ul>
    </div>
</div> 
    <div class="cards-inferiores-container">
<div id="card-1" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/01.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>
<div id="card-2" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/02.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>
<div id="card-3" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/03.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>
<div id="card-4" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/04.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>
<div id="card-5" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/05.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>
<div id="card-6" class="card-pequena">
    <img class="icono-posicion2" src="http://localhost:8000/assets/iconos/06.png" alt="Posición 1">
    <div class="nombre animated infinite fadeIn"></div>
    <div class="peso"></div>
    <div class="tamaño"></div>
    <div class="victorias"></div>
    <div class="velocidad"></div>
</div>



</div>
<script src="/js/temporizador.js"></script>

<script>
    let tiempoRestante = 0;     // segundos hasta que arranque la carrera
    let intervaloCuentaAtras;   // id devuelto por setInterval

</script>
<script>
        const TemporizadorCompartido = {
        iniciarTemporizador: function () {
            const tiempoRestanteElement = document.getElementById('tiempo-restante');
            let tiempoObjetivo = parseInt(localStorage.getItem('horaObjetivo'), 10);

            if (!tiempoObjetivo || isNaN(tiempoObjetivo)) {
                tiempoObjetivo = Date.now() + 120000;
                localStorage.setItem('horaObjetivo', tiempoObjetivo);
            }

            function actualizar() {
                const ahora = Date.now();
                const restante = Math.max(0, Math.floor((tiempoObjetivo - ahora) / 1000));
                const min = String(Math.floor(restante / 60)).padStart(2, '0');
                const seg = String(restante % 60).padStart(2, '0');
                tiempoRestanteElement.textContent = `${min}:${seg}`;

                if (restante === 90) window.dispatchEvent(new Event('hito-90s'));
                if (restante === 0) {
                    window.dispatchEvent(new Event('hito-0s'));
                    clearInterval(intervalo);
                }
            }

            actualizar();
            const intervalo = setInterval(actualizar, 1000);
        }
    };

    // === Eventos globales de tiempo ===
    window.addEventListener('hito-90s', () => {
        document.getElementById('competidores-container').style.display = 'none';
        document.getElementById('tabla-probabilidades-container')?.classList.add('expandir-flex');
        document.getElementById('tabla-probabilidades')?.classList.add('expandir-flex');
    });

    window.addEventListener('hito-0s', () => {
        document.getElementById('temporizador-container').style.display = 'none';
        mostrarVideoCarrera();

        const circuito = document.querySelector('.circuito-container');
        const vehiculo = document.querySelector('.vehiculo');

        if (circuito) circuito.style.opacity = 1;
        if (vehiculo) vehiculo.style.opacity = 1;

        tiempoInicio = performance.now();
        requestAnimationFrame(animarVehiculo);

        setTimeout(() => {
            if (circuito) circuito.style.opacity = 0;
            if (vehiculo) vehiculo.style.opacity = 0;
        }, 2500);
    });
</script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const proximasCarrerasLista = document.getElementById('proximas-carreras-lista');
            const competidoresLista = document.getElementById('competidores-lista');
            const videoContainer = document.getElementById('video-container');
            const videoPlayer = document.getElementById('video-player');
            const ganadoresContainer = document.getElementById('ganadores-container');
            const ganadoresLista = document.getElementById('ganadores-lista');
            const carrerasFinalizadasLista = document.getElementById('carreras-finalizadas-lista');
            let listaProximasCarreras = [];
            let carreraEnCurso = null;
            let tiempoInicio = null;
            let temporizador = null;
            function obtenerDatosCarreras() {
                fetch('/api/carreras/data')
                    .then(response => response.json())
                    .then(data => {
                        const nuevasCarreras = data.proximas_carreras;
                        console.log('Nuevas carreras recibidas:', nuevasCarreras);
                        console.log('Lista de próximas carreras actual:', listaProximasCarreras);

                        nuevasCarreras.forEach(nuevaCarrera => {
                            const existe = listaProximasCarreras.some(carrera => carrera.carrera_id === nuevaCarrera.carrera_id);
                            if (!existe) {
                                listaProximasCarreras.push(nuevaCarrera);
                                console.log('Añadiendo nueva carrera:', nuevaCarrera);
                            }
                        });

                        // Filtrar la lista para mantener solo las carreras que aún están en la respuesta del backend
                        listaProximasCarreras = listaProximasCarreras.filter(carreraExistente =>
                            nuevasCarreras.some(nuevaCarrera => nuevaCarrera.carrera_id === carreraExistente.carrera_id)
                        );

                        renderProximasCarreras();
                        console.log('Datos de carreras finalizadas recibidos:', data.carreras_finalizadas);
                        renderCarrerasFinalizadas(data.carreras_finalizadas);

                        if (listaProximasCarreras.length > 0 && !carreraEnCurso) {
                            iniciarCarrera(listaProximasCarreras.shift());
                        }
                        console.log('Lista de próximas carreras después de actualización:', listaProximasCarreras);
                    })
                    .catch(error => {
                        console.error('Error al obtener los datos de las carreras:', error);
                    });
            }
            function mostrarIdCarreraEnCurso(carreraId) {
                const carreraIdElement = document.getElementById('carrera-en-curso-id');
                if (carreraIdElement) {
                    carreraIdElement.textContent = `ID de Carrera: ${carreraId}`;
                } else {
                    const carreraIdParagraph = document.createElement('p');
                    carreraIdParagraph.id = 'carrera-en-curso-id';
                    carreraIdParagraph.textContent = `ID de Carrera: ${carreraId}`;
                    document.querySelector('div > h2').insertAdjacentElement('afterend', carreraIdParagraph);
                }
            }
            function renderProximasCarreras() {
                const listaProximasCarrerasElement = document.getElementById('proximas-carreras-lista');
                const siguienteCarreraTituloElement = document.getElementById('siguiente-carrera-titulo');
                listaProximasCarrerasElement.innerHTML = '';

                if (listaProximasCarreras.length > 0) {
                    const siguienteCarrera = listaProximasCarreras[0];
                    siguienteCarreraTituloElement.textContent = `Siguiente Carrera: ${siguienteCarrera.carrera_id} `;
                    fetch(`/api/carreras/${siguienteCarrera.carrera_id}/detalles`)
                        .then(response => response.json())
                        .then(detallesCarrera => {
                            if (detallesCarrera && detallesCarrera.pista && detallesCarrera.metros_pista) {
                                siguienteCarreraTituloElement.textContent += 
                                    `\nPista: ${detallesCarrera.pista}\nMetros: ${detallesCarrera.metros_pista}mts`;
                            } else {
                                console.warn(`Detalles inválidos para carrera ${siguienteCarrera.carrera_id}:`, detallesCarrera);
                                siguienteCarreraTituloElement.textContent += `\n(No se pudieron obtener detalles de pista)`;
                            }
                        })
                    listaProximasCarreras.forEach(carrera => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `Carrera #${carrera.carrera_id}`;
                        listaProximasCarrerasElement.appendChild(listItem);
                    });
                } else {
                    siguienteCarreraTituloElement.textContent = 'No hay carreras programadas.';
                }
            }
            function renderCompetidores(carrera) {
            const competidoresLista = document.getElementById('competidores-lista');
            competidoresLista.innerHTML = '';
            if (carrera && carrera.participantes) {
                carrera.participantes.forEach(participante => {
                    const listItem = document.createElement('li');
                    listItem.classList.add('competidor');
                    const iconoPosicion = document.createElement('img');
                    iconoPosicion.src = `/assets/iconos/${participante.posicion_salida}.png`;
                    iconoPosicion.alt = `Posición ${participante.posicion_salida}`;
                    iconoPosicion.classList.add('icono-posicion');
                    const nombreSpan = document.createElement('span');
                    nombreSpan.textContent = participante.nombre;
                    const posicionSpan = document.createElement('span');
                    posicionSpan.classList.add('posicion-salida-texto');
                    listItem.appendChild(iconoPosicion);
                    listItem.appendChild(nombreSpan);
                    competidoresLista.appendChild(listItem);
                });
            }
        }

       
            // === Variables globales ===
            let tiempoRestante = 120;

            // === Funciones principales ===
            function mostrarVideoCarrera() {
                if (!carreraEnCurso || !carreraEnCurso.video_path) {
                    console.error("No hay carrera en curso o falta video_path.");
                    return;
                }

                const videoContainer = document.getElementById('video-container');
                const videoPlayer = document.getElementById('video-player');

                document.getElementById('competidores-container').style.display = 'none';
                videoContainer.classList.add('fullscreen-video-container');
                videoContainer.style.display = 'flex';
                videoPlayer.src = '/videos/' + carreraEnCurso.video_path;
                videoPlayer.muted = true;
                videoPlayer.play();

                videoPlayer.addEventListener('ended', () => {
                    videoContainer.classList.remove('fullscreen-video-container');
                    videoContainer.style.display = 'none';
                    mostrarGanadores();
                });

                videoPlayer.addEventListener("click", function () {
                    if (document.fullscreenElement) {
                        document.exitFullscreen();
                        this.style.maxWidth = '640px';
                    } else {
                        if (this.requestFullscreen) this.requestFullscreen();
                        this.style.maxWidth = 'none';
                    }
                });
            }


        function iniciarCarrera(carrera) {
            console.log('Iniciando carrera:', carrera);
            carreraEnCurso = carrera;
            cargarDatosCompetidores(carrera);

            // Asegurarse de que estén invisibles al inicio
            const circuito = document.querySelector('.circuito-container');
            const vehiculo = document.querySelector('.vehiculo');
            if (circuito) {
                circuito.style.opacity = 0;
            }
            if (vehiculo) {
                vehiculo.style.opacity = 0;
            }

            renderCompetidores(carreraEnCurso);
            mostrarCardsConAnimacion(carrera.participantes);
            videoContainer.style.display = 'none';
            ganadoresContainer.style.display = 'none';
            document.getElementById('competidores-container').style.display = 'block';
            document.getElementById('temporizador-container').style.display = 'block';
            const tiempoRestanteElement = document.getElementById('tiempo-restante');
            const horaObjetivo = Date.now() + 120 * 1000;
            localStorage.setItem('horaObjetivo', horaObjetivo);
            TemporizadorCompartido.iniciarTemporizador(); // Cambia a 120 para la duración real
            document.getElementById('competidores-container').style.display = 'block';
            function actualizarTiempoVisual(totalSegundos) {
                const minutos = Math.floor(totalSegundos / 60);
                const segundos = totalSegundos % 60;
                const minutosFormateados = minutos < 10 ? `0${minutos}` : minutos;
                const segundosFormateados = segundos < 10 ? `0${segundos}` : segundos;
                tiempoRestanteElement.textContent = `${minutosFormateados}:${segundosFormateados}`;
            }

            actualizarTiempoVisual(tiempoRestante); // Mostrar el tiempo inicial

            if (temporizador) {
                clearInterval(temporizador);
            }
            temporizador = setInterval(() => {
            tiempoRestante--;
                actualizarTiempoVisual(tiempoRestante);

                // --- NUEVO BLOQUE ---
                if (tiempoRestante === 90) {        // ⇦ momento del cambio
                document.getElementById('competidores-container')
                        document.getElementById('competidores-container').style.display = 'none';

                document.getElementById('tabla-probabilidades-container')
                        .classList.add('expandir-flex');

                document.getElementById('tabla-probabilidades')
                        .classList.add('expandir-flex');
                }

            actualizarTiempoVisual(tiempoRestante);
            console.log(`Tiempo restante para la carrera ${carreraEnCurso.carrera_id}: ${tiempoRestante}`);
            if (tiempoRestante < 0) {
                clearInterval(temporizador);
                document.getElementById('temporizador-container').style.display = 'none';
                mostrarVideoCarrera();

                // HACER VISIBLE LA PISTA Y EL VEHÍCULO AL INICIAR EL VIDEO
                const circuito = document.querySelector('.circuito-container');
                const vehiculo = document.querySelector('.vehiculo');
                if (circuito) {
                    circuito.style.opacity = 1;
                }
                if (vehiculo) {
                    vehiculo.style.opacity = 1;
                }

                // Iniciar la animación del vehículo AL INICIAR EL VIDEO
                tiempoInicio = performance.now();
                requestAnimationFrame(animarVehiculo);

                // Establecer un temporizador para ocultar la pista después de 35 segundos
                setTimeout(() => {
                    if (circuito) {
                        circuito.style.opacity = 0;
                    }
                    if (vehiculo) {
                        vehiculo.style.opacity = 0;
                    }
                }, 2500);
            }
        }, 1000);
        }


            function renderProximasCarrerasListaIzquierda() {
                const listaProximasCarrerasElement = document.getElementById('proximas-carreras-lista');
                listaProximasCarrerasElement.innerHTML = '';
                listaProximasCarreras.forEach(carrera => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `Carrera #${carrera.carrera_id}`;
                    listaProximasCarrerasElement.appendChild(listItem);
                });
            }

            function obtenerDatosCarrerasIniciales() {
                fetch('/api/carreras/proximas')
                    .then(response => response.json())
                    .then(data => {
                        listaProximasCarreras = data.proximas_carreras;
                        renderProximasCarrerasListaIzquierda();
                    })
                    .catch(error => {
                        console.error('Error al obtener las próximas carreras:', error);
                    });
            }
            let carreraFinalizadaGuardada = false; // <--- Declara la variable aquí


            function mostrarGanadores() {
                console.log('Función mostrarGanadores() llamada');
                videoContainer.style.display = 'none';
                ganadoresContainer.style.display = 'block';
                ganadoresLista.innerHTML = '';

                if (carreraEnCurso && carreraEnCurso.participantes) {
                    const ganadoresOrdenados = carreraEnCurso.participantes.sort((a, b) => parseInt(a.posicion_llegada) - parseInt(b.posicion_llegada));

                    const primerLugar = ganadoresOrdenados[0]?.nombre || null;
                    const segundoLugar = ganadoresOrdenados[1]?.nombre || null;
                    const tercerLugar = ganadoresOrdenados[2]?.nombre || null;

                    fetch('/api/carreras/guardar-finalizada', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            carrera_id: carreraEnCurso.carrera_id,
                            ganador_posicion_1: primerLugar,
                            ganador_posicion_2: segundoLugar,
                            ganador_posicion_3: tercerLugar,
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            if (response.status === 409) {
                                console.log('La información de esta carrera ya ha sido guardada anteriormente.');
                                return;
                            }
                            throw new Error(`Error en la petición: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Información de carrera finalizada guardada:', data);
                        obtenerDatosCarreras(); // Volver a obtener los datos para actualizar la lista
                    })
                    .catch(error => {
                        console.error('Error al guardar la carrera finalizada:', error);
                    });
                }

                setTimeout(() => {
                    ganadoresContainer.style.display = 'none';
                    videoContainer.style.display = 'none';
                    carreraEnCurso = null;
                    window.location.reload();
                }, 5000);
            }
            function enviarCarreraFinalizada(carreraId, ganadores) {
                console.log('Enviando carrera finalizada para ID:', carreraId);
                fetch('/carreras/finalizada', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Asegúrate de tener la meta etiqueta CSRF
                    },
                    body: JSON.stringify({ carrera_id: carreraId, ganadores: ganadores })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Carrera finalizada registrada:', data);
                    // Aquí podrías volver a obtener la lista de carreras finalizadas para actualizar la columna derecha
                    obtenerDatosCarreras();
                })
                .catch(error => {
                    console.error('Error al registrar la carrera finalizada:', error);
                });
            }


        function renderCarrerasFinalizadas(carrerasFinalizadas) {
            const carrerasFinalizadasLista = document.getElementById('carreras-finalizadas-lista');
            carrerasFinalizadasLista.innerHTML = '';

            const ultimas10Finalizadas = carrerasFinalizadas
                .filter(carrera => carrera.ganador_posicion_1 !== null)
                .sort((a, b) => new Date(b.fecha_finalizacion) - new Date(a.fecha_finalizacion))
                .slice(0, 5);

            ultimas10Finalizadas.forEach(carrera => {
                const listItem = document.createElement('li');
                listItem.classList.add('carrera-finalizada');
                listItem.innerHTML = `Carrera ${carrera.carrera_id}: `; // Poner ID al inicio

                const iconosSalida = document.createElement('div');
                iconosSalida.classList.add('iconos-salida');

                const crearIconoGanador = (posicionSalida, puesto) => {
                    if (posicionSalida >= 1 && posicionSalida <= 6) {
                        // ---- DEBUG: Imprime qué icono se va a crear ----
                         //console.log(`  -> Creando icono para Puesto ${puesto}: ${posicionSalida}.png`);
                        // -----------------------------------------------
                        const icono = document.createElement('img');
                        icono.src = `/assets/iconos/${posicionSalida}.png`;
                        icono.alt = `Salida Caja ${posicionSalida} (Llegó ${puesto}°)`;
                        icono.classList.add('icono-salida-ganador');
                        iconosSalida.appendChild(icono);
                    } else {
                        console.log(`  -> No se crea icono para Puesto ${puesto}: Posición Salida inválida (${posicionSalida})`);
                    }
                };

                crearIconoGanador(carrera.ganador_posicion_1_salida, 1);
                crearIconoGanador(carrera.ganador_posicion_2_salida, 2);
                crearIconoGanador(carrera.ganador_posicion_3_salida, 3);

                listItem.appendChild(iconosSalida);
                carrerasFinalizadasLista.appendChild(listItem);
            });
        }
        obtenerDatosCarreras();
        //setInterval(obtenerDatosCarreras, 5000);
    });
    function renderCarrerasFinalizadas(carrerasFinalizadas) {
        const listaFinalizadas = document.getElementById('carreras-finalizadas-lista');
        listaFinalizadas.innerHTML = ''; // Limpiar lista antes de renderizar

        // Evita agregar duplicados si vienen varias veces
        const idsAgregados = new Set();

        carrerasFinalizadas.forEach(carrera => {
            if (!idsAgregados.has(carrera.carrera_id)) {
                const listItem = document.createElement('li');
                listItem.textContent = `Carrera #${carrera.carrera_id}`;
                listaFinalizadas.appendChild(listItem);
                idsAgregados.add(carrera.carrera_id);
            }
        });
    }

    </script>
    <script>
        let tiempoInicio;

        function iniciarCarreraVisual() {
            const circuitoContainer = document.querySelector('.circuito-container');
            const vehiculo = document.querySelector('.vehiculo');
            
            if (!circuitoContainer || !vehiculo) {
                console.error("No se encontró el elemento '.circuito-container' o '.vehiculo'");
                return;
            }

            circuitoContainer.style.display = 'block';
            circuitoContainer.style.opacity = '1'; // hacer visible

            const inicioLeft = 184;
            const inicioTop = 190;

            vehiculo.style.position = 'absolute';
            vehiculo.style.left = `${inicioLeft - vehiculo.offsetWidth / 2}px`;
            vehiculo.style.top = `${inicioTop - vehiculo.offsetHeight / 2}px`;

            if (circuitoContainer.offsetWidth > 0 && circuitoContainer.offsetHeight > 0) {
                tiempoInicio = performance.now();
                requestAnimationFrame(animarVehiculo);

                // 👇 Ocultar circuito después de 10 segundos
                setTimeout(() => {
                    circuitoContainer.style.opacity = '0';
                    setTimeout(() => {
                        circuitoContainer.style.display = 'none';
                    }, 1000); // para permitir la transición
                }, 10000); // a los 10 segundos
            } else {
                console.error("El circuito no tiene dimensiones definidas.");
            }
        }
        

        function animarVehiculo(tiempoActual) {
            const vehiculo = document.querySelector('.vehiculo');
            const circuito = document.querySelector('.circuito-container');
            const duracionCarrera = 3000;

            if (!vehiculo || !circuito) return;

            const tiempoTranscurrido = tiempoActual - tiempoInicio;
            const progresoNormalizado = tiempoTranscurrido / duracionCarrera;
            const progreso = progresoNormalizado * 100;

            const centerX = circuito.offsetWidth / 2;
            const centerY = circuito.offsetHeight / 2;
            const radiusX = (circuito.offsetWidth / 2) - 5;
            const radiusY = (circuito.offsetHeight / 2) - 5;
            const angle = (2 * Math.PI * progreso) / 100;

            const x = centerX + radiusX * Math.cos(-angle);
            const y = centerY + radiusY * Math.sin(-angle);

            vehiculo.style.left = `${x - vehiculo.offsetWidth / 2}px`;
            vehiculo.style.top = `${y - vehiculo.offsetHeight / 2}px`;

            if (progresoNormalizado < 1) {
                requestAnimationFrame(animarVehiculo);
            } else {
                console.log("La carrera visual ha terminado.");
            }
        }
    </script>

    <script>
       function generarProbabilidad() {
            return (Math.random() * 199 + 1).toFixed(1);xz
        }

        function actualizarTablaProbabilidades() {
            const tabla = document.getElementById('tabla-probabilidades');
            const filas = tabla.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            const numCompetidores = 6;
            const todasLasProbabilidades = [];

            // Limpiar las probabilidades existentes y el color
            for (let i = 0; i < filas.length; i++) {
                const celdas = filas[i].getElementsByTagName('td');
                for (let j = 0; j < celdas.length; j++) {
                    celdas[j].textContent = '';
                    celdas[j].dataset.probabilidad = '';
                    celdas[j].style.color = '';
                }
            }

            // Generar y asignar probabilidades
            for (let i = 0; i < numCompetidores; i++) {
                const celdasFila = filas[i].getElementsByTagName('td');
                for (let j = 0; j < numCompetidores; j++) {
                    if (i !== j) { // Evitar la competencia contra sí mismo
                        const probabilidad = generarProbabilidad();
                        celdasFila[j].textContent = probabilidad;
                        celdasFila[j].dataset.probabilidad = probabilidad;
                        todasLasProbabilidades.push(parseFloat(probabilidad));
                    } else {
                        celdasFila[j].textContent = '-'; // Indicar que no aplica
                    }
                }
            }

            // Identificar y colorear las tres probabilidades más bajas y más altas
            const sortedProbabilidades = [...todasLasProbabilidades].sort((a, b) => a - b);
            const tresMasBajas = sortedProbabilidades.slice(0, 3).map(String); // Convertir a string para la comparación
            const tresMasAltas = sortedProbabilidades.slice(-3).map(String); // Convertir a string para la comparación

            for (let i = 0; i < filas.length; i++) {
                const celdas = filas[i].getElementsByTagName('td');
                for (let j = 0; j < celdas.length; j++) {
                    const probabilidadCelda = celdas[j].dataset.probabilidad;
                    if (probabilidadCelda) {
                        if (tresMasBajas.includes(probabilidadCelda)) {
                            celdas[j].style.color = 'green';
                        } else if (tresMasAltas.includes(probabilidadCelda)) {
                            celdas[j].style.color = 'red';
                        }
                    }
                }
            }
        }

        // Llama a esta función para actualizar la tabla
        actualizarTablaProbabilidades();
    </script>
<script>
    function cargarDatosCompetidores(carrera) {
    if (!carrera || !carrera.participantes || carrera.participantes.length === 0) {
        console.warn("No hay carrera o participantes válidos.");
        return;
    }

    fetch('http://localhost:8000/competidores-random')
        .then(res => res.json())
        .then(datosAleatorios => {
            carrera.participantes.forEach((participante, index) => {
                const card = document.getElementById(`card-${participante.posicion_salida}`);
                if (!card) return;

                // Nombre del participante
                const nombreSpan = card.querySelector('.nombre');
                if (nombreSpan) {
                    nombreSpan.textContent = participante.nombre ?? `Galgo ${index + 1}`;
                }

                // Datos aleatorios
                const datos = datosAleatorios[index];
                if (datos) {
                    const peso = card.querySelector('.peso');
                    const tamaño = card.querySelector('.tamaño');
                    const victorias = card.querySelector('.victorias');
                    const velocidad = card.querySelector('.velocidad');

                    if (peso) peso.textContent = `Peso: ${datos.peso} kg`;
                    if (tamaño) tamaño.textContent = `Tamaño: ${datos.tamaño} cm`;
                    if (victorias) victorias.textContent = `Victorias: ${datos.victorias_previas}/${datos.carreras_totales}`;
                    if (velocidad) velocidad.textContent = `Velocidad Max: ${datos.velocidad_promedio} km/h`;
                }
            });
        })
        .catch(error => {
            console.error("Error al cargar competidores aleatorios:", error);
        });
}
</script>

<script>
    function mostrarCardsConAnimacion(participantes) {
    participantes.forEach((participante, index) => {
        const card = document.getElementById(`card-${participante.posicion_salida}`);
        if (card) {
            card.querySelector('.nombre').textContent = participante.nombre;
            card.querySelector('.peso').textContent = `Peso: ${participante.peso} kg`;
            card.querySelector('.tamaño').textContent = `Tamaño: ${participante.tamaño} cm`;
            card.querySelector('.victorias').textContent = `Victorias: ${participante.victorias}`;
            card.querySelector('.velocidad').textContent = `Velocidad Max: ${participante.velocidad} km/h`;

            // Delay progresivo (ej. 0ms, 300ms, 600ms, etc.)
            setTimeout(() => {
                card.classList.add('visible');
            }, index * 300);
        }
    });
}
</script>

<script>
    const cards = document.querySelectorAll('.card-pequena');

cards.forEach((card, index) => {
    // Aplica la clase visible para activar transición de entrada
    setTimeout(() => {
        card.classList.add('visible');
    }, index * 100); // entrada escalonada

    // Aplica parpadeo luego de estar visibles
    setTimeout(() => {
        card.classList.add('animar');
        card.style.animationDelay = `${index * 0.15}s`; // desfase en animación
    }, index * 100 + 500); // espera a que termine la transición
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll('.card-pequena');
    let index = 0;

    function rotarSiguiente() {
      if (index >= cards.length) {
        index = 0; // reinicia si quieres que sea infinito
      }

      const card = cards[index];
      card.style.animation = 'rotar360 1s forwards';

      // Espera a que termine la animación antes de pasar al siguiente
      setTimeout(() => {
        card.style.animation = ''; // reinicia animación por si se repite
        index++;
        rotarSiguiente();
      }, 1200); // 1s de animación + pequeño delay
    }

    rotarSiguiente();
  });
</script>



<script>

</script>


</body>
</html>