<template>
    <v-content>
        <v-card>
            <v-card-title>
                Modifiez vos données personnelles
            </v-card-title>
            <v-card-text>
                <v-alert type="success" v-if="message" dismissible>
                    {{success}}
                </v-alert>
                <v-alert type="error" v-if="error" dismissible>
                    {{error}}
                </v-alert>
                <v-form @submit.prevent="updateUser" enctype="multipart/form-data">
                    <v-text-field label="Nom complet" readonly
                                  v-model="userData.name"
                                  prepend-icon="mdi-account-circle"/>
                    <v-text-field label="Email" readonly
                                  v-model="userData.email"
                                  prepend-icon="mdi-email"/>
                    <v-file-input label="Avatar" v-model="avatar" />
                    <template v-if="!userData.city_id">
                        <v-select label="Région"
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
                            @change="setCity"
                            :items="Cities.cities"
                        >
                        </v-select>
                    </template>
                    <v-text-field v-else label="Ville" readonly
                                  v-model="userData.city.name" prepend-icon="mdi-map"/>
                    <v-text-field label="Ancien mot de passe"
                                  v-model="oldPassword"
                                  :type="showPassword? 'text' : 'password'"
                                  prepend-icon="mdi-lock"
                                  :append-icon="showPassword? 'mdi-eye' : 'mdi-eye-off'"
                                  @click:append="showPassword = !showPassword"/>
                    <v-text-field label="Nouveau mot de passe"
                                  v-model="newPassword"
                                  :type="showPassword? 'text' : 'password'"
                                  prepend-icon="mdi-lock"
                                  :append-icon="showPassword? 'mdi-eye' : 'mdi-eye-off'"
                                  @click:append="showPassword = !showPassword"/>
                    <v-btn type rounded color="success">Mettre a jour</v-btn>
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
            ...mapGetters({'user' : 'User/getUser', 'success':'User/getMessage'})
        },
        data(){
            return{
                userData: null,
                city: null,
                showPassword: false,
                oldPassword: '',
                newPassword: '',
                avatar: [],
                error: '',
                message: ''
            }
        },

        created() {
            this.$store.dispatch('Regions/fetchRegions')
            this.userData = this.user
        },

        methods:{
            getCities(event){
                this.$store.dispatch('Cities/fetchCities', event)
            },

            setCity(event){
                this.city = event
            },

            updateUser(){
                const fd = new FormData()
                //check if avatar is of type file
                if ('File' in window && this.avatar instanceof File){
                    fd.append('avatar', this.avatar, this.avatar.name)
                }
                fd.append('_method', 'PUT')
                fd.append('city_id', this.userData? this.userData.city.id:this.city)
                fd.append('oldPassword', this.oldPassword)
                fd.append('newPassword', this.newPassword)
                fd.append('user', this.userData.name)

                this.$store.dispatch('User/update', fd)
                    .then(() => {
                        this.message = this.success
                        setTimeout(() =>{this.message = ''}, 5000)
                    })
                    .catch(err => {
                        this.error = err.response.data.message
                        setTimeout(() =>{this.error = ''}, 5000)
                })
            }
        }
    }
</script>

<style scoped>

</style>
