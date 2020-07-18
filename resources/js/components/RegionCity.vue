<template>
    <v-main>
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
        <template v-if="Cities.cities.length > 0">
            <v-row class="d-flex justify-center">
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
                        @change="setCityId"
                    >
                    </v-select>
                </v-col>
            </v-row>
            <v-row v-show="city_id">
                <v-col class="d-flex justify-end">
                    <v-btn float right absolute bottom color="green" dark @click="fetchPosts">Continuer</v-btn>
                </v-col>
            </v-row>
        </template>
    </v-main>
</template>
<script>
     import { mapState } from 'vuex';
    export default {
        name: "RegionCity",

        computed: {
            ...mapState(['Regions', 'Cities'])
        },
        data(){
            return{
                city_id: null
            }
        },

        mounted() {
            this.$store.dispatch('Regions/fetchRegions')
        },

        methods:{
            getCities(event){
                this.$store.dispatch('Cities/fetchCities', event)
            },
            setCityId(event){
              this.city_id = event
            },
            fetchPosts(){
                this.$router.push({name: 'CityPosts', params:{'city' : this.city_id}})
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
