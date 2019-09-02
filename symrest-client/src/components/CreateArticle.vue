<template>
    <div>        
        <input v-model="article['name']" placeholder="Add an article name...">
        <input v-model="article['description']" placeholder="Add an article description...">
        <button @click="addArticle" type="button">Submit</button>
    </div>
</template>
<script>

import {APIService} from '../APIService';

const apiService = new APIService();

export default {
    name: "CreateArticle",
    data(){
        return {
            article: {},            
        }
    },
    methods: {
        addArticle() {
            apiService.createArticle(this.article)
        }
    }
}
</script>
<style scoped>

</style>

