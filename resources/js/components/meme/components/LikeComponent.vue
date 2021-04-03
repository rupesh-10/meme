<template>
    <div>
        <a class="p-2 d-flex text-dark" @click="like()"> <i v-bind:class="icon()"></i> </a>
    </div>
</template>
<script>
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
    data: function() {
        return {
            status: this.liked
        };
    },
    methods: {
        like() {
            axios
                .get("/api/like/" + this.memeId)
                .then(response => {
                    this.status = !this.status;
                    console.log(response.data);
                })
                .catch(errors => {
                    if (errors.response.status == 401) {
                        window.location = "/login";
                    }
                });
        },
         icon() {
            return {
                'fa-2x fas fa-thumbs-up text-dark' :this.status,
                'fa-2x far fa-thumbs-up text-info' : !this.status
            }
        }
    },
};
</script>
