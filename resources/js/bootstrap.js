import axios from 'axios';

window.axios = axios;

// Default headers untuk semua request
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Accept'] = 'application/json';

// Interceptor untuk menangani error global
window.axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response && error.response.status === 401) {
            // Redirect ke login jika session expired
            if (!window.location.pathname.includes('/login')) {
                window.location.href = '/login';
            }
        }
        if (error.response && error.response.status === 403) {
            // Tampilkan alert untuk forbidden
            console.warn('⚠️ Akses ditolak:', error.response.data.message);
        }
        return Promise.reject(error);
    }
);

console.log('✅ Axios configured');