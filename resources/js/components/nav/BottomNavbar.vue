<template>
    <AuthLayouth/>
    <p class="user-name" v-if="user">
        {{ user.name }}
    </p>
    <nav>
        <ul class="menu">
            <template v-if="!user">
                <li>
                    <router-link :to="{name: 'signin'}">
                        <img class="icon" src="../../assets/images/icons/login.svg" alt="login">
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'signup'}">
                        <img class="icon" src="../../assets/images/icons/registration.svg" alt="registration">
                    </router-link>
                </li>
            </template>
            <template v-else>
                <li>
                    <button type="submit" @click="logout">
                        <img class="icon" src="../../assets/images/icons/logout.svg" alt="logout">
                    </button>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
import AuthLayouth from "@/components/auth/AuthLayouth.vue";

export default {
    name: "BottomNavbar",
    components: {AuthLayouth},
    computed: {
        user() {
            return this.$store.getters.getAuth
        },
    },
    methods: {
        logout() {
            sessionStorage.clear();
            this.$router.push('/').then(() => this.$router.go(0))
        },
    },
}
</script>

<style scoped lang="scss">
.user-name {
    color: var(--light);
    text-align: center;
    margin-bottom: 20px;
}

nav {
    .menu {
        margin: auto;
        width: fit-content;
        display: flex;
        gap: 0 30px;

        .icon {
            height: 30px;
        }
    }
}
</style>
