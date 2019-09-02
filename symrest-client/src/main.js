import Vue from 'vue'
import App from './App.vue'
import ListArticles from './components/ListArticles.vue'
import CreateArticle from './components/CreateArticle.vue'
import ViewArticle from './components/ViewArticle.vue'
import UpdateArticle from './components/UpdateArticle.vue'
import VueRouter from 'vue-router'

Vue.config.productionTip = false
Vue.use(VueRouter);

const routes =[
  { path: '/', component: ListArticles, name: 'list' },
  { path: '/create', component: CreateArticle, name: 'create' },
  { path: '/article/:id', component: ViewArticle, name: 'getArticle' },
  { path: '/article/update/:id', component: UpdateArticle, name: 'updateArticle' },
]

const router = new VueRouter({
  routes
})

new Vue({  
  router,
  render: h => h(App),
}).$mount('#app')
