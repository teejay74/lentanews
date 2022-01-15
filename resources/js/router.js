import { createRouter, createWebHistory } from "vue-router";
import Home from './components/HomeComponent'
import AllNews from './components/AllNewsComponent'
import NewsCardComponent from "./components/NewsCardComponent";
import SearchResultComponent from "./components/SearchResultComponent";

const routes = [
    { path: '/', component: Home },
    { path: '/all', component: AllNews },
    { path: '/news-card', name: 'newsCard', component: NewsCardComponent, props: true },
    { path: '/search-result', name: 'searchResult', component: SearchResultComponent, props: true }

]
export default createRouter({
    history: createWebHistory(),
    routes
})
