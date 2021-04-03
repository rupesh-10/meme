require('../../bootstrap')

window.Vue = require('vue');
import store from './store';

import Like from './components/LikeComponent';
import Dislike from './components/DislikeComponent';
import Meme from './components/MemeComponent';

const app = new Vue({
    el: '#app',
    store,
    components:{
        'like-component':Like,
        'dislike-component':Dislike,
        'meme-component':Meme,
    }
});
