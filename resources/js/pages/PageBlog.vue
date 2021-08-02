<template>
    <div class="blog">
        <h1>Blog</h1>

        <div class="posts" v-if="!loading && posts.length > 0">
            <blog-card
                v-for="post in posts" :key="post.id"
                :post="post"/>
            <div class="pagination">
                <button type="button" 
                    class="pag-button"
                    :class="current_page == 1 ? 'disabled-button' : '' "
                    :disabled="current_page == 1"
                    @click="getPosts(current_page - 1)">Prev
                </button>
                <button type="button"
                    v-for="n in last_page"
                    :key="n" 
                    class="pag-button"
                    :class="current_page == n ? 'focus-button' : '' "
                    @click="getPosts(n)">{{ n }}
                </button>
                <button type="button" 
                    class="pag-button"
                    :class="current_page == last_page ? 'disabled-button' : '' "
                    :disabled="current_page == last_page"
                    @click="getPosts(current_page + 1)">Next
                </button>
            </div>
        </div>

        <div v-else-if="!loading && posts.length == 0"></div>

        <v-loader v-else></v-loader>

    </div>
</template>

<script>
import axios from 'axios';
import BlogCard from '../components/BlogCard.vue';
import VLoader from '../components/VLoader.vue';

export default {
    name: 'PageBlog',
    components: {
        BlogCard,
        VLoader
    },
    data() {
        return {
            posts: [],
            current_page: 1,
            last_page: 1,
            loading: true
        }
    },
    methods: {
        getPosts(page = 1) {
            this.loading = true;

            axios
            .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
            .then(
                res => {
                    this.posts = res.data.data;
                    this.current_page = res.data.current_page; 
                    this.last_page = res.data.last_page;
                    this.loading = false;         
                }
            )
            .catch(
                err => {
                    console.log('Errore');
                }
            );
        }
    },
    created() {
        this.getPosts();
    }
}
</script>

<style lang="scss">

    .posts {
        display: flex;
        flex-wrap: wrap;
        padding: 30px 0;

        .pagination {
            width: 100%;
            text-align: center;

            .pag-button {
                cursor: pointer;
                background-color: #9561e2;
                color: #fff;
                padding: 5px 10px;
                margin: 0 5px;
                border-radius: 5px;
                font-size: 18px;
                font-weight: 500;

                &:hover {
                    text-decoration: underline;
                }
            }

            .disabled-button {
                background-color: grey;                
                cursor: default;

                &:hover {
                    text-decoration: none;
                }
            }

            .focus-button {
                background-color: dodgerblue;
            }
        }
    }
</style>