import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Inisialisasi Alpine
Alpine.start();

// Toast notification helper (jika dibutuhkan)
window.showToast = function(message, type = 'success') {
    const event = new CustomEvent('toast', {
        detail: { message, type }
    });
    window.dispatchEvent(event);
};

console.log('🚀 SIMAPRA App Loaded');