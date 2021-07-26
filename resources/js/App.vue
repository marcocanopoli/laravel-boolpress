<template>
    <div class="container">
        <the-front-header />
        <the-welcome />
    </div>
</template>

<script>
import TheFrontHeader from './components/TheFrontHeader.vue'
import TheWelcome from './components/TheWelcome.vue'

export default {
    name: 'App',
    components:  {
        TheFrontHeader, 
        TheWelcome,
        TheFrontHeader 
    }
}
</script>

<style lang="scss" scoped>
    
</style>