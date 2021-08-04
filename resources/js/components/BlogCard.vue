<template>
    <div class="post">
        <span class="author">{{ post.author }}</span>
        <div class="img-box">
            <img :src="post.cover" :alt="post.title">
            <h3>{{ post.title }}</h3>
        </div>
        <p>{{ getExcerpt(post.content) }}</p>
        <router-link class="button bg-indigo" :to="{ name: 'blog-post', params: { slug: post.slug} }">Read article</router-link>
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
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: calc((100% / 3) - 40px);
        padding: 15px 15px 65px;
        margin: 0 20px 40px;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0px 10px 10px rgba(0, 0 , 0, 0.5);

        .author {
            font-style: italic;
            color: #000;
        }

        .img-box {
            position: relative;
            margin: 15px 0;
            overflow: hidden;
            border-radius: 5px;

            h3 {
                position: absolute;
                padding: 10px 15px;
                bottom: 0;
                left: 0;
                right: 0;
                color: #fff;
                background-color: rgba(0, 0 , 0, 0.8);
                text-shadow: 0px 0px 10px rgba(0, 0 , 0, 0.8);
            }

            img {
                display: block;
                width: 100%;                
            }

        }

        .button {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>