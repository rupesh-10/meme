<template>
    <div>
        <span class="views" data-toggle="tooltip" title="views">
            <i class="" @click="like()" v-bind:class="icon()"></i>
            <span class="">1.2k</span>
        </span>
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
                'fa-2x fas fa-grin-squint text-success' :this.status,
                'fa-2x fas fa-grin-squint text-dark' : !this.status
            }
        }
    },
};
</script>
