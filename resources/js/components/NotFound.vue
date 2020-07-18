<template>
    <v-main>
        <div class="d-flex justify-center">
                <h1 class="red--text">404 PAGE INTROUVABLE</h1>
        </div>
        <div class="d-flex justify-center align-center">
            <h3 class="red--text">Oops! On dirait que vous êtes perdu...</h3>
            <v-btn to="/" text color="teal" rounded>Revenir vers la page d'acceuil</v-btn>
        </div>
    </v-main>
</template>

<script>
    export default {
        name: "NotFound"
    }
</script>

<style scoped>

</style>
