require('./bootstrap');
import { createApp } from 'vue';
import App from './vue/App';
import router from './vue/router';

createApp(App)
  .use(router)
  .mount('#app')
