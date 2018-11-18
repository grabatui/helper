<template>
    <div class="search">
        <form class="row" @submit.prevent="search">
            <div class="ten columns">
                <input
                    type="text"
                    class="search__input u-full-width"
                    placeholder="Начните вводить название фильма"
                    v-model="query"
                    :disabled="inProcess"
                    ref="query"
                    autofocus
                />
            </div>

            <div class="two columns">
                <button type="submit" class="search__button button u-full-width" :disabled="inProcess">Искать</button>
            </div>
        </form>

        <clip-loader class="search__loader" :loading="inProcess" :size="'30px'" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import ClipLoader from 'vue-spinner/src/ClipLoader';
    import axios from 'axios';

    @Component({
        components: {ClipLoader}
    })
    export default class Search extends Vue {
        inProcess = false;
        query = '';

        search() {
            this.$parent.itemsStore.commit('set', {});

            this.inProcess = true;

            axios
                .get('/api/movie/search?query=' + this.query)
                .then((result) => {
                    this.$parent.itemsStore.commit('set', result.data.data);

                    this.inProcess = false;

                    this.$refs.query.focus();
                })
                .catch((error) => console.error(error))
        }
    }
</script>
