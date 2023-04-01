<template>
    <section>
        <table v-if="history">
            <thead>
            <tr>
                <th>Text</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in history" :key="item.id">
                <td>{{ item.text }}</td>
                <td>{{ item.date }}</td>
            </tr>
            </tbody>
        </table>
        <h3 v-else class="history-title">History is empty</h3>
    </section>
</template>

<script>
export default {
    name: "WeatherHistory",
    mounted() {
        this.$store.dispatch('getWeatherHistory')
    },
    computed: {
        history() {
            return this.$store.getters.getWeatherHistory
        }
    }
}
</script>

<style scoped lang="scss">
section {
    max-width: 600px;
    margin: auto;

    table {
        width: 100%;
        border: 1px solid gray;

        tr {
            td {
                text-align: center;
            }
        }
    }

    .history-title {
        text-align: center;
    }
}
</style>
