<template>
    <div class="menu">
        <div class="row">
            <div class="five columns">
                <router-link
                    class="button u-full-width"
                    :class="{'button-primary': $route.name === 'home'}"
                    :to="{name: 'home'}"
                >Очередь</router-link>
            </div>

            <div class="five columns">
                <router-link
                    class="button u-full-width"
                    :class="{'button-primary': $route.name === 'watched'}"
                    :to="{name: 'watched'}"
                >Просмотренные</router-link>
            </div>

            <div class="two columns">
                <router-link
                    class="button u-full-width menu__add"
                    :class="{'button-primary': $route.name === 'new'}"
                    :to="{name: 'new'}"
                    title="Добавить"
                >&plus;</router-link>
            </div>
        </div>

        <router-view></router-view>
    </div>
</template>

<script>
    import Vue from 'vue';
    import Component from 'vue-class-component';

    @Component
    export default class Main extends Vue {}
</script>
