import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/dist/js/adminlte.min.js";

import { createApp } from 'vue';
import App from './App.vue';
import { createPinia } from "pinia";
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import router from './router';
import ElementPlus from 'element-plus'

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

const app = createApp(App);
app.use(router)
app.use(pinia)
app.use(ElementPlus);
app.mount('#app');
