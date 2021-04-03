require('../../bootstrap')

window.Vue = require('vue');
import Vuex from "vuex";

Vue.use(Vuex);
import Connect from './ConnectComponent';
const app = new Vue({
    el: '#app',
    components:{
        'connect-component':Connect,
    }
});
