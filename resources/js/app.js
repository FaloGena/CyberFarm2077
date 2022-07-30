require('./bootstrap');

import { createApp } from 'vue';

import Test from './Components/Test.vue';

createApp({
    components: {
        Test
    }
}).mount('#app')
