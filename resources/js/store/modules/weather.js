import {getRequest} from "../api";

export default {
    state: {
        weather: null,
        weatherHistory: null,
        weatherError: null,
    },
    getters: {
        getWeather: state => state.weather,
        getWeatherHistory: state => state.weatherHistory,
        getWeatherError: state => state.weatherError,
    },
    mutations: {
        setWeatherError(state, data) {
            state.weatherError = data
        },
        setWeather(state, data) {
            state.weather = data
        },
        setWeatherHistory(state, data) {
            state.weatherHistory = data
        },
    },
    actions: {
        getWeather({commit}, {city, units}) {
            return getRequest(`/weather?city=${city}&units=${units}`)
                .then(response => {
                    commit("setWeather", response.data)
                    commit('setWeatherError', null)
                })
                .catch(error => {
                    commit('setWeatherError', error)
                    return Promise.reject(error)
                });
        },
        getWeatherHistory({commit}, city) {
            return getRequest(`/weather/history`)
                .then(response => {
                    commit("setWeatherHistory", response.data)
                    commit('setWeatherError', null)
                })
                .catch(error => {
                    commit('setWeatherError', error)
                    return Promise.reject(error)
                });
        },
    },
}
