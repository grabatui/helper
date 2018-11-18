<template>
    <div>
        <search />

        <movie v-for="item in itemsStore.state.items" :key="item.id" :item="item" :transition="'fade-up'" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import Search from './New/Search';
    import Movie from './Queue/Movie';
    import Vuex from 'vuex';

    @Component({
        components: {Search, Movie},
    })
    export default class New extends Vue {
        itemsStore = new Vuex.Store({
            state: {
                items: {},
            },
            mutations: {
                set(state, items) {
                    state.items = items;
                }
            },
        });
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
