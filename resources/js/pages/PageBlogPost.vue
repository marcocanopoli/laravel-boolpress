<template>
    <section class="blog-post container" v-if="!loading">
        <router-link 
            class="badge button category" 
            v-if="post.category.name" 
            :to="{ name: 'category', params: { slug: post.category.slug } }">{{ post.category.name }}
        </router-link>
        <h1 class="post-title">{{ post.title }}</h1>
        <div class="tags" v-if="post.tags.length > 0">
            <router-link class="pill" 
                v-for="tag in post.tags"
                :key="tag.id"
                :to="{ name: 'tag', params: { slug: tag.slug } }"
                >{{ tag.name }}
            </router-link>
        </div>
        <img :src="post.cover" alt="post-img" class="post-img">
        <p class="post-content">{{ post.content }}</p>
        <router-link :to="{ name: 'blog' }" class="badge button bg-indigo">Blog</router-link>
    </section>
    <v-loader v-else></v-loader>
</template>

<script>
import VLoader from '../components/VLoader.vue';

export default {
    name: 'PageBlogPost',
    components: {
        VLoader
    },
    data() {
        return {
            post: null,
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
                        this.$router.push({ name: "not-found", params: { pathMatch: '' }});
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
    position: relative;
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 15px;
    padding: 30px;

    .category {
        position: absolute;
        right: 30px;
        top: 15px;
    }

    .tags {
        margin: 15px 0;
    }

    .pill {
        text-decoration: none;
    }
    
    .post-title {
        margin: 0;
        padding-bottom: 15px;
        font-size: 32px;
        text-align: left;
    }

    .post-img {
        margin-top: 15px;
        max-width: 100%;
    }

    .post-content {
        margin: 30px 0;
        color: #fff;
    }
}
</style>