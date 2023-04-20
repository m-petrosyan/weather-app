<template>
    <form @submit.prevent="signUp">
        <div>
            <input name="email" v-model="data.email" placeholder="email" type="email">
        </div>
        <div>
            <input name="password" v-model="data.password" placeholder="password" type="password">
        </div>
        <div>
            <input type="text" name="fullName" v-model="data.name" placeholder="full name">
        </div>
        <input type="submit" value="register">
    </form>
</template>

<script>
export default {
    name: "Signup",
    data() {
        return {
            data: {
                email: '',
                name: '',
                password: ''
            }
        }
    },
    methods: {
        signUp() {
            this.$store.dispatch('signUp', this.data).then(() => {
                this.$router.push({name: 'signin'})
            })
        }
    }
}
</script>

<style scoped>

</style>
