<template>
    <v-main>
        <v-container>
            <v-row class="elevation-12">
                <v-col cols="12" md="4" class="green accent-3">
                    <v-card-text class="white--text mt-12">
                        <h5 class="text-center">
                            Veuillez vous inscrivez pour commencer des maintenant a aider les autres
                            ou a obtenir de l'aide!
                        </h5>
                    </v-card-text>
                    <div class="text-center">
                        <h5 class="text-center white--text mt-4 mb-2">
                           Vous avez deja un compte?
                        </h5>
                        <v-btn rounded outlined dark to="/login">Se connecter</v-btn>
                    </div>
                </v-col>
                <v-col cols="12" md="8">
                    <v-card-text class="mt-12">
                        <h1 class="text-center display-2 green--text text--accent-3">
                            Inscription
                        </h1>
                        <div class="text-center mt-4">
                            <v-btn class="mx-2" fab color="black" outlined>
                                <v-icon>mdi-facebook</v-icon>
                            </v-btn>
                            <v-btn class="mx-2" fab color="black" outlined>
                                <v-icon>mdi-google-plus</v-icon>
                            </v-btn>
                        </div>
                        <ul>
                            <li class="red--text" v-for="(error, index) in errors" :key="index">{{error[0]}}</li>
                        </ul>
                        <v-form @submit.prevent="register">
                            <v-text-field
                                label="Nom Complet"
                                prepend-icon="mdi-account"
                                v-model="name"
                                type="text" />
                            <v-text-field
                                label="Adresse mail"
                                prepend-icon="mdi-email"
                                v-model="email"
                                type="email" />
                            <v-text-field
                                label="Mot de passe"
                                v-model="password"
                                prepend-icon="mdi-lock"
                                type="password" />
                            <v-text-field
                                label="Confirmer le mot de passe"
                                prepend-icon="mdi-lock"
                                v-model="password_confirmation"
                                type="password" />
                            <div class="text-center mt-3">
                                <v-btn type rounded color="green accent-3" dark>S'inscrire</v-btn>
                            </div>
                        </v-form>
                    </v-card-text>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>
<script>
export default {
    name: 'Register',
    data(){
        return {
            email: '',
            password: '',
            password_confirmation: '',
            name: '',
            errors: []
        }
    },

    methods:{
        register(){
            this.$store.dispatch('User/register', {
                'name' : this.name,
                'email' : this.email,
                'password' : this.password,
                'password_confirmation' : this.password_confirmation
            }).then(() => {
                let user = JSON.parse(localStorage.getItem('user'))
                this.$router.push({name: 'Profile', params: {user: user.user.name}})
            }).catch(err => {
                this.errors = err.response.data.errors
            })
        }
    }
}
</script>
<style scoped>
    ul{
        list-style-type: none;
    }
</style>
