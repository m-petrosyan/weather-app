<template>
    <table class="info-table">
        <tbody>
        <tr>
            <td>
                <p>Cloudy</p>
            </td>
            <td v-if="result">
                <p>{{ result.clouds }}%</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Min temp</p>
            </td>
            <td v-if="result">
                <p>{{ result.temp_min.toFixed() }}&#176;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Max temp</p>
            </td>
            <td v-if="result">
                <p>{{ result.temp_max.toFixed() }}&#176;</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Humidity</p>
            </td>
            <td v-if="result">
                <p>{{ result.humidity }}%</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Wind</p>
            </td>
            <td v-if="result">
                <p>{{ result.wind.toFixed() }}km/h</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Pressure</p>
            </td>
            <td v-if="result">
                <p>{{ result.pressure }}</p>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "WeatherInfo",
    props: {
        result: Object
    }
}
</script>

<style scoped>

</style>
