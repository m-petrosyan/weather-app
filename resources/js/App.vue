<template>
    <main>
        <Home/>
    </main>
</template>
<script>

import Home from "@/pages/Home.vue";

export default {
    name: "App",
    components: {Home},
    created() {
        if (sessionStorage.getItem('token')) {
            this.$store.dispatch('auth').then(() => {
                this.$store.dispatch('getHistory').then(() => {
                    this.$router.push('/')
                })
            })
        }
    },
}
</script>

<style scoped lang="scss">

main {

}
</style>
