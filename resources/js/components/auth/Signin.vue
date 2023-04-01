<template>
    <form @submit.prevent="signIn">
        <div>
            <label for="email">username</label>
            <input name="email" v-model="data.email" placeholder="username">
        </div>
        <div>
            <label for="password">password</label>
            <input name="password" v-model="data.password" placeholder="password" type="password">
        </div>
        <input type="submit" value="login">
    </form>
</template>

<script>
export default {
    name: "Signin",
    data() {
        return {
            data: {
                email: 'john@gmail.com',
                password: '12345678'
            }
        }
    },
    methods: {
        signIn() {
            this.$store.dispatch('signIn', this.data).then(() => {
                this.$store.dispatch('auth').then(() => {
                    this.$router.push({name: 'home'})
                })
            })
        }
    }
}
</script>

<style scoped>

</style>
