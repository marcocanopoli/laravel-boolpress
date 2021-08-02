<template>
    <header class="my-header">
        <ul class="menu">
            <li id="logo">
                <img src="https://www.boolean.careers/images/misc/logo-small.png" alt="logo">
            </li>
            <li>
                <router-link :to="{ name: 'home' }">Home</router-link>
            </li>
            <li>
                <router-link :to="{ name: 'blog' }">Blog</router-link>
            </li>
            <li>
                <router-link :to="{ name: 'about' }">About</router-link>
            </li>
            <li>
                <a href="/admin">Admin</a>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name: 'TheHeader'
}
</script>

<style lang="scss">
    @import '../../sass/front/variables.scss';

    .my-header {
        height: $headerHeight;
        padding: 5px 10px;
        background-color: #9561e2;
        color: #fff;
        border-radius: 0 0 15px 15px;

        a {
            text-decoration: none;
            color: #fff;

            &:hover {
                color: #000;
            }
        }

        .menu {
            display: flex;
            align-items: center;
            list-style: none;
            height: 100%;


            li {
                display: flex;
                align-items: center;
                height: 100%;
                padding: 0 5px;
            }

            #logo {
                flex-grow: 1;               

                img {
                    height: 80%;
                }
            }
        }
    }

</style>