<template>
    <v-content>
        <v-card>
            <v-card-title>
                Modifiez vos donnees personnelles
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field label="Nom complet" readonly v-model="user.name"/>
                    <v-text-field label="Email" readonly v-model="user.email"/>
                    <v-select label="Region"
                              :items="Regions.regions"
                              @change="getCities"
                              item-text="name"
                              item-value="id">
                    </v-select>
                    <v-select
                        v-if="Cities.cities.length > 0"
                        class="select"
                        label="Villes"
                        item-text="name"
                        item-value="id"
                        :items="Cities.cities"
                    >
                    </v-select>
                    <v-text-field label="Mot de passe"/>
                    <v-text-field label="Confirmez le mot de passe" />
                </v-form>
            </v-card-text>
        </v-card>
    </v-content>
</template>

<script>
    import { mapState, mapGetters } from 'vuex';

    export default {
        name: "Settings",
        computed: {
            ...mapState(['Regions', 'Cities']),
            ...mapGetters({'user' : 'User/getUser'})
        },

        mounted() {
            this.$store.dispatch('Regions/fetchRegions')
        },

        methods:{
            getCities(event){
                this.$store.dispatch('Cities/fetchCities', event)
            }
        }
    }
</script>

<style scoped>

</style>
