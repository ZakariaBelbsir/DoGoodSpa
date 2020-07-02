<template>
    <v-container>
        <v-app-bar
            color="#E5393"
            fixed
            dark
            :src="require('../assets/flag.jpg')"
            app
        >
            <v-row >
                <v-app-bar-nav-icon class="d-md-none" @click.stop="drawer=!drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Dir Lkhir</v-toolbar-title>

                <v-spacer></v-spacer>
                <div class="d-none d-md-flex" v-for="(link, index) in links" :key="index" v-if="!loggedIn">
                    <v-btn rounded text :to="link.url">
                        {{ link.label }}
                    </v-btn>
                </div>

                <div class="d-none d-md-flex" v-if="loggedIn">
                    <v-btn rounded text to="/">
                        Acceuil
                    </v-btn>
                    <v-btn rounded text to="/profile">
                        Profil
                    </v-btn>
                    <v-btn rounded text to="/postes">
                        Postes
                    </v-btn>
                    <v-btn rounded text :to="{name: 'settings', params: {user: user.name}}">
                        Parametres
                    </v-btn>
                    <v-btn rounded text @click="logout">
                        Deconnexion
                    </v-btn>
                </div>
            </v-row>
        </v-app-bar>

        <v-navigation-drawer
            v-model="drawer"
            temporary
            color="green darken-4"
            :src="require('../assets/flag.jpg')"
            app
        >
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title class="white--text text-uppercase font-weight-bold">Dir Lkhir</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list dense>
                <v-list-item-group
                    v-model="group"
                    active-class="deep-purple--text text--accent-4"
                    v-for="(link, index) in links" :key="index"
                    v-if="!loggedIn"
                >
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text" :to="link.url" rounded text>{{ link.label }}</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
                <v-list-item-group
                    v-model="group"
                    active-class="deep-purple--text text--accent-4"
                    v-if="loggedIn"
                >
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text" to="/" rounded text>Acceuil</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text" to="/profile" rounded text>Profil</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text" to="/postes" rounded text>Postes</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text"  rounded text :to="{name: 'settings', params: {user: user.name}}">Parametres</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text"  rounded text @click="logout">Deconnexion</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>

            </v-list>
        </v-navigation-drawer>
    </v-container>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {

        data(){
            return {
                collapseOnScroll: true,
                drawer: false,
                group: null,
                links:[
                    {label: 'Acceuil', url: '/'},
                    {label: 'Postes', url:'/postes'},
                    {label: 'Connexion', url: '/login'},
                    {label: 'Inscription', url: '/register'},
                ]
            }
        },

        computed: {
            ...mapGetters({'loggedIn' : 'User/loggedIn', 'user' : 'User/getUser'})
        },

        watch: {
            group () {
                this.drawer = false
            },
        },

        methods:{
            logout(){
                this.$store.dispatch('User/logout')
            }
        }
}
</script>
