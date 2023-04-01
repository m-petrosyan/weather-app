<template>
    <section>
        <Error v-if="error" :msg="error"/>
        <Alert v-if="alert" :msg="alert"/>
        <div class="search_area">
            <input class="search_input" v-model="city" type="text" size="50" ref="search_input">
            <input id="address" name="address" value='' type="hidden" placeholder="">
            <button class="search_btn" @click="getWeather">Go</button>
        </div>
        <div class="result" v-if="result">
            <p>City {{ result.location }}</p>
            <small>{{ result.description }}</small>
            <p>Current temperature {{ result.temp }}</p>
            <p>Max temperature {{ result.temp_max }}</p>
            <p>Min temperature {{ result.temp_min }}</p>
        </div>
    </section>
</template>

<script>

import Error from "@/components/error/Error.vue";
import Alert from "@/components/error/Alert.vue";

export default {
    name: "Home",
    components: {Alert, Error},
    data() {
        return {
            city: '',
            alert: null
        }
    },
    mounted() {
        let autocomplate;
        autocomplate = new google.maps.places.Autocomplete((this.$refs.search_input), {
            type: ['geocode'],
            types: ['(cities)'],
        })
        google.maps.event.addListener(autocomplate, 'place_changed', () => {
            this.city = autocomplate.getPlace().formatted_address;
        });
    },
    methods: {
        getWeather() {
            if (this.user) {
                this.$store.dispatch('getWeather', this.city)
            } else {
                this.alert = 'login first'
                setTimeout(() => {
                    this.alert = null
                }, 5000)
            }
        }
    },
    computed: {
        data() {
            return this.$store.getters.getData
        },
        result() {
            return this.$store.getters.getWeather
        },
        error() {
            return this.$store.getters.getWeatherError
        },
        user() {
            return this.$store.getters.getAuth
        }
    }
}
</script>

<style scoped lang="scss">
section {
    width: 300px;
    margin: auto;

    .search_area {
        display: flex;

        .search_input {
            border-radius: 10px 0 0 10px;
            height: 25px;
            border: 1px solid #d7d7d7;
            padding-left: 7px;
            border-right-style: none;
            width: inherit;
        }

        .search_btn {
            border-radius: 0px 10px 10px 0px;
            height: 25px;
            border: 1px solid #d7d7d7;
            padding-right: 7px;
            border-left-style: none;
        }
    }

}
</style>
