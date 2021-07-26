<template>
    <header class="front-header">
        <ul class="menu">
            <li id="logo">
                <img src="https://www.boolean.careers/images/misc/logo-small.png" alt="logo">
            </li>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/about">About</a>
            </li>
            <li>
                <a href="/shop">Shop</a>
            </li>
            <li>
                <a href="/account">My Account</a>
            </li>
            <li>
                <a href="/admin">Admin</a>
            </li>
        </ul>
    </header>
</template>

<script>
export default {
    name: 'TheFrontHeader'
}
</script>

<style lang="scss" scoped>

    .front-header {
        height: 60px;
        padding: 5px 10px;
        background-color: plum;
        color: #000;
        border-radius: 0 0 15px 15px;

        a {
            text-decoration: none;
            color: black;

            &:hover {
                color: #fff;
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