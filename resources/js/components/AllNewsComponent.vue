<template>
    <h1>Все новости</h1>
    <NewsCard
        v-if="isLoad"
    v-for="newsCard in news"
    :key="newsCard.id"
    :newsCard = "newsCard"
    ></NewsCard>
</template>

<script>
    import NewsCard from "./NewsCard";

    export default {
        name: "AllNewsComponent",
        components: {
            NewsCard
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
            console.log('ok')
        }
    }
</script>

<style scoped>

</style>
