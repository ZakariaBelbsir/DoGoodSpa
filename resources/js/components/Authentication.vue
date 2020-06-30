<template>
        <v-content>
            <v-container class="fill-height mx-auto container" width="200px">
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="8">
                        <v-card class="elevation-12">
                            <v-window v-model="step">
                                <v-window-item :value="1">
                                    <v-row>
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
                                                    <h3 class="text-center mt-3">Mot de passe oublie?</h3>
                                                    <div class="text-center mt-3">
                                                        <v-btn rounded type color="green accent-3" dark>Se connecter</v-btn>
                                                    </div>
                                                </v-form>
                                            </v-card-text>
                                        </v-col>
                                        <v-col cols="12" md="4" class="green accent-3">
                                            <v-card-text class="white--text mt-12">
                                                <h5 class="text-center">Veuillez vous connecter pour commencer des maintenant a aider les autres
                                                    ou a obtenir de l'aide!</h5>
                                            </v-card-text>
                                            <div class="text-center">
                                                <v-btn rounded outlined dark @click="step++">Inscription</v-btn>
                                            </div>
                                        </v-col>
                                    </v-row>
                                </v-window-item>
                                <v-window-item :value="2">
                                    <v-row>
                                        <v-col cols="12" md="4" class="green accent-3">
                                            <v-card-text class="white--text mt-12">
                                                <h5 class="text-center">
                                                    Veuillez vous inscrivez pour commencer des maintenant a aider les autres
                                                    ou a obtenir de l'aide!
                                                </h5>
                                            </v-card-text>
                                            <div class="text-center">
                                                <v-btn rounded outlined dark @click="step--">Se connecter</v-btn>
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
                                                        label="Nom complet"
                                                        v-model="name"
                                                        prepend-icon="mdi-account"
                                                        type="text" />
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
                                                    <v-text-field
                                                        label="Confirmer le mot de passe"
                                                        v-model="password_confirmation"
                                                        prepend-icon="mdi-lock"
                                                        type="password" />

                                                    <div class="text-center mt-3">
                                                        <v-btn rounded type color="green accent-3" dark>S'inscrire</v-btn>
                                                    </div>
                                                </v-form>
                                            </v-card-text>
                                        </v-col>
                                    </v-row>
                                </v-window-item>
                            </v-window>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
</template>
<script>
export default {
    data: () => ({
        step: 1,
         email: '',
        password: '',
        password_confirmation: '',
        name: '',
        error: null,
        errors: []
    }),

    props:{
        source: String
    },

    methods:{
        register(){
            this.$store.dispatch('User/register', {
                'name' : this.name,
                'email' : this.email,
                'password' : this.password,
                'password_confirmation' : this.password_confirmation
            }).then(() => {
                this.$router.push('/profile')
            }).catch(err => {
                this.errors = err.response.data.errors
            })
        },
        login() {
            this.$store.dispatch('User/login', {
                'email': this.email,
                'password': this.password
            }).then(() => {
                this.$router.push('/profile')
            }).catch(err => {
                this.error = err.response.data.message
            })
        }
    }
}
</script>

<style scoped>
    /* .container{
        width: 60%;
    } */
</style>
