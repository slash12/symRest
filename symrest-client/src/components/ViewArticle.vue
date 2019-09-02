<template>
    <div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ article.name }}</th>
                    <th>{{ article.description }}</th>
                    <th><router-link :to="{name: 'updateArticle', params: {id: article.id}}">Update article</router-link></th>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import {APIService} from '../APIService';

const apiService = new APIService();

export default {
    name: "ViewArticle",
    components: {

    },
    data() {
        return {
            article: {},
        };
    },
    methods: {
        getArticleById(){
            apiService.getArticleById(this.$route.params.id).then((data) => {
                this.article = data;                
            });            
        }
    },
    mounted() {
        this.getArticleById();        
    },
}
</script>
