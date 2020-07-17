<template>
    <v-content>
        <v-card v-if="post">
            <v-card-title>
                <h3>{{post.title}}</h3>
                <v-spacer></v-spacer>
                <p>created by <router-link :to="{name: 'userProfile', params:{id: post.user.id}}">{{post.user.name}}</router-link></p>
            </v-card-title>
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
