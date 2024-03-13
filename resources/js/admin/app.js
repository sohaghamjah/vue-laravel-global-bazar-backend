import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/dist/js/adminlte.min.js";

import { createApp } from 'vue';
import App from './App.vue';
import { createPinia } from "pinia";
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import router from './router';
import ElementPlus from 'element-plus'
import jquery from 'jquery';
import DropZone from 'dropzone-vue';

window.$ = window.jQuery = jquery;

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

const app = createApp(App);
app.use(router)
app.use(DropZone)
app.use(pinia)
app.use(ElementPlus);
app.mount('#app');
