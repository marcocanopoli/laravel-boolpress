<template>
    <section class="welcome">
        <h1>Welcome to BoolPress!</h1>
    </section>
</template>

<script>
export default {
    name: 'PageHome'
}
</script>

<style lang="scss">
    @import '../../sass/front/_mixins.scss';
    
    .welcome {
        @include flex-center;
        height: 100%;
    }
</style>