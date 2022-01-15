<template>
  <div class="container">
    {{ data.searchText }}
  </div>
</template>

<script>
    export default {
        name: "SearchResultComponent",
        data() {
            return {
                data: {
                    searchText: this.$route.query.search
                },
            }
        },
    }
</script>

<style scoped>

</style>
