<template>
    <div class="header-box">
        <button class="menu-btn" @click="toggleMenu = !toggleMenu">
            <i class="fas fa-ellipsis-h"></i>
        </button>
        <header :class="{'openMenu': toggleMenu}">
            <ul class="top-menu">
                <li class="d-block d-sm-none">
                    <a role="button" @click="toggleMenu = !toggleMenu">
                        <i class="fas fa-times text-white"></i>
                    </a>
                </li>
                <li>
                    <router-link :to="{name: 'homePage'}">
                        home
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'videosPage'}">
                        videos
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'bioPage'}">
                        bio
                    </router-link>
                </li>
            </ul>
            <ul class="social-menu">
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100071139881215">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UC9qKKQ3KL6Bvje3mJlM8rFA">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://instagram.com/ofi_music_official">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </header>
    </div>
</template>

<script>
    export default {
        name: "leftHeader",
        data() {
            return {
                toggleMenu: false
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../sass/Header/index";
</style>
