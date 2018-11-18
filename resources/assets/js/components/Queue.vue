<template>
    <div>
        <search :endpoint="endpoint" @loaded="items = $event" />

        <movie v-for="item in items" :key="item.id" :item="item" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import axios from 'axios';
    import Movie from './Queue/Movie';
    import Search from '../modules/Search';

    @Component({
        components: {Movie, Search},
    })
    export default class Main extends Vue {
        endpoint = '/api/movie/queue';
        items = {};

        mounted() {
            axios
                .get(this.endpoint)
                .then((response) => this.items = response.data.data);
        }
    }
</script>
