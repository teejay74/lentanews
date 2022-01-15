<template>
    <hr>
    <div class="row gx-5">
        <div class="col-md-2 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5"
                 data-mdb-ripple-color="light">
                <img src="/assets/images/image-news.jpg" class="img-fluid" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">{{ newsItem.date_news }}</span>
            <h4><strong>{{ newsItem.title }}</strong></h4>
            <p class="text-muted">
              {{ newsItem.description}}
            </p>
            <router-link class="btn btn-primary" tag="button" :to="{ name: 'newsCard', query: {newsId} }" >Read more</router-link>

        </div>
    </div>

</template>

<script>
    export default {
        name: "NewsList",
        props: ['newsItem'],

        data() {
            return {
                newsId: this.newsItem.id
            }
        }
    }
</script>

<style scoped>

</style>
