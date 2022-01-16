<template>
    <li><router-link tag="a" :to="{ name: 'newsCard', query: {newsId} }" >{{ relatedItem.title }}</router-link></li>
</template>

<script>
    export default {
        name: "RelatedListComponent",
        props: ['relatedItem'],
        data () {
            return {
                newsId: this.relatedItem.id
            }
        }
    }
</script>

<style scoped>

</style>
