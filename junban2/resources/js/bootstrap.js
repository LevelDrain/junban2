import axios from 'axios';
window.axios = axios;

window.axios.defaults.withCredentials = true;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.get('/sanctum/csrf-cookie')
  .then(() => {
      console.log('CSRF cookie set');
  })
  .catch((error) => {
    console.error('CSRF cookie failed', error);
  });