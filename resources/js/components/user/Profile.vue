<template>
    <v-main>
        <h1>Dashboard</h1>
    </v-main>
</template>
<script>
    export default {
        name: 'Profile',
        data(){
            return{
                id: 36
            }
        },
        mounted() {
            axios.get(`/api/posts/city/${this.id}`).then(response => {
                console.log(response)
            })
        }
    }
</script>
