require('../../bootstrap')

window.Vue = require('vue');
import store from './store'

import Connect from './components/ConnectComponent';
const app = new Vue({
    el: '#app',
    store,
    components:{
        'connect-component':Connect,
    }
});
