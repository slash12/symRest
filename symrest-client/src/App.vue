<template>
  <div id="app">
    <ListArticles />
    <CreateArticle />
  </div>
</template>

<script>
import ListArticles from './components/ListArticles.vue'
import CreateArticle from './components/CreateArticle.vue'

export default {
  name: 'app',
  components: {
    ListArticles,
    CreateArticle
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
