<template>
    <h3 class="alert">{{ msg }}</h3>
</template>

<script>
export default {
    name: "Alert",
    props: {
        msg: String
    }
}
</script>

<style scoped>
.alert {
    width: 150px;
    border: 1px dotted red;
    padding: 5px;
    margin: 20px auto;
    text-align: center;
    border-radius: 5px;
    color: red;
}
</style>
