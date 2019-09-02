<template>
    <div class="container">
        <input 
            v-model="article.name"            
        >
        <input 
            v-model="article.description"
        >
        <button @click="updateArticle" type="button">Update</button>
    </div>
</template>
<script>
import {APIService} from '../APIService';

const apiService = new APIService();

export default {
    name: "UpdateArticle",
    data(){
        return {
            article: {}
        };
    },
    methods: {
        getArticleById() {            
            apiService.getArticleById(this.$route.params.id).then((data) => {
                this.article = data;
                this.article.name = data.name;
                this.article.description = data.description;
            });
        },
        updateArticle() {
            apiService.updateArticle(this.$route.params.id, this.article)
        }
    },
    mounted() {
        this.getArticleById();
    }
}
</script>
