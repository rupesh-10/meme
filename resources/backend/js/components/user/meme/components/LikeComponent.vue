<template>
    <div>
        <span class="views" data-toggle="tooltip" title="views">
            <i class="" @click="like()" v-bind:class="icon()"></i>
            <span class="">1.2k</span>
        </span>
    </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex';
export default {
    props: {
        memeId:{
            type:[String, Number],
            required:true,
        },
        liked:{
            type:[Boolean,Number],
            required:true,
        },
    },
    mounted() { 
    },
    computed:{
        meme(){
           return  this.$store.state.memes.find(meme=> meme.id = this.memeId)
        }
    },
    methods: {
        like() {
          this.$store.dispatch('like',this.memeId)
        },
         icon() {
            return {
                'fa-2x fas fa-grin-squint text-success' :this.meme.liked,
                'fa-2x fas fa-grin-squint text-dark' : !this.meme.liked
            }
        }
    },
};
</script>
