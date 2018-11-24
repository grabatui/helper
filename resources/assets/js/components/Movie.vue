<template>
    <div class="detail">
        <div v-show="shown" class="detail__content">
            <p v-if="!id || data == null">Такого фильма не найдено :C</p>

            <div v-else class="row">
                <div class="three columns">
                    <img :src="data.poster" :alt="data.title" class="u-max-full-width" />
                </div>

                <div class="nine columns">
                    <h1>{{ data.title }}</h1>

                    <table class="u-full-width">
                        <tr>
                            <td class="name">Премьера</td>
                            <td>{{ data.premiere }}</td>
                        </tr>
                        <tr>
                            <td class="name">Страна</td>
                            <td>{{ countries }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <clip-loader class="detail__loader" :loading="!shown" />
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import ClipLoader from 'vue-spinner/src/ClipLoader';
    import axios from 'axios';

    @Component({
        components: {ClipLoader},
    })
    export default class New extends Vue {
        id = null;
        data = null;
        shown = false;

        mounted() {
            this.id = (this.$route.params.hasOwnProperty('id')) ? this.$route.params.id : null;

            if (!this.id) {
                this.shown = true;
                return;
            }

            axios
                .get('/api/movie/' + this.id)
                .then((result) => {
                    this.shown = true;
                    this.data = result.data;
                })
        }

        get countries() {
            let result = [];
            if (this.data.hasOwnProperty('countries')) {
                for (let country of this.data.countries) {
                    result.push(country.name);
                }
            }

            return result.join(', ');
        }
    }
</script>
