<template>
    <v-content>
        <v-card v-if="post">
            <v-card-title>{{post.title}}</v-card-title>
            <v-card-text>{{post.body}}</v-card-text>
        </v-card>
    </v-content>
</template>

<script>
    export default {
        name: "showPost",
        data(){
            return {
                post: null
            }
        },
        mounted() {
            axios.get(`/api/posts/${this.$route.params.id}`).then(response => {
                this.post = response.data.post
            })
        }
    }
</script>

<style scoped>

</style>
