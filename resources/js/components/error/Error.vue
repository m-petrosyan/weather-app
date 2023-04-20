<template>
    <h3 class="error">{{ msg }}</h3>
</template>

<script>
export default {
    name: "Error",
    props: {
        msg: String
    }
}
</script>

<style scoped>
.error {
    color: red;
    font-size: var(--text-small);
    margin-bottom: 20px;
}
</style>
