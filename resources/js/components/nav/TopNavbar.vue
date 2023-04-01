<template>
    <nav>
        <ul class="menu">
            <li>
                <router-link :to="{name: 'home'}">Home</router-link>
            </li>
            <template v-if="!user">
                <li>
                    <router-link :to="{name: 'signin'}">Signin</router-link>
                </li>
                <li>
                    <router-link :to="{name: 'signup'}">SignUp</router-link>
                </li>
            </template>
            <template v-else>
                <li>
                    <router-link :to="{name: 'history'}">History</router-link>
                </li>
                <li>
                    <button type="submit" @click="logout">Logout</button>
                </li>
            </template>

        </ul>
    </nav>
</template>

<script>
export default {
    name: "TopNavbar",
    computed: {
        user() {
            return this.$store.getters.getAuth
        }
    },
    methods: {
        logout() {
            sessionStorage.clear();
            this.$router.push({name: 'home'}).then(() => this.$router.go(0))
        }
    }
}
</script>

<style scoped lang="scss">
nav {
    background-color: #4CAF50;
    padding: 10px;

    .menu {
        margin: auto;
        width: fit-content;
        display: flex;
        gap: 10px;

        li {
            display: inline-block;

            a, button {
                color: white;
                font-weight: bold;
            }
        }
    }
}
</style>
