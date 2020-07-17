<template>
    <v-content>
        <h1 class="text-h1">404 NOT FOUND</h1>
        <h1 clqss="text-h3">Oops! On dirait que vous êtes perdu...</h1>
        <v-btn :to="{ name: 'Home' }">Revenir vers la page d'acceuil</v-btn>
    </v-content>
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped>

</style>
