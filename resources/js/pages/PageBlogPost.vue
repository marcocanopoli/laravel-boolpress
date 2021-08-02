<template>
    <section class="blog-post" v-if="!loading">
        <span class="badge" v-if="post.category.name">{{ post.category.name }}</span>
        <h1 class="post-title">{{ post.title }}</h1>
        <div class="tags" v-if="post.tags.length > 0">
            <span class="pill" 
                v-for="tag in post.tags"
                :key="tag.id">{{ tag.name }}</span>
        </div>
        <p class="post-content">{{ post.content }}</p>
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
    .tags {
        margin: 15px 0;
    }

    .post-content {
        margin-top: 30px;
    }
</style>