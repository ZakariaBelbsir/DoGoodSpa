<template>
    <v-app dark>
        <NavBar></NavBar>
        <v-container fluid>
            <router-view></router-view>
        </v-container>
    </v-app>
</template>

<script>
    import NavBar from './components/NavBar'
    export default {
        components:{
            NavBar,
        }
    }
</script>
