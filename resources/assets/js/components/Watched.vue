<template>
    <div>
        <movie v-for="item in items" :key="item.id" :item="item" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import axios from 'axios';
    import Movie from './Queue/Movie';

    @Component({
        components: {Movie},
    })
    export default class Main extends Vue {
        items = {};

        mounted() {
            axios
                .get('/api/movie/watched')
                .then((response) => this.items = response.data.data);
        }
    }
</script>
