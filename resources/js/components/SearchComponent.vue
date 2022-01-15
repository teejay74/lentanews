<template>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
        <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search"
               v-model="searchText"
               @keypress.enter.prevent="findNews"
        >
    </form>
</template>

<script>
    import router from "../router";

    export default {
        name: "SearchComponent",
        data() {
          return {
              searchText: ''
          }
        },
        methods: {
            findNews() {
                console.log('work')
                //window.location.href = `search-result?q=${this.searchText}`
               router.push({ path: 'search-result', query: {q: this.searchText}})
                //router.push(`search-result?q=${this.searchText}`)

                this.searchText = ''

            }
        },





    }
</script>

<style scoped>

</style>
