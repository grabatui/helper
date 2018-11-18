<template>
    <div>
        <search endpoint="/api/movie/search" @loaded="items = $event" />

        <movie v-for="item in items" :key="item.id" :item="item" :transition="'fade-up'" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import Search from '../modules/Search';
    import Movie from './Queue/Movie';

    @Component({
        components: {Search, Movie},
    })
    export default class New extends Vue {
        items = {};
    }
</script>

<style>
    .fade-up-enter-active {
        transition: all .3s ease;
    }

    .fade-up-enter {
        transform: translateY(10px);
        opacity: 0;
    }

    .fade-up-leave-to {
        transform: translate3d(0, -20%, 0);
        opacity: 0;
    }

    .fade-up-leave-active {
        transition: all .6s ease;
    }
</style>
