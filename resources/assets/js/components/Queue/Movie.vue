<template>
    <div class="row movie">
        <div class="two columns movie__image">
            <img :src="item.image" :alt="item.name" class="u-max-full-width" />
        </div>

        <div class="ten columns movie__content">
            <div class="movie__title">
                <h5>{{ title }}</h5>

                <a v-if="item.kp_link" :href="item.kp_link" target="_blank">
                    <img src="/img/kp.png" alt="Найти на КиноПоиске" />
                </a>

                <a v-if="item.rt_link" :href="item.rt_link" target="_blank">
                    <img src="/img/rt.png" alt="Найти на RuTracker'е" />
                </a>
            </div>

            <p class="movie__subtitle" v-if="item.original_name">{{ item.original_name }}</p>

            <div class="movie__body">
                <ul>
                    <li v-if="item.created_at">
                        <strong>Добавлено:</strong>&nbsp;{{ item.created_at }}
                    </li>

                    <li v-if="item.watched_at">
                        <strong>Просмотрено:</strong>&nbsp;{{ item.watched_at }}
                    </li>
                </ul>
            </div>

            <div class="movie__buttons">
                <button
                    @click="showOpinionForm = true"
                    class="button button-primary movie__buttons-watch"
                    v-if="!item.watched && !showOpinionForm"
                >Просмотрено</button>

                <div v-if="showOpinionForm" class="movie__opinion">
                    <div class="movie__opinion-rating">
                        <star-rating v-model="watchedData.rating" :show-rating="false" :star-size="20" />
                    </div>

                    <input type="text" class="movie__opinion-text" placeholder="Что думаешь об этом фильме?" />

                    <button class="button button-primary movie__opinion-button" @click="watched">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import StarRating from 'vue-star-rating';

    @Component({
        props: {item: Object},
        components: {StarRating},
    })
    export default class Main extends Vue {
        showOpinionForm = false;
        watchedData = {};

        get title() {
            return this.item.name + ' (' + this.item.year + ')';
        }

        watched() {
            // TODO
            this.showOpinionForm = false;
        }

        // TODO: После инициализации подгружать рейтинг с КП (и IMDB?)
    }
</script>
