<template>
    <div class="row">
        <div class="two columns search__list-item__poster">
            <a :href="this.url" target="_blank">
                <img :src="this.poster ? this.poster : 'https://st.kp.yandex.net/images/no-poster.gif'" alt="" />
            </a>
        </div>

        <div class="ten columns search__list-item__data">
            <div>
                <span v-html="this.getTitle()"></span>
                <br>
                <span>{{ this.year }}</span>
            </div>

            <div>
                <a :href="this.url" class="button" target="_blank">Оригинал</a>

                <button class="button button-primary" v-if="!this.exists" @click="add">Добавить</button>
                <button class="button" v-else @click="remove">Убрать</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {data: Object},
        data() {
            return this.data;
        },
        methods: {
            getTitle() {
                let result = '<strong>' + this.title + '</strong>';

                if (this.original) {
                    result += '&nbsp;<span>(<em>' + this.original + '</em>)</span>';
                }

                return result;
            },
            add() {
                fetch('/add/' + this.id, {method: 'post'})
                    .then((result) => this.exists = result);
            },
            remove() {
                fetch('/add/' + this.id, {method: 'delete'})
                    .then((result) => this.exists = !result);
            },
        },
    }
</script>