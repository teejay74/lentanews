<template>
  <div class="container">
      <h1>Результаты поиска: </h1>
      <div v-if="foundNews.error">{{ foundNews.error }}</div>
      <NewsList
          v-if="isLoad && foundNews.length > 0"
          v-for="newsItem in foundNews"
          :key="newsItem.id"
          :newsItem = "newsItem"
      ></NewsList>
  </div>
</template>

<script>
    import NewsList from "./NewsList";
    export default {
        name: "SearchResultComponent",
        components: {NewsList},

        data() {
            return {
                searchText: this.$route.query.q,
                isLoad: false,
                foundNews: {}
            }
        },
        methods: {
           searchNews(query) {
               axios.get(`/api/search-news?q=${query}`).then(response => {
                   this.foundNews = response.data
                   this.isLoad = true
               })
           }
        },

        beforeRouteUpdate(to, from, next) {
            this.foundNews = {}
            this.searchNews(to.query.q)
            next()
        },

        created() {
            this.searchNews(this.searchText)
        },
    }
</script>

<style scoped>

</style>
