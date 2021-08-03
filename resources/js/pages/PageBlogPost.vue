<template>
    <section class="blog-post container" v-if="!loading">
        <span class="badge" v-if="post.category.name">{{ post.category.name }}</span>
        <h1 class="post-title">{{ post.title }}</h1>
        <div class="tags" v-if="post.tags.length > 0">
            <span class="pill" 
                v-for="tag in post.tags"
                :key="tag.id">{{ tag.name }}</span>
        </div>
        <img :src="post.imgUrl" alt="post-img" class="post-img">
        <p class="post-content">{{ post.content }}</p>
        <router-link :to="{ name: 'blog' }" class="badge button">Blog</router-link>
    </section>
    <v-loader v-else-if="loading"></v-loader>
</template>

<script>
import VLoader from '../components/VLoader.vue';
import router from '../router.js';

export default {
    name: 'PageBlogPost',
    components: {
        VLoader
    },
    data() {
        return {
            post: null,
            emptyPost: false,
            loading: true
        }
    },
    methods: {
        getPost(slug) {
            this.loading = true;

            axios
            .get(`http://127.0.0.1:8000/api/posts/${slug}`)
            .then(
                res => {
                    // console.log(res.data);
                    if (Object.keys(res.data).length === 0) {
                        router.push({ name: "not-found", params: { pathMatch: '' }});
                    }
                    this.post = res.data;                    
                    this.loading = false;
                }
            )
            .catch(
                err => {
                    console.log(err);
                }
            );
        }
    },
    created() {
        this.getPost(this.$route.params.slug);
    }
}
</script>

<style lang="scss">

.blog-post {
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 15px;
    padding: 30px;

    .tags {
        margin: 15px 0;
    }

    .post-img {
        margin-top: 15px;
    }

    .post-content {
        margin: 30px 0;
        color: #fff;
    }
}
</style>