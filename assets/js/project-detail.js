/**
 * Thun Game Portfolio - Project Detail Interactions
 * Handles Lightbox Gallery Modal & Mechanic Video Looper
 */

(function () {
  'use strict';

  function initProjectDetail() {
    // 1. Gallery Lightbox Modal
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxClose = document.getElementById('lightbox-close');

    if (lightboxModal && lightboxImg) {
      galleryItems.forEach((item) => {
        item.addEventListener('click', () => {
          const img = item.querySelector('.gallery-img');
          const overlay = item.querySelector('.gallery-overlay') || item.querySelector('.editorial-media-caption');
          if (img) {
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt || 'Screenshot Preview';
            if (lightboxCaption) {
              lightboxCaption.textContent = overlay ? overlay.textContent.trim() : '';
            }
            lightboxModal.classList.add('active');
            document.body.style.overflow = 'hidden';
          }
        });
      });

      function closeLightbox() {
        lightboxModal.classList.remove('active');
        document.body.style.overflow = '';
      }

      if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
      }

      lightboxModal.addEventListener('click', (e) => {
        if (e.target === lightboxModal) {
          closeLightbox();
        }
      });

      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
          closeLightbox();
        }
      });
    }

    // 2. Video Looper Controls
    const looperVideo = document.querySelector('.looper-video');
    if (looperVideo) {
      looperVideo.muted = true;
      looperVideo.loop = true;
      looperVideo.playsInline = true;
      looperVideo.play().catch(() => {
        // Autoplay policy fallback
        console.log('Autoplay muted looper waiting for interaction');
      });
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initProjectDetail);
  } else {
    initProjectDetail();
  }

})();
