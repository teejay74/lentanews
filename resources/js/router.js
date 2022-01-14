import { createRouter, createWebHistory } from "vue-router";
import Home from './components/HomeComponent'
import AllNews from './components/AllNewsComponent'

const routes = [
    { path: '/', component: Home },
    { path: '/all', component: AllNews },
]
export default createRouter({
    history: createWebHistory(),
    routes
})
