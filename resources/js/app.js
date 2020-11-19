require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('autocomplete-comunas', require('./components/BuscadorComuna.vue').default);

const app = new Vue({
    el: '#app',
});
