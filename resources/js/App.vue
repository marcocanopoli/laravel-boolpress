<template>
    <div class="container body-wrapper">
        <the-header />
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import TheHeader from './components/TheHeader.vue'

export default {
    name: 'App',
    components:  {
        TheHeader
    }
}
</script>

<style lang="scss">
    @import '../sass/front/variables.scss';

    .body-wrapper {
        height: 100%;

        main {
            padding-top: 45px;
            height: calc(100% - #{$headerHeight});
        }
    }
</style>