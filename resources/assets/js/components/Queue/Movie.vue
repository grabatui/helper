<template>
    <div class="row movie">
        <div class="two columns">
            <img :src="item.image" :alt="item.name" class="movie--image u-max-full-width" />
        </div>

        <div class="ten columns">
            <div class="movie--title">
                <h5>{{ title }}</h5>

                <a v-if="item.kp_link" :href="item.kp_link" target="_blank">
                    <img src="/img/kp.png" alt="Найти на КиноПоиске" />
                </a>

                <a v-if="item.rt_link" :href="item.rt_link" target="_blank">
                    <img src="/img/rt.png" alt="Найти на RuTracker'е" />
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';

    @Component({
        props: {
            item: Object,
        }
    })
    export default class Main extends Vue {
        items = {};

        get title() {
            return this.item.name + ' (' + this.item.year + ')';
        }
    }
</script>
