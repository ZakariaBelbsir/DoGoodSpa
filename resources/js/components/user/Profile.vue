<template>
    <v-content>
        <h1>Dashboard</h1>
    </v-content>
</template>
<script>
    export default {
        name: 'Profile',
        mounted(){
            axios.get('/api/posts').then(response => {

            })
        }
    }
</script>
