<template>
    <section class="content">
        <Header></Header>
        <router-view></router-view>
    </section>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "app",

        computed: {
            ...mapGetters(['authUser']),
        }
    }
</script>

<style lang="scss" scoped>
    .content {
        overflow: hidden;
    }

    @media (min-width: 577px) {
        .content {
            padding-left: 100px;
        }
    }
</style>
