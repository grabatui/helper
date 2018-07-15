<template>
    <div class="row search__wrapper">
        <div class="one columns">
            <button
                class="button button-primary search__button"
                title="Новый фильм"
                @click="formShown = !formShown"
            >+</button>
        </div>

        <div class="eleven columns" v-show="formShown">
            <input
                class="u-full-width"
                type="text"
                placeholder="Начните вводить название..."
                v-model="searchValue"
                @input="search"
            />
        </div>

        <ul class="search__list">
            <li v-for="movie in movies" class="search__list-item">
                <searched-movie :data="movie"></searched-movie>
            </li>
        </ul>

        <div class="preloader" v-show="this.onSearch"></div>
    </div>
</template>

<script>
    import SearchedMovie from "./SearchedMovie.vue";

    export default {
        data() {
            return {
                MIN_SEARCH_LENGTH: 3,

                onSearch: false,
                formShown: true, // TODO
                searchValue: '',
                movies: [],

                bounceTime: 1000,
                searchBounce: null,
            };
        },
        methods: {
            search() {
                if (!this.searchValue || this.searchValue.length < this.MIN_SEARCH_LENGTH) {
                    return;
                }

                if (this.searchBounce) {
                    clearTimeout(this.searchBounce);
                }

                this.searchBounce = setTimeout(() => {
                    this.onSearch = true;
                    this.movies = [];

                    fetch('api/movie/search?q=' + this.searchValue)
                        .then((result) => result.json())
                        .then((result) => {
                            this.onSearch = false;
                            this.movies = result;
                        });
                }, this.bounceTime);
            },
        },
        components: {
            'searched-movie': SearchedMovie,
        },
    }
</script>
