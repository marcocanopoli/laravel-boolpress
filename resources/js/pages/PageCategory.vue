<template>
    <section class="container" v-if="!loading">
        <h1>Posts in '{{ category.name }}' category</h1>
        <ul class="post-links">
            <li v-for="post in category.posts" :key="post.id">
                <router-link :to="{ name: 'blog-post', params: { slug: post.slug} }">{{ post.title }}</router-link>
                <span class="created-date">{{ dateFormat(post.created_at) }}</span>
            </li>
        </ul>
    </section>
    <v-loader v-else/>
</template>

<script>
import VLoader from '../components/VLoader.vue';

export default {
    name: 'PageCategory',
    components: {
        VLoader
    },
    data() {
        return {
            category: null,
            loading: true
        }
    },
    created() {
        this.getCategory();
    },
    methods: {
        getCategory() {
            axios
                .get(`http://127.0.0.1:8000/api/categories/${this.$route.params.slug}`)
                .then(
                    res => {

                        if (Object.keys(res.data).length === 0) {
                            this.$router.push({ name: "not-found", params: { pathMatch: '' }});
                        } else {
                            this.category = res.data;
                            this.loading = false;
                        }
                    }
                )
                .catch(
                    err => {
                        console.log(err);
                    }
                );
        },
        dateFormat(date) {
            let dateSubstr = date.substr(0, 10);
            let dateArray = dateSubstr.split(/[-]/);
            // let newDate = new Date(dateArray[0], dateArray[1]-1, dateArray[2]);
            let formatted = dateArray[2] + '-' + dateArray[1] + '-' + dateArray[0];
            return formatted;
        }
    }
}
</script>

<style lang="scss">
    .post-links {
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 15px;
        padding: 30px;

        a {
            color:#fff;
        }
       
    }
</style>