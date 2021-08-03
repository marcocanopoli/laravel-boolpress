<template>
    <section class="welcome container">
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
        // @include flex-center;
        // height: 100%;

        h1 {
            color: #fff;
            text-shadow: 0px 0px 15px rgba(0, 0 , 0, 0.5);
        }
    }
</style>