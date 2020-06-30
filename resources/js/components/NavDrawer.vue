<template>
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
                    active-class="deep-purple--text text--accent-4">
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
                                <v-btn class="white--text" to="/login" rounded text>Connexion</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item link>
                        <v-list-item-content>
                            <v-list-item-title>
                                <v-btn class="white--text" to="/register" rounded text>Inscription</v-btn>
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer> 
</template>
<script>
export default {
        props:{
            drawer:{
                type: Boolean,
                default: null
            },
            group:{
                default: null
            }
        },

        watch: {
            group () {
                this.drawer = false
            },
        },

        // computed:{
        //     getDrawer(){
        //         return this.drawer
        //     },
        //     getGroup(){
        //         return this.group
        //     }
        // }
}
</script>