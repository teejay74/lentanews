<template>

    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><router-link :to="'/'" class="nav-link px-2 text-white">Главная</router-link></li>
                    <li> <router-link :to="'/all'" class="nav-link px-2 text-white">Все новости</router-link></li>
                    <li><a href="#" class="nav-link px-2 text-white">Новости Москвы</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Новости Челябинска</a></li>
                </ul>
                <SearchComponent></SearchComponent>
            </div>

        </div>
    </header>

    <router-view></router-view>

</template>

<script>
    import SearchComponent from "./components/SearchComponent";
    import SearchResultComponent from "./components/SearchResultComponent";
    export default {
        name: "App",
        components: {SearchComponent,SearchResultComponent}
    }
</script>

<style scoped>

</style>
