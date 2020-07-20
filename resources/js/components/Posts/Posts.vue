<template>
    <v-main>
        <div v-for="(posts, index) in Posts" :key="index">
            <v-card v-for="post in posts" :key="post.id" @click="showPost(post.id)" class="my-5">
                <v-card-title>{{post.title}}</v-card-title>
                <v-card-text>
                    {{post.body.substring(0,50)}}...
                </v-card-text>
            </v-card>
        </div>
    </v-main>
</template>

<script>
export default {
    data(){
        return {
            Posts: null
        }
    },
    created() {
        axios.get('/api/posts').then(response => {
            this.Posts = response.data
        }).catch(e => console.log(e))
    },
    methods:{
        showPost(id){
            this.$router.push({name: 'showPost', params:{id: id}})
        }
    }
}
</script>
