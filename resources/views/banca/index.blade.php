<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body { /* O html si prefieres que la imagen cubra todo el viewport */
            background-image: url('/assets/fondoBanca.png');
            background-size: cover; /* Cubre toda el área del elemento */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Mantiene la imagen fija al hacer scroll */
            background-position: center center; /* Centra la imagen en el elemento */
        }
        .content{
            padding:2rem;
        }
        .supIzq {
            width: 250px;              /* 👈 Ajusta al ancho que usabas originalmente */
            height: 330px;
            border: 1px solid blue;
            margin-bottom: 5px;
            background: white;
            overflow-y: hidden;        /* No hace scroll general al contenedor */
            padding: 10px;
            display: flex;
            flex-direction: column;
        }
        .supCen01{
            height:55px;
            border: 1px solid red;
            margin-bottom: 5px;
            background: white;
        }
        .supCen02 {
            height: 178px;
            margin-bottom: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .supDer {
            height: 477px;
            width: 18.5%;
            border: 1px solid green;
            margin-top: -30px;
            padding: 10px;
            background: white;
            position: absolute;
            /* margin-right: 5px; */
            margin-left: 59rem;
        }
        .top {
            height: 130px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .logo-img {
            width: 120px;
            height: 120px;
            margin-left: 10px;
        }

        #temporizador-container {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
            width: fit-content;
            color: white;
            font-size: 22px;
        }
        .contenedor-botones {
            display: flex;
            flex-direction: column;
            gap: 9px;
            width: 919px;
            box-sizing: border-box;
            margin-top: -39rem;
            margin-left: -2rem;
        }

        .fila-botones {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
        }


        .grupo-botones {
            display: flex;
            justify-content: space-between;
            flex: 1; /* toma el espacio restante */
            gap: 10px;
        }
        .contenedor-botones img{
            width: 80px; 
            height: 80px;

        }

        .boton {
            flex: 1; /* Hace que todos los botones se expandan equitativamente */
            max-width: 100px; /* Puedes ajustarlo según el espacio disponible */
            aspect-ratio: 1/1; /* Mantiene la forma cuadrada */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: transparent;
            border: none;
            cursor: pointer;
            box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -webkit-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -moz-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
        }

        .boton:hover {
            background-color:rgb(255, 255, 255);
            border-radius:1rem;
        }

        .boton img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }



        .pos {
            font-size: 14px;
            width: 60px;
            height: 90px;
            background-color: black;
            color: white;
            border-radius: 3.75rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            flex-grow: 0;
            
        }


        .contenedor-botones2 {
            display: flex;
            width: 700px; /* Ejemplo: un ancho mayor al de los botones */
            height: 120px; /* Ejemplo: altura para visualizar el centrado vertical */
            padding: 10px;
            box-sizing: border-box;
            margin: 20px auto;
            justify-content: space-between; /* Distribuye el espacio sobrante entre los ítems */
            align-items: center; /* Centra los botones verticalmente dentro de la fila */
        }

        .boton2 {
            width: 90px;
            height: 90px;
            background-color: #000000; /* Color diferente para distinguir */
            color: white;
            border: none;
            border-radius: 6.75rem;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
            box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -webkit-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -moz-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            
        }
        .boton2:hover {
            background-color: rgb(0, 0, 0);
            border-radius: 5rem;
            width: 120px;
            height: 120px;
        }
        .boton2 img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Rellena completamente el botón */
            border-radius: 50%; /* Hace la imagen circular */
        }
        .texto-fijo {
            font-size: 30px;
            color: white;
            font-weight: bold;
        }
        .time {
            font-size: 50px;
            color: white;
            font-weight: bold;
            display: inline-block; /* Para que el efecto de animación funcione correctamente */
            margin-top: 1px;
        }
        .one{
            background: #EFB810 !important;
            color: #000000;
            font-size: 25px;
            border: solid 2px #000000;
             box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -webkit-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -moz-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
        }
        .two{
            background: #E3E4E5 !important;
            color: #000000;
            font-size: 25px;
            border: solid 2px #000000;
             box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -webkit-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -moz-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
        }
        .three{
            background: #BF8970 !important;
            color: #000000;
            font-size: 25px;
            border: solid 2px #000000;
             box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -webkit-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
            -moz-box-shadow: 2px 0px 38px 0px rgba(255,255,255,0.95);
        }
        .boton {
            border: none;
            background: transparent;
            transition: all 0.3s ease;
        }
        .boton.disabled {
            opacity: 0.3;
            pointer-events: none;
            filter: grayscale(100%);
        }
        .boton.selected {
            border: 3px solid #007bff;
            box-shadow: 0 0 6px #007bff;
        }
        #listado-apuestas {
            flex: 1;
            overflow-y: auto;           /* ✅ Scroll solo aquí si es necesario */
            max-height: 420px;          /* Ajusta para que no exceda .supIzq */
        }

        .bank-video-container {
            position: relative;
            width: 400px;         /* Tamaño fijo más pequeño */
            height: 300px;        /* Altura proporcional */
            max-width: 100%;      /* Responsivo en móviles */
            background-color: black;
            border-radius: 8px;
            overflow: hidden;
            
            margin: -184px -189px;     /* Espaciado */
            box-shadow: 0 4px 8px rgba(0,0,0,0.3); /* Sombra para destacar */
        }

        .bank-video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;    /* Ajusta el video al contenedor */
        }
    </style>
</head>
<body data-vista="banca">
<div class="content">
<div class="row">
    <div class="col-12 top d-flex align-items-center justify-content-between">
        <img src="{{ asset('assets/logo.png') }}" alt="" class="logo-img">

        <div id="temporizador-container" class="mx-auto text-center">
            <span class="texto-fijo">EL SIGUIENTE EVENTO COMENZARÁ EN:</span>
            <span class="time animated infinite bounceOut" id="tiempo-restante">01:45</span>
            <p id="info-carrera-activa" class="alert alert-dark text-center"></p>
            <div id="msg-carrera-en-curso" style="display:none;text-align:center;font-size:2em;color:#d9534f;">Carrera en curso</div>
        </div>
    </div>
</div>
<div class="row">
  <div class="mt-3 supIzq">
    <h5 class="mb-2">Apuestas registradas:</h5>
    <div id="listado-apuestas"></div>
    <div id="total-apostado" class="mt-2 font-weight-bold text-right text-success"></div>
    <button id="reiniciar-apuestas" class="btn btn-warning btn-sm mt-2">
      🗑️ Nuevo ciclo de apuestas
    </button>
  </div>



    <div class="col supCen01 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'exacta')">Exacta</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'gemela')">Gemela</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'trios_orden')">Trio en orden</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'sistema')">Sistema</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'trio_exacta')">Trio exacta</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'gemela_ganador')">Gemela Ganador</div>
        <div class="btn btn-primary tipo-apuesta" onclick="seleccionarTipo(this, 'lucky')">Lucky</div>
    </div>

<div class="col-12 supCen02">
    <div class="contenedor-botones">
        <!-- Fila 1: Primer lugar -->
        <div class="fila-botones" data-fila="1" style="display: none;">
            <div class="pos one">1st</div>
            <div class="grupo-botones">
                @for ($i = 1; $i <= 6; $i++)
                    <button class="boton" data-num="{{ $i }}"><img src="assets/iconos/{{ $i }}.png" alt="Perro {{ $i }}"></button>
                @endfor
            </div>
        </div>

        <!-- Fila 2: Segundo lugar -->
        <div class="fila-botones" data-fila="2" style="display: none;">
            <div class="pos two">2nd</div>
            <div class="grupo-botones">
                @for ($i = 1; $i <= 6; $i++)
                    <button class="boton" data-num="{{ $i }}"><img src="assets/iconos/{{ $i }}.png" alt="Perro {{ $i }}"></button>
                @endfor
            </div>
        </div>

        <!-- Fila 3 (si luego la necesitas) -->
        <div class="fila-botones" data-fila="3" style="display: none;">
            <div class="pos three">3rd</div>
            <div class="grupo-botones">
                @for ($i = 1; $i <= 6; $i++)
                    <button class="boton" data-num="{{ $i }}"><img src="assets/iconos/{{ $i }}.png" alt="Perro {{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>
</div>

<div id="resumen-apuesta" style="display:none; position:fixed; bottom:10px; left:50%; transform:translateX(-50%); z-index:9999; background:white; padding:1rem; border-radius:1rem; box-shadow:0 0 10px rgba(0,0,0,0.3); width:90%; max-width:600px;">
    <h5 class="text-center">Resumen de Apuesta</h5>
    <div class="d-flex flex-wrap gap-2 justify-content-center mb-3">
        <button class="btn btn-outline-secondary monto-btn" data-valor="1">1</button>
        <button class="btn btn-outline-secondary monto-btn" data-valor="5">5</button>
        <button class="btn btn-outline-secondary monto-btn" data-valor="10">10</button>
        <button class="btn btn-outline-secondary monto-btn" data-valor="20">20</button>
        <button class="btn btn-outline-secondary monto-btn" data-valor="50">50</button>
        <input id="monto-manual" type="number" class="form-control w-auto" placeholder="Otro monto">
    </div>
    <div id="lista-apuestas" class="mb-3 text-center"></div>
    <button id="confirmar-apuesta" class="btn btn-success w-100">Confirmar Apuesta</button>
</div>

<div class="container">
    <div id="video-container" style="display:none;">
        <video id="video-player" muted></video>
    </div>
</div>

<script src="/js/temporizador.js"></script>
<script src="/js/carrera.js"></script>
<script src="/js/videoSyncController.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// --------------------------------------------------
// CONFIGURACIÓN DINÁMICA DEL TEMPORIZADOR PARA BANCA
// --------------------------------------------------

window.carreraActiva = false; // Bandera global: carrera en curso o no
const esBanca = document.body.getAttribute("data-vista") === "banca";

// Función: Ocultar temporizador y mostrar mensaje "Carrera en curso"
function ocultarTemporizadorYMostrarMensajeCarrera() {
  if (!esBanca) return;
  window.carreraActiva = true;
  document.getElementById('temporizador-container').style.display = 'none';
  document.getElementById('msg-carrera-en-curso').style.display = 'block';
}

// Función: Volver a mostrar temporizador y ocultar mensaje al terminar el video
function mostrarTemporizadorYOcultarMensajeCarrera() {
  if (!esBanca) return;
  window.carreraActiva = false;
  document.getElementById('msg-carrera-en-curso').style.display = 'none';
  document.getElementById('temporizador-container').style.display = 'block';
}

// Evita actualizar el temporizador visual mientras la carrera está activa
window.addEventListener('tick-temporizador', ({ detail }) => {
  if (esBanca && window.carreraActiva) return; // No mostrar ni actualizar temporizador en banca durante la carrera
  const t = detail.segundosRestantes;
  const tiempoRestanteElement = document.getElementById('tiempo-restante');
  if (tiempoRestanteElement) {
    const min = String(Math.floor(t / 60)).padStart(2, '0');
    const seg = String(t % 60).padStart(2, '0');
    tiempoRestanteElement.textContent = `${min}:${seg}`;
  }
});
const esBanca = document.body.getAttribute("data-vista") === "banca";

function mostrarCarreraEnCurso() {
    if (!esBanca) return;
    document.getElementById('temporizador-container').style.display = 'none';
    document.getElementById('msg-carrera-en-curso').style.display = 'block';
}

function ocultarCarreraEnCurso() {
    if (!esBanca) return;
    document.getElementById('msg-carrera-en-curso').style.display = 'none';
    document.getElementById('temporizador-container').style.display = 'block';
}
// Detecta inicio y fin del video/carrera
document.addEventListener('DOMContentLoaded', () => {
  if (!esBanca) return;
  const videoPlayer = document.getElementById('video-player');
  if (videoPlayer) {
    videoPlayer.addEventListener('play', ocultarTemporizadorYMostrarMensajeCarrera);
    videoPlayer.addEventListener('ended', mostrarTemporizadorYOcultarMensajeCarrera);
  }
});
</script>
<script>
  TemporizadorCompartido.iniciarTemporizador();
  window.addEventListener('tick-temporizador', ({ detail }) => {
    const t = detail.segundosRestantes;
    document.getElementById('tiempo-restante').textContent =
      `${String(Math.floor(t/60)).padStart(2,'0')}:${String(t%60).padStart(2,'0')}`;
  });
  window.addEventListener('hito-15s', () => {

  });

    window.addEventListener('hito-0s', () => {
    if (carreraFinalizadaProcesada) return;
            carreraFinalizadaProcesada = true;

            // Código que guarda info finalizada, limpia apuestas, desbloquea banca, etc.
            
            console.log('Información de carrera finalizada guardada: {message: "Información de carrera finalizada guardada con éxito"}');
        });
    // Limpia las apuestas
    apuestas = [];
    renderizarApuestas();

    // Desbloquea la banca para el nuevo ciclo
    desbloquearBanca();

    // Opcional: reinicia la selección de tipo de apuesta y montos
    seleccionarTipo('', '');
    });
</script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
    seleccionarTipo('');
});
</script>

<script>
let apuestas = [];
let seleccionExacta = { primer: null, segundo: null };
let montoSeleccionado = 0;

function seleccionarTipo(elemento, tipo) {
    document.querySelectorAll('.tipo-apuesta').forEach(btn => btn.classList.remove('active'));
    if (elemento) elemento.classList.add('active');

    document.querySelectorAll('.fila-botones').forEach(f => f.style.display = 'none');
    document.getElementById('resumen-apuesta').style.display = 'none';

    if (tipo === 'exacta') {
        document.querySelectorAll('[data-fila="1"], [data-fila="2"]').forEach(f => f.style.display = 'flex');
        document.getElementById('resumen-apuesta').style.display = 'block';
    }

    // Reset visual y datos
    document.querySelectorAll('.boton').forEach(btn => {
        btn.classList.remove('selected', 'disabled');
    });
    seleccionExacta = { primer: null, segundo: null };
    montoSeleccionado = 0;
    actualizarResumen();
}

function inicializarBotones() {
    document.querySelectorAll('.boton').forEach(btn => {
        btn.addEventListener('click', function () {
            const fila = this.closest('.fila-botones');
            const filaNum = fila.getAttribute('data-fila');
            const grupo = fila.querySelectorAll('.boton');
            const num = this.dataset.num;

            const esSeleccionado = this.classList.contains('selected');

            // Deseleccionar
            if (esSeleccionado) {
                this.classList.remove('selected');
                grupo.forEach(b => b.classList.remove('disabled'));
                if (filaNum === '1') {
                    seleccionExacta.primer = null;
                } else {
                    seleccionExacta.segundo = null;
                }
            } else {
                // Seleccionar
                grupo.forEach(b => {
                    b.classList.remove('selected');
                    b.classList.add('disabled');
                });
                this.classList.remove('disabled');
                this.classList.add('selected');

                if (filaNum === '1') {
                    seleccionExacta.primer = num;
                } else {
                    seleccionExacta.segundo = num;
                }
            }

            // 🔁 Luego de seleccionar/deseleccionar, actualiza los botones cruzados
            document.querySelectorAll('.fila-botones').forEach(filaEl => {
                const fnum = filaEl.getAttribute('data-fila');
                const seleccionadoOtro = fnum === '1' ? seleccionExacta.segundo : seleccionExacta.primer;
                const seleccionadoEste = fnum === '1' ? seleccionExacta.primer : seleccionExacta.segundo;

                filaEl.querySelectorAll('.boton').forEach(b => {
                    const n = b.dataset.num;

                    if (seleccionadoEste) {
                        // Si hay un seleccionado en esta fila, bloquea todos menos él
                        if (n !== seleccionadoEste) {
                            b.classList.add('disabled');
                        } else {
                            b.classList.remove('disabled');
                        }
                    } else {
                        // Si no hay seleccionado, habilita todos menos el de la otra fila
                        if (n === seleccionadoOtro) {
                            b.classList.add('disabled');
                        } else {
                            b.classList.remove('disabled');
                        }
                    }
                });
            });

            actualizarResumen();
        });
    });
}



function actualizarResumen() {
    const lista = document.getElementById('lista-apuestas');
    const carrera = CarreraCompartida.obtenerCarrera();

    if (seleccionExacta.primer && seleccionExacta.segundo && montoSeleccionado > 0 && carrera) {
        lista.innerHTML = `
            <div class="alert alert-info mb-0">
                Carrera #${carrera.carrera_id} - ${carrera.pista || 'N/D'} - ${carrera.metros_pista || 'N/D'}mts: 
                ${seleccionExacta.primer} > ${seleccionExacta.segundo} - Exacta - $${montoSeleccionado}
            </div>`;
    } else {
        lista.innerHTML = '<div class="text-muted">Selecciona 1er y 2do lugar y monto</div>';
    }
}

// Manejador del botón de confirmación de apuesta
document.getElementById('confirmar-apuesta').addEventListener('click', () => {
    const carrera = CarreraCompartida.obtenerCarrera();
    const carreraId = carrera?.carrera_id || null;

    console.log('🔍 Verificando datos:', {
        carreraId,
        primer: seleccionExacta.primer,
        segundo: seleccionExacta.segundo,
        montoSeleccionado
    });

    if (!carreraId || !seleccionExacta.primer || !seleccionExacta.segundo || montoSeleccionado <= 0) {
        Swal.fire({
            icon: 'dangert',
            title: '¡Completa los datos de la apuesta!',
            text: '✅ ingresa una cantidad',
            confirmButtonText: 'OK'
            });
        return;
    }

    const apuesta = {
        carrera_id: carreraId,
        posicion_1: seleccionExacta.primer,
        posicion_2: seleccionExacta.segundo,
        tipo: 'exacta',
        valor: montoSeleccionado
    };
    apuestas.push(apuesta);
    Swal.fire({
        icon: 'success',
        title: '¡Apuesta registrada!',
        confirmButtonText: 'OK'
        });
    renderizarApuestas();
    // Limpiar visual
    seleccionExacta = { primer: null, segundo: null };
    montoSeleccionado = 0;
    document.querySelectorAll('.boton').forEach(b => b.classList.remove('selected', 'disabled'));
    document.querySelectorAll('.monto-btn').forEach(b => b.classList.remove('active'));
    document.getElementById('monto-manual').value = '';
    actualizarResumen();
});

// Manejadores para seleccionar monto de apuesta
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.monto-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.monto-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            montoSeleccionado = parseInt(btn.dataset.valor);
            document.getElementById('monto-manual').value = '';
            actualizarResumen();
        });
    });

    document.getElementById('monto-manual').addEventListener('input', e => {
        document.querySelectorAll('.monto-btn').forEach(b => b.classList.remove('active'));
        montoSeleccionado = parseInt(e.target.value) || 0;
        actualizarResumen();
    });

    inicializarBotones(); // Asegúrate de inicializar después del DOM
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        function mostrarCarrera(carrera) {
            const elemento = document.getElementById('info-carrera-activa');
            if (elemento && carrera) {
                elemento.textContent = `Carrera en curso: #${carrera.carrera_id} - ${carrera.pista} - ${carrera.metros_pista}mts`;
            }
        }

        // Mostrar si ya hay una al cargar
        const actual = CarreraCompartida.obtenerCarrera();
        if (actual) {
            mostrarCarrera(actual);
        }

        // Escuchar si otra pestaña la actualiza después
        CarreraCompartida.suscribirse(carrera => {
            console.log('🔄 Carrera recibida desde otra pestaña:', carrera);
            mostrarCarrera(carrera);
        });
    });
</script>
<script>
        function renderizarApuestas() {
            const contenedor = document.getElementById('listado-apuestas');
            const totalDiv = document.getElementById('total-apostado');

            if (apuestas.length === 0) {
                contenedor.innerHTML = '<p class="text-muted">No hay apuestas registradas aún.</p>';
                totalDiv.textContent = '';
                return;
            }

            const carrera = CarreraCompartida.obtenerCarrera();

            contenedor.innerHTML = apuestas.map((a, i) => `
                <div class="alert alert-secondary py-2 px-3 mb-1">
                    <strong>#${i + 1}</strong> - Carrera #${a.carrera_id} - ${carrera?.pista || 'N/D'} - ${carrera?.metros_pista || 'N/D'}mts<br>
                    🏁 ${a.posicion_1} > ${a.posicion_2} - ${a.tipo} - 💰 $${a.valor}
                </div>
            `).join('');

            // ✅ Calcular total
            const total = apuestas.reduce((sum, a) => sum + a.valor, 0);
            totalDiv.textContent = `Total apostado: $${total}`;
        }


</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnReiniciar = document.getElementById('reiniciar-apuestas');
    if (btnReiniciar) {
        btnReiniciar.addEventListener('click', () => {
            if (confirm('¿Estás seguro de borrar todas las apuestas del ciclo actual?')) {
                apuestas = [];
                renderizarApuestas();
            }
        });
    }
});
</script>

<script>
    function bloquearBanca() {
        // Deshabilita los botones de tipo de apuesta
        document.querySelectorAll('.tipo-apuesta').forEach(btn => btn.classList.add('disabled'));

        // Deshabilita los botones de selección de perros
        document.querySelectorAll('.boton').forEach(btn => btn.classList.add('disabled'));

        // Deshabilita los botones de monto y el input manual
        document.querySelectorAll('.monto-btn').forEach(btn => btn.disabled = true);
        document.getElementById('monto-manual').disabled = true;

        // Deshabilita el botón de confirmar apuesta
        document.getElementById('confirmar-apuesta').disabled = true;
        }

        function desbloquearBanca() {
        document.querySelectorAll('.tipo-apuesta').forEach(btn => btn.classList.remove('disabled'));
        document.querySelectorAll('.boton').forEach(btn => btn.classList.remove('disabled'));
        document.querySelectorAll('.monto-btn').forEach(btn => btn.disabled = false);
        document.getElementById('monto-manual').disabled = false;
        document.getElementById('confirmar-apuesta').disabled = false;
        }

        // Escucha el hito de los 10 segundos
        window.addEventListener('tick-temporizador', ({ detail }) => {
        const t = detail.segundosRestantes;
        document.getElementById('tiempo-restante').textContent =
            `${String(Math.floor(t/60)).padStart(2,'0')}:${String(t%60).padStart(2,'0')}`;
        if (t === 10) {
            bloquearBanca();
            mostrarMensajeBloqueo("⏳ Faltan 10 segundos para la carrera. Las apuestas están cerradas.");
        }
        });

        window.addEventListener('hito-0s', () => {
        apuestas = [];
        renderizarApuestas();
        desbloquearBanca();
        ocultarMensajeBloqueo();
        seleccionarTipo('', '');
        // mostrarVideoCarrera();
        });

</script>

<script>
        function mostrarMensajeBloqueo(mensaje = "⏳ Faltan 10 segundos para la carrera. Las apuestas están cerradas.") {
        Swal.fire({
            icon: 'warning',
            title: '⏳ Apuestas Cerradas',
            text: mensaje,
            timer: 10000, // Ocultar automáticamente después de 5 segundos (opcional)
            timerProgressBar: true,
            showConfirmButton: false,
            toast: false,
            position: 'center' // O 'top-end' si lo prefieres como toast
        });
        }

         function ocultarMensajeBloqueo() {
        // const contenedor = document.getElementById('contenedor-opciones');
        // contenedor.innerHTML = '';
        }

        // Llama a mostrarMensajeBloqueo() en bloquearBanca y a ocultarMensajeBloqueo() en desbloquearBanca

</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
  const infoCarrera = CarreraCompartida.obtenerCarrera();
  if (infoCarrera) {
    actualizarTarjetaCarrera(infoCarrera);
  }

  // Escuchar si cambia desde otra pestaña o evento
  CarreraCompartida.suscribirse(carrera => {
    actualizarTarjetaCarrera(carrera);
  });
});

function actualizarTarjetaCarrera(carrera) {
  const div = document.getElementById('info-tarjeta-carrera');
  if (div && carrera) {
    div.innerHTML = `
      <strong>Carrera #${carrera.carrera_id}</strong><br>
      🏁 Pista: ${carrera.pista || 'N/D'}<br>
      📏 Distancia: ${carrera.metros_pista || 'N/D'} metros
    `;
  }
}

</script>

<script>
    function iniciarCarrera(carrera) {
    window.carreraEnCurso = carrera;

    // Si es banca, oculta el mensaje "carrera en curso" (mantén tu lógica actual aquí)
    if (typeof esBanca !== "undefined" && esBanca) {
        ocultarCarreraEnCurso();
    }

    // ... Aquí tu lógica de preparar competidores y reiniciar el temporizador ...
    // Ejemplo:
    renderCompetidores(carrera);
    mostrarCardsConAnimacion(carrera.participantes);

    document.getElementById('video-container').style.display = 'none';
    document.getElementById('ganadores-container').style.display = 'none';
    document.getElementById('competidores-container').style.display = 'block';
    document.getElementById('temporizador-container').style.display = 'block';

    // Reset y arranque del temporizador
    tiempoRestante = 120;
    localStorage.setItem('horaObjetivo', Date.now() + 120 * 1000);
    TemporizadorCompartido.iniciarTemporizador();
}
</script>


</body>

</html>
