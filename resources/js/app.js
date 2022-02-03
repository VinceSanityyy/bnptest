import { createApp } from 'vue';
require('./bootstrap');


let app=createApp({})
app.component('example', require('./components/ExampleComponent.vue').default);
app.mount("#app")