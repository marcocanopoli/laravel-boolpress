<template>
    <div class="post">
        <a href="" class="author">{{ post.author }}</a>
        <div class="img-box">
            <img :src="post.imgUrl" alt="">
            <h3>{{ post.title }}</h3>
        </div>
        <p>{{ getExcerpt(post.content) }}</p>
        <router-link class="button" :to="{ name: 'blog-post', params: { slug: post.slug} }">Read article</router-link>
    </div>
</template>

<script>
export default {
    name: 'BlogCard',
    props: {
        post: Object
    },
    methods: {
        getExcerpt(string, chars = 200) {
            let excerpt = '';
            if (string.length > chars) {
                excerpt = string.substr(0, chars) + '...';
            }
            return excerpt;
        }
    }
}
</script>

<style lang="scss" scoped> 
    .post {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: calc((100% / 3) - 40px);
        padding: 15px;
        margin: 20px;
        background-color: rgba(149, 97, 226, 0.3);
        border-radius: 15px;

        .author {
            font-style: italic;
        }

        a {
            color: #000;
        }

        h3 {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: #fff;
        }

        .img-box {
            position: relative;
            margin: 15px 0;
            overflow: hidden;

            img {
                width: 100%;
                border-radius: 5px;
            }
        }

        .button {
            margin-top: 15px;
            padding: 10px;
            background-color: #fff;
            color: #9561e2;
            font-weight: 700;
            border-radius: 5px;
            text-decoration: none;
            text-transform: uppercase;
        }
    }
</style>