require('../../bootstrap')

window.Vue = require('vue');
import Vuex from "vuex";

Vue.use(Vuex);
import Like from './LikeComponent';
import Dislike from './DislikeComponent';
import Meme from './MemeComponent';

const app = new Vue({
    el: '#app',
    components:{
        'like-component':Like,
        'dislike-component':Dislike,
        'meme-component':Meme,
    }
});
