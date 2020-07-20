<template>
    <v-main>
        <v-btn
            fab
            dark
            absolute
            top
            right
            color="indigo"
            @click="add"
        >
            <v-icon>mdi-plus</v-icon>
        </v-btn>
        <div v-for="(posts, index) in Posts" :key="index" v-if="Posts.length > 0">
            <v-card v-for="post in posts" :key="post.id" class="mt-10">
                <v-card-title @click="showPost(post.id)" class="cardTitle">{{post.title}}</v-card-title>
                <v-card-text>{{post.body.substring(0,50)}}...</v-card-text>
                <v-card-actions absolute top right>
                    <v-speed-dial
                        v-model="fab"
                        top
                        right
                        absolute
                        direction="left"
                        :open-on-hover="true"
                        transition="slide-y-reverse-transition"
                    >
                        <template v-slot:activator>
                            <v-btn
                                v-model="fab"
                                color="blue darken-2"
                                dark
                                fab
                            >
                                <v-icon v-if="fab">mdi-close</v-icon>
                                <v-icon v-else>mdi-account-circle</v-icon>
                            </v-btn>
                        </template>
                        <v-btn
                            fab
                            dark
                            small
                            color="green"
                            @click="edit(post.id)"
                        >
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn
                            fab
                            dark
                            small
                            color="red"
                            @click="deletePost(post.id)"
                        >
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </v-speed-dial>
                </v-card-actions>
            </v-card>
        </div>
        <div v-else class="text-h3 text-center grey--text">
            Vous n'avez aucun poste pour le moment.
        </div>
        <v-alert type="success" v-if="message" dismissible>
            {{message}}
        </v-alert>
        <v-alert type="error" v-if="error" dismissible>
            {{error}}
        </v-alert>
    </v-main>
</template>
<script>
    import { mapGetters } from 'vuex';
    export default {
        name: 'Profile',
        computed: {
            ...mapGetters({'User' : 'User/getUser'})
        },
        data(){
          return {
              fab: false,
              Posts: null,
              message: '',
              error: ''
          }
        },
        mounted() {
           this.fetchPosts()
        },
        methods:{
            fetchPosts(){
                axios.get(`/api/${this.User.id}/posts`).then((response) => {
                    this.Posts = response.data
                }).catch(err => console.log(err))
            },
            showPost(id){
                this.$router.push({name: 'showPost', params:{id: id}})
            },
            edit(post){
                this.$router.push({name: 'EditPost', params:{post: post}})
            },
            add(){
                this.$router.push({name:'AddPost'})
            },
            deletePost(post){
                axios.delete(`/api/posts/${post}`).then((response) => {
                    this.message = response.data.message
                    this.fetchPosts()
                    console.log(this.message)
                    setTimeout(() =>{this.message = ''}, 5000)
                }).catch(err => {
                    this.error = err.response.data.message
                    setTimeout(() =>{this.error = ''}, 5000)
                })
            }
        }
    }
</script>
<style>
    .cardTitle{
        cursor: pointer;
    }
</style>
