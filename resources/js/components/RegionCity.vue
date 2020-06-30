<template>
    <v-content>
          <v-row class="d-flex justify-center">
                <v-col cols="12">
                    <h1 class="text-center">Veuillez choisir votre region</h1>
                </v-col>
                <v-col cols="8">
                    <v-select
                    label=""
                    item-text="name"
                    item-value="id"
                    :items="Regions.regions"
                    @change="getCities"
                    >
                    </v-select>
                </v-col>
            </v-row>
            <v-row class="d-flex justify-center" v-if="Cities.cities.length > 0">
                <v-col cols="12">
                    <h1 class="text-center">Veuillez choisir votre ville</h1>
                </v-col>
                <v-col cols="8">
                    <v-select
                    class="select"
                    label=""
                    item-text="name"
                    item-value="id"
                    :items="Cities.cities"
                    >
                    </v-select>
                </v-col>
            </v-row>
    </v-content>
</template>
<script>
     import { mapState } from 'vuex';
    export default {
        name: "RegionCity",

        computed: {
            ...mapState(['Regions', 'Cities'])
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
    h1{
        font-family: 'Dancing Script', cursive;
        font-size: 3em;
    }
</style>