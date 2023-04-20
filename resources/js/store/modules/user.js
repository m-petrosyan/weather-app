import {getRequest, postRequest} from "../api";

export default {
    state: {
        auth: null,
        user: null,
        userError: null,
    },
    getters: {
        getAuth: state => state.auth,
        getUserError: state => state.userError,
    },
    mutations: {
        setToken(state, data) {
            sessionStorage.setItem('token', data)
        },
        setUserError(state, data) {
            state.userError = data
        },
        setAuth(state, data) {
            state.auth = data
        },
        setHistory(state, data) {
            state.auth.history = data
        },
    },
    actions: {
        signUp({commit}, data) {
            return postRequest('/user', data, commit)
                .then(() => {
                    commit('setUserError', null)
                })
                .catch(error => {
                    commit('setUserError', error.message)
                    return Promise.reject(error)
                });
        },
        signIn({commit}, data) {
            return postRequest('/user/login', data)
                .then(response => {
                    commit("setToken", response.token)
                    commit('setUserError', null)
                })
                .catch(error => {
                    commit('setUserError', error.message)
                    return Promise.reject(error)
                });
        },
        auth({commit}) {
            return getRequest('/user')
                .then(response => {
                    commit("setAuth", response.data)
                    commit('setUserError', null)
                })
                .catch(error => {
                    sessionStorage.removeItem('token')
                    commit('setUserError', error.message)
                    return Promise.reject(error)
                })
        },
        getHistory({commit}) {
            return getRequest('/weather/history')
                .then(response => {
                    commit("setHistory", response.data)
                    commit('setUserError', null)
                })
                .catch(error => {
                    commit('setUserError', error.message)
                    return Promise.reject(error)
                })
        },
    },
}
