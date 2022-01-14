<template>
    <h1>Лента избранных новостей</h1>
    <div class="container">


        <div class="card">
            <h2>Новость 1</h2>
        </div>

        <div class="card">
            <h2>Новость 2</h2>
        </div>


    </div>

</template>

<script>
    import NewsCard from "./NewsCard";
    export default {
        name: "HomeComponent",
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
            // axios.get('api/get-news').then(response => {
            //     this.news = response.data
            //     this.isLoad = true
            //     console.log(response.data)
            // })
            // console.log('ok')
        }
    }
</script>

<style scoped>

</style>
