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
        </v-card>
    </v-main>
</template>

<script>
    export default {
        name: "AddPost",
        data(){
            return{
                title: '',
                body: ''
            }
        },
        methods: {
            addPost(){
                axios.post('/api/posts', {
                    'title': this.title,
                    'body': this.body,
                }).then((response) =>{console.log(response)})
                .catch(err => console.log(err.response.data.errors))
            }
        }
    }
</script>

<style scoped>

</style>
