import axios from 'axios';

const API_URL = 'http://localhost:8000';

export class APIService{
    getArticles() {
        const url = `${API_URL}/articles`;

        return axios.get(url).then(response => response.data);
    }
    createArticle(article){
        const url = `${API_URL}/article`;

        return axios.post(url, article);
    }
    getArticleById(id){
        const url = `${API_URL}/article/` + id;     

        return axios.get(url).then(response => response.data);
    }
    updateArticle(id, article){
        const url = `${API_URL}/article/` + id;

        return axios.put(url, article);
    }
    deleteArticle(id){
        const url = `${API_URL}/article/` + id;

        return axios.delete(url);
    }
}

