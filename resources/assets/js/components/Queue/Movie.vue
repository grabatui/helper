<template>
    <transition :name="transition || 'fade'">
        <div class="row movie" v-if="shown">
            <div class="two columns movie__image">
                <router-link :to="{name: 'detail', params: {id: item.kp_id}}">
                    <img
                        src="https://st.kp.yandex.net/images/no-poster.gif"
                        :data-src="data.image"
                        :alt="data.name"
                        :title="data.name"
                        class="lazyload u-max-full-width"
                        ref="image"
                    />
                </router-link>
            </div>

            <div class="ten columns movie__content">
                <div class="movie__title">
                    <router-link :to="{name: 'detail', params: {id: item.kp_id}}">
                        <h5>{{ title }}</h5>
                    </router-link>

                    <a v-if="data.kp_link" :href="data.kp_link" target="_blank">
                        <img src="/img/kp.png" alt="Найти на КиноПоиске" />
                    </a>

                    <a v-if="data.rt_link" :href="data.rt_link" target="_blank">
                        <img src="/img/rt.png" alt="Найти на RuTracker'е" />
                    </a>
                </div>

                <p class="movie__subtitle" v-if="data.original_name">{{ data.original_name }}</p>

                <div class="movie__body">
                    <ul>
                        <li v-if="data.created_at">
                            <strong>Добавлено:</strong>&nbsp;{{ data.created_at }}
                        </li>

                        <li v-if="data.watched_at">
                            <strong>Просмотрено:</strong>&nbsp;{{ data.watched_at }}
                        </li>
                    </ul>
                </div>

                <div class="movie__buttons" v-if="!data.watched">
                    <button
                        @click="add"
                        class="button button-primary movie__buttons-watch"
                        v-if="!data.exists"
                    >Добавить</button>

                    <button
                        @click="showOpinionForm = true"
                        class="button button-primary movie__buttons-watch"
                        v-if="data.exists && !data.watched && !showOpinionForm"
                    >Просмотрено</button>

                    <div v-if="showOpinionForm" class="movie__opinion">
                        <div class="movie__opinion-rating">
                            <star-rating v-model="watchedData.rating" :show-rating="false" :star-size="20" />
                        </div>

                        <input
                            type="text"
                            v-model="watchedData.opinion"
                            class="movie__opinion-text"
                            placeholder="Что думаешь об этом фильме?"
                        />

                        <button class="button button-primary movie__opinion-button" @click="watched">Сохранить</button>
                    </div>
                </div>

                <div v-else class="movie__opinion">
                    <div class="movie__opinion-rating">
                        <star-rating :show-rating="false" :star-size="20" :read-only="true" :rating="data.rating || 0" />
                    </div>

                    <p v-if="data.opinion" class="movie__opinion-text">{{ data.opinion }}</p>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import StarRating from 'vue-star-rating';
    import axios from 'axios';
    import LazyLoad from 'lazyload';

    @Component({
        props: {
            item: Object,
            transition: String,
        },
        components: {StarRating},
    })
    export default class Main extends Vue {
        data = {};
        shown = true;
        showOpinionForm = false;
        watchedData = {};

        get title() {
            let result = this.data.name;

            if (this.data.year) {
                result += ' (' + this.data.year + ')';
            }

            return result;
        }

        add() {
            if (this.data.exists) {
                return;
            }

            axios
                .post('/api/movie/add', this.data)
                .then((result) => {
                    if (!result.data) {
                        console.error('Something wrong, my lord..');

                        return;
                    }

                    this.data.id = result.data;

                    this.reload();
                })
        }

        watched() {
            this.showOpinionForm = false;

            axios
                .post('/api/movie/' + this.data.id + '/watch', this.watchedData)
                .then((result) => {
                    if (result.data !== 'success') {
                        console.error('Something wrong, my lord..');

                        return;
                    }

                    this.shown = false;
                })
                .catch((error) => console.error(error))
        }

        reload() {
            axios
                .get('/api/movie/' + this.data.id + '/reload')
                .then((result) => this.data = result.data.data);
        }

        mounted() {
            this.data = this.item;

            new LazyLoad([this.$refs.image]);
        }
    }
</script>

<style>
    .fade-enter-active {
        transition: all .3s ease;
    }

    .fade-enter {
        transform: translateX(10px);
        opacity: 0;
    }

    .fade-leave-to {
        transform: translate3d(100%, 0, 0);
        opacity: 0;
    }

    .fade-leave-active {
        transition: all .4s ease;
    }
</style>
