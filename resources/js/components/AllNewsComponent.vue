<template>
    <div class="container">
        <h1>Все новости</h1>
        <NewsList
        v-if="isLoad"
        v-for="newsItem in news"
        :key="newsItem.id"
        :newsItem = "newsItem"
        ></NewsList>
    </div>
</template>

<script>
    import NewsList from "./NewsList";
    export default {
        name: "AllNewsComponent",
        components: {
            NewsList
        },
        data() {
            return {
                news: [],
                isLoad: false
            }
        },
        created() {
            axios.get('api/get-news').then(response => {
                this.news = response.data
                this.isLoad = true
                console.log(response.data)
            })
        }
    }
</script>

<style scoped>

</style>
