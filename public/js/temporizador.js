(function (global) {
  const TIEMPO_TOTAL = 120;              //  ⏱️ segundos
  const HITO_OCULTAR = 15;               //  ⏱️ segundos para el hito
  const STORAGE_KEY = 'horaObjetivo';

  let intervalo;

  function iniciarTemporizador() {
    // si ya existe uno corriendo, no hagas nada
    if (intervalo) return;

    let horaObjetivo = localStorage.getItem(STORAGE_KEY);
    if (!horaObjetivo) {
      horaObjetivo = Date.now() + TIEMPO_TOTAL * 1000;
      localStorage.setItem(STORAGE_KEY, horaObjetivo);
    } else {
      horaObjetivo = parseInt(horaObjetivo, 10);
    }

    intervalo = setInterval(() => {
      const segundosRestantes = Math.max(
        0,
        Math.ceil((horaObjetivo - Date.now()) / 1000)
      );

      global.dispatchEvent(new CustomEvent('tick-temporizador', {
        detail: { segundosRestantes }
      }));

      if (segundosRestantes === HITO_OCULTAR) {
        global.dispatchEvent(new Event('hito-15s'));
      }

      if (segundosRestantes === 0) {
        clearInterval(intervalo);
        intervalo = null;
        localStorage.removeItem(STORAGE_KEY);
        global.dispatchEvent(new Event('hito-0s'));
      }
    }, 1000);
  }

  // reinicia cuando otra pestaña cambie la meta
  window.addEventListener('storage', e => {
    if (e.key === STORAGE_KEY) {
      clearInterval(intervalo);
      intervalo = null;
      iniciarTemporizador();
    }
  });

  global.TemporizadorCompartido = { iniciarTemporizador };
})(window);