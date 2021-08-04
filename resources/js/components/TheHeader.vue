<template>
    <header class="my-header container">
        <ul class="menu">
            <li>
                <router-link 
                :to="{ name: 'home' }"
                 id="logo">
                    <img src="https://www.boolean.careers/images/misc/logo-small.png" alt="logo">
                </router-link>                
            </li>
            <li class="nav-last-left">
                <router-link :to="{ name: 'home' }">
                    <h3>BoolPress</h3>
                </router-link>
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
        background-color: $purple;
        color: #fff;
        border-radius: 0 0 15px 15px;
        box-shadow: 0px 10px 10px rgba(0, 0 , 0, 0.5);

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


            li, #logo {
                display: flex;
                align-items: center;
                height: 100%;
                padding: 0 5px;

                &.nav-last-left {
                    flex-grow: 1;
                }
            }

            #logo {         
                height: 100%; 

                img {
                    height: 80%;
                }
            }
        }
    }

</style>