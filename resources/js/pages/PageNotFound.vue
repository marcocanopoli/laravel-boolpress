<template>
    <section class="not-found">
        <h1 class="big-title">404<br>Not Found</h1>
    </section>
</template>

<script>
export default {
    name: 'PageNotFound'
}
</script>

<style lang="scss">
    @import '../../sass/front/_mixins.scss';
    
    .not-found {
        @include flex-center;
        height: 100%;
    }

</style>