<template>
    <v-content>
        <v-container>
            <v-row class="elevation-12">
                <v-col cols="12" md="4" class="green accent-3">
                    <v-card-text class="white--text mt-12">
                        <h5 class="text-center">
                            Veuillez vous connecter pour commencer des maintenant a aider les autres
                            ou a obtenir de l'aide!
                        </h5>
                    </v-card-text>
                    <div class="text-center">
                        <h5 class="text-center white--text mt-4 mb-2">
                           Vous n'avez pas encore de compte?
                        </h5>
                        <v-btn rounded outlined dark to="/register">Inscrivez vous</v-btn>
                    </div>
                </v-col>
                <v-col cols="12" md="8">
                    <v-card-text class="mt-12">
                        <h1 class="text-center display-2 green--text text--accent-3">
                            Connexion
                        </h1>
                        <div class="text-center mt-4">
                            <v-btn class="mx-2" fab color="black" outlined>
                                <v-icon>mdi-facebook</v-icon>
                            </v-btn>
                            <v-btn class="mx-2" fab color="black" outlined>
                                <v-icon>mdi-google-plus</v-icon>
                            </v-btn>
                        </div>
                        <p class="red--text" v-show="error">{{error}}</p>
                        <v-form @submit.prevent="login">
                            <v-text-field
                                label="Adresse mail"
                                v-model="email"
                                prepend-icon="mdi-email"
                                type="email" />
                            <v-text-field
                                label="Mot de passe"
                                v-model="password"
                                prepend-icon="mdi-lock"
                                type="password" />
                            <div class="text-center mt-3">
                                <v-btn type rounded color="green accent-3" dark>Se connecter</v-btn>
                            </div>
                        </v-form>
                    </v-card-text>
                </v-col>
            </v-row>
        </v-container>
    </v-content>
</template>
<script>
export default {
    name: 'Login',

    data(){
        return{
            email: '',
            password: '',
            error: null
        }
    },

    methods: {
        login(){
            this.$store.dispatch('User/login', {
                'email' : this.email,
                'password' : this.password
            }).then(() => {
                let user = JSON.parse(localStorage.getItem('user'))
                this.$router.push({name: 'Profile', params: {user: user.user.name}})
            }).catch(err => {
                this.error = err.response.data.message
            })
        }
    },
}
</script>
