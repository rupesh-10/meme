<template>
    <div>
         <a class="p-2 d-flex" @click="like()"> <i v-bind:class="icon()"></i> </a>
    </div>
</template>
<script>
export default {
    props: ['memeId','liked'],
    method:{
        like(){
            axios.post('/like'+this.memeId).then(res=>{

            });
        }
    }
};
</script>
