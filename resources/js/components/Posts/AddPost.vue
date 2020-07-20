<template>
    <v-main>
        <v-card>
            <v-card-title class="green--text">Vous êtes en difficulté? Obtenez eu l'aide dès maintenant!</v-card-title>
            <v-card-text>
                <v-form @submit.prevent="addPost">
                    <v-text-field label="titre" v-model="title" />
                    <v-textarea label="Description" v-model="body"/>
                    <v-btn type rounded color="success" absolute bottom right float class="mt-10">Ajouter</v-btn>
                </v-form>
            </v-card-text>
            <v-list v-if="errors">
                <v-list-item v-for="(error, index) in errors" :key="index">
                    <v-list-item-title class="red--text">{{error[0]}}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-card>
    </v-main>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        name: "AddPost",
        data(){
            return{
                title: '',
                body: '',
                errors: null
            }
        },
        computed:{
          ...mapGetters({'user' : 'User/getUser'})
        },
        methods: {
            addPost(){
                axios.post('/api/posts', {
                    'title': this.title,
                    'body': this.body,
                }).then(() =>{
                    this.$router.push({name: 'Profile', params:{user: this.user.id}})
                })
                .catch(err => this.errors = err.response.data.errors)
            }
        }
    }
</script>

<style scoped>

</style>
