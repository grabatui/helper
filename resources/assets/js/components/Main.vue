<template>
    <div class="menu">
        <div class="row">
            <div class="five columns">
                <router-link class="button u-full-width" :to="{name: 'home'}">Очередь</router-link>
            </div>

            <div class="five columns">
                <router-link class="button u-full-width" :to="{name: 'watched'}">Просмотренные</router-link>
            </div>

            <div class="two columns">
                <strong>
                    <router-link class="button button-primary u-full-width menu__add" :to="{name: 'new'}">&plus;</router-link>
                </strong>
            </div>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';

    @Component
    export default class Main extends Vue {

    }
</script>
