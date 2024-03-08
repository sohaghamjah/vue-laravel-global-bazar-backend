import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/dist/js/adminlte.min.js";

import { createApp } from 'vue';
import App from './App.vue';
import router from './router'

const app = createApp(App);
app.use(router)
app.mount('#app');
