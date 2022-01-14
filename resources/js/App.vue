<template>
    <router-link :to="'/'" >Главная</router-link>
    <br />
    <router-link :to="'/all'" >Все новости</router-link>
    <br />
    <router-view></router-view>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>
