<template>
    <div class="loader">
        <div>
            <h1>Please wait...</h1>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:transparent;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#9561e2" stroke-width="10" r="40" stroke-dasharray="188.49555921538757 64.83185307179586">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="2s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
            </svg>
        </div>
    </div>
</template>

<script>
export default {
    name: 'VLoader'
}
</script>

<style lang="scss">
    @import '../../sass/front/_mixins.scss';
    
    .loader {
        @include flex-center;
        flex-direction: column;
        height: 100%;
    }
</style>