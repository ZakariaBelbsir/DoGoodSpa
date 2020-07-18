<template>
    <v-main>
        <v-card v-if="post">
            <v-card-title>
                <h3>{{post.title}}</h3>
                <v-spacer></v-spacer>
                <p>created by {{post.user.name}}</p>
            </v-card-title>
            <v-card-text>{{post.body}}</v-card-text>
        </v-card>
    </v-main>
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
