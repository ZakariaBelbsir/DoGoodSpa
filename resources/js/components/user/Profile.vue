<template>
    <v-content>
        <h1>Dashboard</h1>
    </v-content>
</template>
<script>
    export default {
        name: 'Profile',
        mounted() {
            // only reload page once
            // if (localStorage.getItem('reloaded')) {
            //     localStorage.removeItem('reloaded');
            // } else {
            //     localStorage.setItem('reloaded', '1');
            //     location.reload();
            // }
            axios.get('/api/posts').then(response => {

            })
        }
    }
</script>
