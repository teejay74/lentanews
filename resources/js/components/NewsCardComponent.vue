<template>
    <div class="container">
        <h1>{{ newsItem.title }}</h1>
            <div class="row gx-5">
            <div class="col-md-2">
                <img src="/assets/images/image-news.jpg" class="img-fluid" />
            </div>
            <div class="col-md-4">
                {{ newsItem.text_news }}
            </div>
                <div class="col-md-3">
                   Добавить в избранное
                </div>
        </div>
        <div>
            {{ newsItem.date_news}}
        </div>
        <div>
            <strong>Похожие новости:</strong>
        </div>
    </div>

</template>

<script>
    export default {
        name: "NewsCardComponent",
        props: ['newsId'],
        data() {
            return {
                data: {
                    id: this.$route.query.newsId
                },
                newsItem: {}
            }
        },
        created() {
            axios.post('api/get-news-card', this.data).then(response => {
                this.newsItem = response.data
            })

        }
    }
</script>

<style scoped>

</style>
