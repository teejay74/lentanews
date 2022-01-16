<template>
    <div class="container">
        <h1>Новости {{newsCity}}</h1>
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
        name: "NewsCityComponent",
        components: {
            NewsList
        },
        data() {
            return {
                region: this.$route.query.region,
                news: {},
                isLoad: false,
                newsCity: ''
            }
        },

        methods: {
            getRegionNews(reg) {
                axios.get(`api/get-region-news?region=${reg}`).then(response => {
                    this.news = response.data
                    this.isLoad = true
                    console.log(response.data)
                })
            },
            changeRegion(reg) {
                this.newsCity = reg === '74' ? 'Челябинска':'Москвы'
            }

        },
        created() {
            this.getRegionNews(this.region)
            this.changeRegion(this.region)
        },
        beforeRouteUpdate(to, from, next) {
            this.foundNews = {}
            this.getRegionNews(to.query.region)
            this.changeRegion(to.query.region)
            next()
        },
    }
</script>

<style scoped>

</style>
