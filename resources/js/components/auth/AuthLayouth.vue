<template>
    <div class="content">
        <Error v-if="error" :msg="error"/>
        <router-view/>
    </div>
</template>

<script>
import Error from "@/components/error/Error.vue";

export default {
    name: "AuthLayouth",
    components: {Error},
    computed: {
        error() {
            return this.$store.getters.getUserError
        }
    }
}
</script>

<style lang="scss">
.content {
    width: 500px;
    margin: auto;
    text-align: center;

    form {
        label {
            display: block;
        }

        input[type=submit] {
            padding: 5px 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    }
}
</style>
