import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler'
import { createRouter, createWebHistory } from 'vue-router'

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css'


import App from './App.vue'
import CatalogySingers from './components/CatalogySingers.vue'
import CatalogySongs from "./components/CatalogySongs.vue";

const router = createRouter({
    routes: [
        {
            path: '/',
            name: 'singers',
            component: CatalogySingers
        },
        {
            path: '/songs',
            name: 'songs',
            component: CatalogySongs
        }
    ],
    history: createWebHistory()
})

createApp(App).use(router).component('v-select', vSelect).mount("#app")
