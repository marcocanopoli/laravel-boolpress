<template>
    <section class="about">
        <h1>About Us</h1>
    </section>
</template>

<script>
export default {
    name: 'PageAbout'
}
</script>

<style lang="scss">
    @import '../../sass/front/_mixins.scss';
    
    .about {
        @include flex-center;
        height: 100%;
    }
    
</style>