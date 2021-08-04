import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import PageBlog from './pages/PageBlog.vue';
import PageBlogPost from './pages/PageBlogPost.vue';
import PageHome from './pages/PageHome.vue';
import PageAbout from './pages/PageAbout.vue';
import PageCategory from './pages/PageCategory.vue';
import PageTag from './pages/PageTag.vue';
import PageNotFound from './pages/PageNotFound.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: PageHome
        },
        {
            path: '/blog',
            name: 'blog',
            component: PageBlog
        },
        {
            path: '/blog/:slug',
            name: 'blog-post',
            component: PageBlogPost
        },
        {
            path: '/blog/category/:slug',
            name: 'category',
            component: PageCategory
        },
        {
            path: '/blog/tag/:slug',
            name: 'tag',
            component: PageTag
        },
        {
            path: '/about',
            name: 'about',
            component: PageAbout
        },
        {
            path: '*',
            name: 'not-found',
            component: PageNotFound
        }
    ]
});

export default router;