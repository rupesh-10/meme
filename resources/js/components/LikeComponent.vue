<template>
    <div>
        <a class="p-2 d-flex text-dark" @click="like()"> <i v-bind:class="icon()"></i> </a>
    </div>
</template>
<script>
export default {
    props: ["memeId", "liked"],

    mounted() {
        console.log(this.memeId);
    },
    data: function() {
        return {
            status: this.like
        };
    },
    methods: {
        like() {
            axios
                .get("/like/" + this.memeId)
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
                'fa-2x far fa-thumbs-up text-danger' : !this.status
            }
        }
    },
};
</script>
