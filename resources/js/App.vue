<template>
    <TopNavbar/>
    <main>
        <router-view/>
    </main>
</template>

<script>
import TopNavbar from "./components/nav/TopNavbar.vue";

export default {
    name: "App",
    components: {TopNavbar},
    created() {
        if (sessionStorage.getItem('token')) {
            this.$store.dispatch('auth').then(() => {
                this.$router.push({name: 'home'})
            })
        }
    },
}
</script>

<style scoped lang="scss">

main {
    max-width: var(--l);
    margin: 50px auto auto auto;
}
</style>
