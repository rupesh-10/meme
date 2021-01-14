<template>
    <div>
     <a class="btn btn-primary ml-4" @click="connect" v-text="button"></a>    
    </div>
</template>

<script>
    export default {
        props : ['userId','connection'],

        mounted() {
        
        },
        data:function(){
            return {
          status : this.connection
            }
        },
        methods:{
           connect(){
               axios.post('/connect/'+this.userId).then(response=>{
                   this.status = !this.status;
                   console.log(response.data)
               })
               .catch(errors=>{
                   if(errors.response.status==401){
                       window.location = '/login';
                   }    
               })
           },
           commputed:{
            button(){
            return (this.status) ? 'Connected' :'Connect'
            }
        }
    }
</script>
