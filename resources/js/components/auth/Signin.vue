<template>
    <form @submit.prevent="signIn">
        <div>
            <input type="email" name="email" v-model="data.email" placeholder="email">
        </div>
        <div>
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
                    this.$store.dispatch('getHistory').then(() => {
                        this.$router.push('/')
                    })
                })
            })
        }
    }
}
</script>

<style scoped>

</style>
