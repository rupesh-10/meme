<template>
    <div>
        <a class="p-2 d-flex text-dark" @click="dislike()"> <i v-bind:class="icon()"></i> </a>
    </div>
</template>
<script>
export default {
    props: ["memeId", "disliked"],

    mounted() {
        console.log(this.memeId);
    },
    data: function() {
        return {
            status: this.dislike
        };
    },
    methods: {
        dislike() {
            axios
                .get("/dislike/" + this.memeId)
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
                'fa-2x fas fa-thumbs-down text-dark' :this.status,
                'fa-2x far fa-thumbs-down text-info' : !this.status
            }
        }
    },
};
</script>