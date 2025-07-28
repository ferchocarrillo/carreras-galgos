(function (global) {
  const STORAGE_KEY = 'carreraActiva';
  let listener = null;

  function establecerCarrera(carrera) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(carrera));
    global.dispatchEvent(new CustomEvent('carrera-actualizada', {
      detail: carrera
    }));
  }

  function obtenerCarrera() {
    const data = localStorage.getItem(STORAGE_KEY);
    return data ? JSON.parse(data) : null;
  }

  function suscribirse(callback) {
    // Si ya había un listener, lo removemos para evitar duplicados
    if (listener) {
      global.removeEventListener('carrera-actualizada', listener);
    }
    listener = (e) => callback(e.detail);
    global.addEventListener('carrera-actualizada', listener);
  }

  // Escucha cambios desde otras pestañas
  window.addEventListener('storage', e => {
    if (e.key === STORAGE_KEY) {
      const nuevaCarrera = e.newValue ? JSON.parse(e.newValue) : null;
      global.dispatchEvent(new CustomEvent('carrera-actualizada', {
        detail: nuevaCarrera
      }));
    }
  });

  global.CarreraCompartida = {
    establecerCarrera,
    obtenerCarrera,
    suscribirse
  };
})(window);
