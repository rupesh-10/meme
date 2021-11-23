<template>
    <div>
        <span class="dislike" data-toggle="tooltip" title="dislike">
            <i :class="icon()" @click="dislike()"></i>
            <span class="">2.2k</span>
        </span>
        <!-- <a class="p-2 d-flex text-dark" @click="dislike()"> <i v-bind:class="icon()"></i> </a> -->
    </div>
</template>
<script>
import {mapGetters,mapActions} from 'vuex';
export default {
    props: {
        memeId:{
            type:[Number,String],
            required:true,
        },
        disliked:{
            type:[Boolean,Number],
            required:true,
        }
    },

    mounted() {
        // alert(this.memeId)
    },
    data: function() {
        return {
            status: this.disliked
        };
    },
      computed:{
        meme: function(){
            return this.$store.state.memes.find(meme=> meme.id = this.memeId)
        }
    },
    methods: {
        dislike() {
            this.$store.dispatch('dislike',this.memeId)
        },
         icon() {
            return {
                'fa-2x fas fa-frown text-danger' : this.meme.disliked,
                'fa-2x fas fa-frown text-dark' : !this.meme.disliked
            }
        }
    },
};
</script>
