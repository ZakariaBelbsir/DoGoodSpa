<template>
    <v-main>
        <v-card v-for="post in posts" :key="post.id" v-if="posts" @click="showPost(post[0].id)">
            <v-card-title>{{post[0].title}}</v-card-title>
            <v-card-text>{{post[0].body.substring(0,50)}}...</v-card-text>
        </v-card>
    </v-main>
</template>

<script>
    import { mapGetters } from 'vuex';
    export default {
        name: "CityPosts",
       computed: {
            ...mapGetters({'posts' : 'Posts/getPosts'})
       },
        mounted() {
            this.$store.dispatch('Posts/fetchAllPosts')
        },
        methods:{
            showPost(id){
            this.$router.push({name: 'showPost', params:{id: id}})
            }
        }
    }
</script>

<style scoped>

</style>
