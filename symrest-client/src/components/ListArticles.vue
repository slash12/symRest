<template>
    <div>
        <h1>Articles</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="article in articles" v-bind:key="article.id">
                    <th>{{ article.name }}</th>
                    <th>{{ article.description }}</th>
                    <th><router-link :to="{name: 'getArticle', params: {id: article.id}}">View article</router-link></th>
                    <th>
                        <button type="button" @click="deleteArticle(article.id)">
                            Delete Article
                        </button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {APIService} from '../APIService';

const apiService = new APIService();

export default {
    name: 'ListArticles',
    components: {

    },
    data() {
        return {
            articles: [],
        };
    },
    methods: {
        getArticles(){
            apiService.getArticles().then((data) => {
                this.articles = data;
            });
        },
        deleteArticle(id){            
            apiService.deleteArticle(id);
            location.reload();
        }
    },
    mounted() {
        this.getArticles();
    },
}
</script>
