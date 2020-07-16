<template>
    <v-content>
        <v-card v-for="post in posts" :key="post.id" @click="showPost(post[0].id)">
            <v-card-title>{{post[0].title}}</v-card-title>
            <v-card-text>
                {{post[0].body.substring(0,50)}}...
            </v-card-text>
        </v-card>
    </v-content>
</template>

<script>
export default {
    data(){
        return {
            posts: null
        }
    },
    created() {
        axios.get('/api/posts').then(response => {
            this.posts = response.data
        }).catch(e => console.log(e))
    },
    methods:{
        showPost(id){
            this.$router.push({name: 'showPost', params:{id: id}})
        }
    }
}
</script>
