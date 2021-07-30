<template>
    <div class="container">
        <the-front-header />
        <h1 class="welcome">Welcome to BoolPress!</h1>
        <posts />
    </div>
</template>

<script>
import TheFrontHeader from './components/TheFrontHeader.vue'
import Posts from './components/Posts.vue'

export default {
    name: 'App',
    components:  {
        TheFrontHeader, 
        Posts 
    }
}
</script>

<style lang="scss" scoped>
    .welcome {
        padding-top: 30px;
        text-align: center;
    }
</style>