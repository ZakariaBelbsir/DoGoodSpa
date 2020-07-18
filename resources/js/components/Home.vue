<template>
    <v-main>
        <v-img :src="require('../assets/solidarity.jpg')" min-height="100vh" max-height="200vh" class="d-flex justify-center elevation-6">
            <v-row justify="center" align="center" v-if="!loggedIn">
                <v-col cols="12" lg="3" class="text-center">
                <v-dialog v-model="dialog">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn rounded color="red darken-3" dark  v-bind="attrs" v-on="on">
                            Continuer en tant que visiteur
                        </v-btn>
                    </template>
                    <v-card>
                        <v-card-text>
                            <RegionCity />
                        </v-card-text>
                    </v-card>
                </v-dialog>
                </v-col>
                <v-col cols="12" lg="9">
                    <Authentication />
                </v-col>
            </v-row>
        </v-img>
    </v-main>
</template>

<script>
    import RegionCity from './RegionCity';
    import Authentication from './Authentication';
    import { mapGetters } from 'vuex'
    export default {
        name: "Home",
        components:{
            RegionCity,
            Authentication
        },
        data: () => ({
            dialog: false,
        }),
        computed: {
            ...mapGetters({'loggedIn' : 'User/loggedIn'})
        },
    }
</script>

