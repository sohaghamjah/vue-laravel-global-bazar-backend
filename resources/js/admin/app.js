import "../bootstrap";

import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/dist/js/adminlte.min.js";
import ElementPlus from 'element-plus';

import piniaPluginPersistedstate from 'pinia-plugin-persistedstate';

import { createPinia } from "pinia";
const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);

import router from './router';
import { createApp } from 'vue';
import App from './App.vue';


import DropZone from 'dropzone-vue';
// optionally import default styles
import 'dropzone-vue/dist/dropzone-vue.common.css';

const app = createApp(App);
app.use(router);
app.use(pinia);
app.use(ElementPlus);
app.use(DropZone);
app.mount('#app');
