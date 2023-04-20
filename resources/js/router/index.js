import {createRouter, createWebHistory} from 'vue-router'
import Signup from "../components/auth/Signup.vue";
import Signin from "../components/auth/Signin.vue";
import AuthLayouth from "../components/auth/AuthLayouth.vue";

const routes = [
    // {
    //     path: '/weather-history',
    //     name: 'history',
    //     component: WeatherHistory,
    // },
    {
        path: '/',
        component: AuthLayouth,
        children: [
            {
                path: 'signin',
                name: 'signin',
                component: Signin
            },
            {
                path: 'signup',
                name: 'signup',
                component: Signup
            },
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
