<template>
    <div class="container">
        <h1>{{ newsItem.title }}</h1>
            <div class="row gx-5">
            <div class="col-md-2">
                <img src="/assets/images/image-news.jpg" class="img-fluid" />
            </div>
            <div class="col-md-4">
                <p>{{ newsItem.text_news }}</p>
                <a class="btn btn-sm btn-primary" @click.prevent="changeStatus">
                    {{ changeStatusText }}
                </a>
            </div>

        </div>
        <div>
            {{ newsItem.date_news}}
        </div>
        <div>
            <strong>Похожие новости:</strong>
            <ul>
                <RelatedListComponent
                    v-if="isLoad"
                    v-for="relatedItem in newsItem.related"
                    :key="relatedItem.id"
                    :relatedItem = "relatedItem"
                ></RelatedListComponent>
            </ul>
        </div>
    </div>

</template>

<script>
    import RelatedListComponent from "./RelatedListComponent";
    export default {
        name: "NewsCardComponent",
        props: ['newsId'],
        components: {RelatedListComponent},
        data() {
            return {
                data: {
                    id: this.$route.query.newsId,
                    favoritesStatus: ''
                },
                newsItem: {},
                isLoad: false
            }
        },
        computed: {
            changeStatusText: function () {
                return this.newsItem.favorites ? 'Удалить из избранного':'Добавить в избранное'
            }
        },
        methods: {
            getNewsCard(data) {
                axios.post('api/get-news-card', data).then(response => {
                    console.log(response.data)
                    this.newsItem = response.data
                    this.isLoad = true
                })
            },
            changeStatus() {
                this.data.favoritesStatus = !this.newsItem.favorites
                axios.post('api/save-status-favorites', this.data).then(response => {
                    this.getNewsCard(this.data)

                    console.log(response.data)

                })
            }
        },
        created() {
            this.getNewsCard(this.data)
        },
        //Обновляем компоненту после обновления query параметров
        beforeRouteUpdate(to, from, next) {
            this.data = {
                id: to.query.newsId
            }
            this.newsItem = {}
            this.getNewsCard(this.data)
            next()
        },
    }
</script>

<style scoped>

</style>
