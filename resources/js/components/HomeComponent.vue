<template>
    <div class="container">
        <h1>Лента избранных новостей</h1>
        <NewsList
            v-if="isLoad"
            v-for="newsItem in newsFavorites"
            :key="newsItem.id"
            :newsItem = "newsItem"
        ></NewsList>
    </div>

</template>

<script>
    import NewsList from "./NewsList";
    export default {
        name: "HomeComponent",
        components: {
            NewsList
        },
        data() {
            return {
                newsFavorites: {},
                isLoad: false
            }
        },
        created() {
            axios.get('api/get-favorites-news').then(response => {
                this.newsFavorites = response.data
                this.isLoad = true
                console.log(response.data)
            })

        }
    }
</script>

<style scoped>

</style>
