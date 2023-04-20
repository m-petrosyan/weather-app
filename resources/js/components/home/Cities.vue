<template>
    <h3 class="info-title">
        {{ history ? 'User History' : 'Popular cities' }}
    </h3>
    <table class="info-table locations">
        <tbody>
        <tr v-for="item in history ?? popularCities">
            <td>
                <p class="item" @click="setCity(item.city)">{{ item.city }}</p>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "Cities",
    props: {
        setCity: Function,
        history: Object
    },
    data() {
        return {
            popularCities: [
                {
                    city: 'Yerevan',
                },
                {
                    city: 'Moscow',
                },
                {
                    city: 'London',
                },

            ],
        }
    }
}
</script>

<style scoped>
.info-table .item {
    cursor: pointer;
    color: var(--gray-light);
}
</style>
