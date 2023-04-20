<template>
    <section>
        <div class="wrapper" :class="{data: result}"
             :style="{backgroundImage: `url(${result ? getBg : defaultBg})`}">
            <div class="img-info">
                <div class="info" v-if="result">
                    <div class="date-temp">
                        <h1 class="degrees">{{ result.temp.toFixed() }}&#176;</h1>
                        <div class="date-city">
                            <h2 class="city">{{ result.city }}</h2>
                            <p class="date">{{ result.date }}</p>
                        </div>
                        <div class="icon-desc">
                            <img class="icon"
                                 :src="iconImg.find(item => item.title ===  result.description.toLowerCase()).icon"
                                 alt="">
                            <p class="description">{{ result.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-info">
                <button class="search-submit" @click="getWeather">
                    <img src="../assets/images/icons/search-icon.svg" alt="search">
                </button>
                <div class="info">
                    <div class="search-area">
                        <input class="search-input" v-model="city" type="text" placeholder="Another location"
                               ref="search_input">
                        <input id="address" name="address" value='' type="hidden" placeholder="">
                    </div>
                    <div class="location-info">
                        <Cities :setCity="setCity" :history="user?.history"/>
                    </div>
                    <div class="info-area">
                        <h3 class="info-title">
                            Weather Details
                        </h3>
                        <Preloader v-if="loading"/>
                        <WeatherInfo v-else :result="result"/>
                    </div>
                </div>
                <BottomNavbar/>
            </div>
        </div>
    </section>
</template>

<script>
import BottomNavbar from "@/components/nav/BottomNavbar.vue";
import DefaultBg from "../assets/images/bg/default.jpg"
import SunnyBg1 from "../assets/images/bg/sunny1.jpg"
import SunnyBg2 from "../assets/images/bg/sunny2.jpg"
import SunnyBg3 from "../assets/images/bg/sunny3.jpg"
import RainBg1 from "../assets/images/bg/rain1.jpg"
import RainBg2 from "../assets/images/bg/rain2.jpg"
import RainBg3 from "../assets/images/bg/rain3.jpg"
import RainBg4 from "../assets/images/bg/rain4.jpg"
import RainBg5 from "../assets/images/bg/rain5.jpg"
import RainBg6 from "../assets/images/bg/rain6.jpg"
import RainBg7 from "../assets/images/bg/rain7.jpg"
import RainBg8 from "../assets/images/bg/rain8.jpg"
import RainBg9 from "../assets/images/bg/rain9.jpg"
import RainBg10 from "../assets/images/bg/rain10.jpg"
import RainBg11 from "../assets/images/bg/rain11.jpg"
import CloudBg1 from "../assets/images/bg/cloud1.jpg"
import CloudBg2 from "../assets/images/bg/cloud2.jpg"
import CloudBg3 from "../assets/images/bg/cloud3.jpg"
import CloudBg4 from "../assets/images/bg/cloud4.jpg"
import SunIcon from "../assets/images/icons/sun.svg"
import RainIcon from "../assets/images/icons/cloud-rain.svg"
import CloudIcon from "../assets/images/icons/cloud.svg"
import Preloader from "@/components/preloader/Preloader.vue";
import Cities from "@/components/home/Cities.vue";
import WeatherInfo from "@/components/home/WeatherInfo.vue";

export default {
    name: "Home",
    components: {WeatherInfo, Cities, Preloader, BottomNavbar},
    data() {
        return {
            city: 'Yerevan, Armenia',
            units: 'metric',
            alert: null,
            loading: false,
            defaultBg: DefaultBg,
            iconImg: [
                {
                    title: 'clear',
                    icon: SunIcon,
                    bg: [SunnyBg1,
                        SunnyBg2,
                        SunnyBg3]
                },
                {
                    title: 'rain',
                    icon: RainIcon,
                    bg: [
                        RainBg1,
                        RainBg2,
                        RainBg3,
                        RainBg4,
                        RainBg5,
                        RainBg6,
                        RainBg7,
                        RainBg8,
                        RainBg9,
                        RainBg10,
                        RainBg11,
                    ]
                },
                {
                    title: 'clouds',
                    icon: CloudIcon,
                    bg: [CloudBg1,
                        CloudBg2,
                        CloudBg3,
                        CloudBg4]
                },
            ]
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
            this.loading = true
            this.$store.dispatch('getWeather', {city: this.city, units: this.units}).then(() => {
                if (this.user) this.$store.dispatch('getHistory')
            }).finally(() => this.loading = false)
        },
        setCity(city) {
            this.city = city
            this.getWeather()
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
        },
        getBg() {
            let arr = this.iconImg.find(item => item.title === this.result.description.toLowerCase()).bg
            return arr[Math.floor(Math.random() * arr.length)]
        }
    }
}
</script>

<style lang="scss">
@import "@/assets/styles/vars.scss";

section {
    .wrapper {
        display: flex;
        height: 100vh;
        background-size: cover;

        .img-info {
            width: 70%;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            color: var(--light);

            .info {
                padding: 70px;

                .date-temp {
                    display: flex;
                    align-items: flex-end;
                    gap: 0 20px;

                    .degrees {
                        font-weight: 800;
                        font-size: var(--text-extra-big);
                        @media (width < 768px) {
                            font-size: var(--text-big);
                        }
                    }

                    .date-city {
                        .city {
                            font-weight: 800;
                            font-size: var(--text-big);
                        }

                        .date {

                        }
                    }

                    .icon-desc {
                        margin-left: 20px;

                        .icon {
                            height: 50px;
                        }

                        .description {
                            font-size: var(--text-small);
                        }
                    }
                }
            }
        }

        .main-info {
            display: flex;
            flex-direction: column;
            width: 30%;
            background-color: #0000002b;
            backdrop-filter: blur(20px);
            padding: 50px;
            position: relative;

            .search-submit {
                position: absolute;
                right: 0;
                top: 0;
                background-color: var(--orange);
                width: 80px;
                height: 80px;

                img {
                    height: 30px;
                }
            }

            .info {
                display: flex;
                height: 100%;
                flex-direction: column;
                gap: 30px 0;

                .search-area {
                    width: 80%;
                    border-bottom: 1px solid var(--gray);

                    .search-input {
                        border: none;
                        color: var(--gray-light);
                        background: none;
                        font-size: var(--text-normal);
                        width: 100%;

                        &::placeholder {
                            color: var(--gray-light);
                        }

                        &:focus {
                            outline: none;
                        }
                    }
                }

                .location-info {
                    border-bottom: 1px solid var(--gray);
                }

                .info-table {
                    width: 100%;
                    border-spacing: 0 25px;

                    &.locations {
                        tbody {
                            tr {
                                td {
                                    p {
                                        color: var(--gray);
                                    }
                                }
                            }
                        }
                    }

                    tbody {
                        tr {
                            td {
                                &:first-child {
                                    p {
                                        color: var(--gray-light);
                                    }
                                }

                                &:nth-child(2) {
                                    p {
                                        color: var(--light);
                                        text-align: right;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        @media (width < $m) {

            .main-info {
                width: 50%;
                padding: 20px;

                .search-submit {
                    width: 50px;
                    height: 50px;

                    img {
                        height: 20px;
                    }
                }

                .info {
                    .search-area {
                        .search-input {
                            font-size: var(--text-small);
                        }
                    }

                    .info-table {
                        tbody {
                            tr {
                                td {
                                    p {
                                        font-size: var(--text-small);
                                    }
                                }
                            }
                        }
                    }
                }


            }

            .img-info {
                width: 50%;
                align-items: center;
                text-align: center;

                .info {
                    .date-temp {
                        align-items: center;
                        gap: 30px 0;
                        flex-direction: column;

                        .icon-desc {
                            margin-left: 0;
                        }

                        .date-city {
                            .city {
                                font-size: var(--text-normal);
                            }
                        }
                    }
                }
            }
        }
        @media (width < $s) {
            flex-direction: column;
            &.data {
                height: auto;
            }

            .main-info {
                width: 100%;
            }
            .img-info {
                width: 100%;
            }
        }
    }
}
</style>
