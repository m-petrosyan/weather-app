import {createStore} from 'vuex'
import user from "./modules/user";
import weather from "./modules/weather";

export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        user,
        weather
    }
})
