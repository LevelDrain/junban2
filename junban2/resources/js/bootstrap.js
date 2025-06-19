import axios from 'axios';

window.axios = axios;

axios.defaults.withCredentials = true;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.baseURL = import.meta.env.VITE_APP_BASE_URL || '/';

const token = document.querySelector('meta[name="csrf-token"]');
if (token) {
  axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found in meta tag');
}

axios.get('/sanctum/csrf-cookie')
  .then(() => {
      console.log('CSRF cookie set');
  })
  .catch((error) => {
    console.error('CSRF cookie failed', error);
  });