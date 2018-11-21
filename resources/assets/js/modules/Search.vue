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
        components: {ClipLoader},
        props: {endpoint: String}
    })
    export default class Search extends Vue {
        inProcess = false;
        query = '';

        search() {
            if (!this.query) {
                return;
            }

            this.$emit('loaded', {});

            this.inProcess = true;

            axios
                .get(this.endpoint + '?query=' + this.query)
                .then((result) => {
                    this.$emit('loaded', result.data.data);

                    this.inProcess = false;

                    this.$refs.query.focus();
                })
                .catch((error) => console.error(error))
        }
    }
</script>
