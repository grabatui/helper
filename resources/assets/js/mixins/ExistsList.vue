<template>
    <div>
        <search :endpoint="endpoint" @loaded="items = $event" />

        <movie v-for="item in items" :key="item.id" :item="item" />

        <clip-loader :size="'30px'" :loading="searching" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import axios from 'axios';
    import Movie from '../components/Queue/Movie';
    import Search from '../modules/Search';
    import ClipLoader from 'vue-spinner/src/ClipLoader';
    import concat from 'lodash/concat';

    @Component({
        components: {Movie, Search, ClipLoader},
    })
    export default class ExistsList extends Vue {
        scrollModifier = 200;
        searching = false;

        nextPage = null;
        items = [];

        mounted() {
            this.items = [];
            this.nextPage = this.endpoint;

            this.getItems();
        }
        created() {
            window.addEventListener('scroll', this.onScroll);
        }

        destroyed() {
            window.removeEventListener('scroll', this.onScroll);
        }

        onScroll() {
            if (
                !this.searching &&
                (window.innerHeight + window.scrollY + this.scrollModifier) >= document.body.offsetHeight
            ) {
                this.getItems();
            }
        }

        getItems() {
            if (this.nextPage) {
                this.searching = true;
            } else {
                return;
            }

            axios
                .get(this.nextPage)
                .then((response) => {
                    this.items = (!this.items || this.items.length <= 0) ?
                        response.data.data :
                        concat(this.items, response.data.data);

                    if (response.data.hasOwnProperty('links')) {
                        this.nextPage = response.data.links.next;
                    }

                    this.searching = false;
                });
        }
    }
</script>
