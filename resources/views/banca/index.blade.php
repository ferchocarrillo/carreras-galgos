<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body { /* O html si prefieres que la imagen cubra todo el viewport */
            background-image: url('/assets/otros/fondoBanca.gif');
            background-size: cover; /* Cubre toda el área del elemento */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Mantiene la imagen fija al hacer scroll */
            background-position: center center; /* Centra la imagen en el elemento */
        }
        .content{
            padding:2rem;
        }
        .supIzq{
            height:550px;
            border: 1px solid blue;
            margin-bottom: 5px;
            background: white;
        }
        .supCen01{
            height:70px;
            border: 1px solid red;
            margin-bottom: 5px;
            background: white;
        }
        .supCen02{
           height: 474px;
            border: 1px solid red;
            margin-bottom: 5px;
            background: white;
            /* Añade estas propiedades para centrar su contenido (el .contenedor-botones) */
            display: flex; /* Convierte .supCen02 en un contenedor flex */
            justify-content: center; /* Centra horizontalmente su contenido */
            align-items: center; /* Centra verticalmente su contenido */
        }
        .supDer{
            height:550px;
            border: 1px solid green;
            margin-bottom: 5px;
            background: white;
        }
        .top{
            height:130px;
            border: 1px solid cyan;
            margin-bottom: 5px;
            background: #071f38;
        }   
        .top img{
            width: 120px;
            height: 120px;
            margin: 5px;
        }

        .contenedor-botones {
            display: flex;
            flex-wrap: wrap;
            width: 650px; /* Ajustado para 6 botones de 90px con 5px de gap */
            gap: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            /* Quita el margin: auto aquí, ya que el padre flexbox se encargará del centrado */
            /* margin: 20px auto; */
            background: white;

        }
        .contenedor-botones img{
            width: 80px; 
            height: 80px;
            background: white;
        }

        .boton {
            width: 90px;
            height: 90px;
            background-color:none;
            color: white;
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .boton:hover {
            background-color:rgb(255, 255, 255);
            border-radius:1rem;
        }
        .pos {
            font-size: 12px;
            width: 50px; /* Dale el mismo ancho que los botones */
            height: 30px; /* Dale la misma altura que los botones */
            background-color: black; /* Un color de fondo para diferenciarlo */
            color: white;
            border: 1px solid #ddd; /* Un borde para que se vea como una caja */
            box-sizing: border-box; /* Incluye padding y border en el ancho/alto total */
            border-radius: 3.75rem;

            /* Propiedades Flexbox para centrar el texto dentro del span */
            display: flex;
            justify-content: center; /* Centra el texto horizontalmente */
            align-items: center;   /* Centra el texto verticalmente */

            /* Importante para que no se encoja ni se estire si la línea tiene espacio limitado */
            flex-shrink: 0;
            flex-grow: 0;
            margin-top: 5%;
        }


    .contenedor-botones2 {
        display: flex;
        /* Elimina 'flex-wrap: wrap;' si solo vas a tener 4 botones y quieres que siempre estén en una línea */
        /* Si mantienes 'flex-wrap: wrap;' es para que más botones se envuelvan si los añades después */
        width: 700px; /* Ejemplo: un ancho mayor al de los botones */
        height: 120px; /* Ejemplo: altura para visualizar el centrado vertical */
        border: 1px solid blue; /* Para visualizar el contenedor */
        padding: 10px;
        box-sizing: border-box;
        margin: 20px auto;

        /* Propiedades clave para la distribución homogénea: */
        justify-content: space-between; /* Distribuye el espacio sobrante entre los ítems */
        align-items: center; /* Centra los botones verticalmente dentro de la fila */
    }

    .boton2 {
        width: 90px;
        height: 90px;
        background-color: #ff5733; /* Color diferente para distinguir */
        color: white;
        border: none;
        border-radius: 0.75rem;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
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
        line-height: 1; 
        color: #ccc;             /* Elimina espacio vertical innecesario */
    }

    #temporizador-container .time {
        font-size: 2rem;             /* Tu tamaño original del temporizador */
        line-height: 1;   
        color: #ccc;           /* Para que no se desplace verticalmente */
    }

    </style>
</head>
<body>
    <div class="content">
<div class="row">
    <div class="col-12 top">
        <img src="{{asset('assets/logo.png')}}" alt="">


            <div id="temporizador-container">
                <span class="texto-fijo">EL SIGUIENTE EVENTO COMENZARÁ EN:  </span>
                <span class="time animated infinite bounceOut" id="tiempo-restante">01:45</span>
            </div>
    </div>
</div>
  <div class="col-2 supIzq">Columna de <br>Since 9 + 4 = 13 &gt; 12, this 4-column-wide div gets wrapped onto a new line as one contiguous unit.</div>
  <div class="col">
  <div class="col-12 supCen01">Tabla de apuestas 01<br>Subsequent columns continue along the new line.</div>
  <div class="col-12 supCen02">
    <div class="contenedor-botones">
        <span class="pos">1 st</span>
        <button class="boton"><img src="assets/iconos/1.png" alt="Perro 1"></button>
        <button class="boton"><img src="assets/iconos/2.png" alt="Perro 2"></button>
        <button class="boton"><img src="assets/iconos/3.png" alt="Perro 3"></button>
        <button class="boton"><img src="assets/iconos/4.png" alt="Perro 4"></button>
        <button class="boton"><img src="assets/iconos/5.png" alt="Perro 5"></button>
        <button class="boton"><img src="assets/iconos/6.png" alt="Perro 6"></button>
        <span class="pos">2nd</span>
        <button class="boton"><img src="assets/iconos/1.png" alt="Perro 1"></button>
        <button class="boton"><img src="assets/iconos/2.png" alt="Perro 2"></button>
        <button class="boton"><img src="assets/iconos/3.png" alt="Perro 3"></button>
        <button class="boton"><img src="assets/iconos/4.png" alt="Perro 4"></button>
        <button class="boton"><img src="assets/iconos/5.png" alt="Perro 5"></button>
        <button class="boton"><img src="assets/iconos/6.png" alt="Perro 6"></button>
        <span class="pos">3rd</span>
        <button class="boton"><img src="assets/iconos/1.png" alt="Perro 1"></button>
        <button class="boton"><img src="assets/iconos/2.png" alt="Perro 2"></button>
        <button class="boton"><img src="assets/iconos/3.png" alt="Perro 3"></button>
        <button class="boton"><img src="assets/iconos/4.png" alt="Perro 4"></button>
        <button class="boton"><img src="assets/iconos/5.png" alt="Perro 5"></button>
        <button class="boton"><img src="assets/iconos/6.png" alt="Perro 6"></button>

        <div class="contenedor-botones2">
            <button class="boton2"><img src="assets/iconos/1.png" alt="Perro 1"></button>
            <button class="boton2"><img src="assets/iconos/2.png" alt="Perro 2"></button>
            <button class="boton2"><img src="assets/iconos/3.png" alt="Perro 3"></button>
            <button class="boton2"><img src="assets/iconos/4.png" alt="Perro 4"></button>
        </div>
    </div>
  </div>
</div>

  <div class="col-3 supDer">Tickete No. 5132155</div>
    <div class="col-12 top">.col-9</div>
</div>
</div>
<script src="/js/temporizador.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
  // Arranca (si no estaba corriendo).
  TemporizadorCompartido.iniciarTemporizador();

  // Actualiza el tiempo visible
  window.addEventListener('tick-temporizador', ({ detail }) => {
    const t = detail.segundosRestantes;
    document.getElementById('tiempo-restante').textContent =
      `${String(Math.floor(t/60)).padStart(2,'0')}:${String(t%60).padStart(2,'0')}`;
  });

  // Acciones específicas para cada vista
  window.addEventListener('hito-15s', () => {
    // Carreras: ocultar competidores, expandir tabla
    // Banca   : mostrar aviso, deshabilitar apuestas, etc.
  });

  window.addEventListener('hito-0s', () => {
    // Carreras: reproducir video, etc.
    // Banca   : cerrar apuestas, guardar jugadas, etc.
  });
</script>
</body>

</html>
