require('./bootstrap');

import { createApp } from 'vue';

import AnimalFarming from './Components/AnimalFarming.vue';


const app = createApp({});
app.component('AnimalFarming', AnimalFarming);
const mountedApp = app.mount('#app');


let test = app;
console.log(test);
