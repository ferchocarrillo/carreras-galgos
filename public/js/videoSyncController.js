// Crear el canal de sincronización una sola vez, en el contexto global del archivo
const channelVideo = new BroadcastChannel('sync-video-channel');

document.addEventListener('DOMContentLoaded', () => {
  const videoPlayer = document.getElementById('video-player');
  const videoContainer = document.getElementById('video-container');

  // Detectar si es la banca
  const esBanca = document.body.getAttribute('data-vista') === 'banca';

  if (!videoPlayer || !videoContainer) {
    console.warn('[🎬 Sync] No se encontraron elementos de video');
    return;
  }

  // Escuchar mensajes del canal
  channelVideo.onmessage = ({ data }) => {
    const { action, time, path } = data;

    if (action === 'play') {
      videoPlayer.src = path;
      videoPlayer.muted = true;
      videoPlayer.currentTime = time ?? 0;
      if (!esBanca) {
        videoContainer.style.display = 'block';
        videoPlayer.play().catch(err => console.error('Error al reproducir:', err));
      }
    }
    if (action === 'pause') videoPlayer.pause();
    if (action === 'seek') videoPlayer.currentTime = time;
    if (action === 'reset') {
      videoPlayer.pause();
      videoPlayer.src = '';
      videoContainer.style.display = 'none';
    }

    videoPlayer.onended = () => {
      videoContainer.style.display = 'none';
      videoPlayer.src = '';
    };
  };
});

// Hacer la función global para la vista principal
function sincronizarVideo(pathVideo) {
  const path = `/videos/${pathVideo}`;
  const time = 0;
  channelVideo.postMessage({ action: 'play', time, path });
}
window.sincronizarVideo = sincronizarVideo;
