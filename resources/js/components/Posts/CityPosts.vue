<template>
    <v-main>
        <div v-for="(posts, index) in Posts" :key="index">
            <v-card v-for="post in posts" :key="post.id" v-if="posts" @click="showPost(post.id)" class="mt-5">
                <v-card-title>{{post.title}}</v-card-title>
                <v-card-text>{{post.body.substring(0,50)}}...</v-card-text>
            </v-card>
        </div>
    </v-main>
</template>

<script>
    export default {
        name: "CityPosts",
        data(){
            return {
                Posts: null
            }
        },
        mounted() {
            axios.get(`/api/posts/city/${this.$route.params.city}`).then((response) =>{
                this.Posts = response.data
                console.log(response.data)
            }).catch(err => console.log(err))
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
