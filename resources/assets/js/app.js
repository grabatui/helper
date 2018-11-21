require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

Vue.use(VueRouter);
Vue.use(Vuex);

import Main from './components/Main';
import Queue from './components/Queue';
import Watched from './components/Watched';
import New from './components/New';
import Movie from './components/Movie';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Queue,
        },
        {
            path: '/watched',
            name: 'watched',
            component: Watched,
        },
        {
            path: '/new',
            name: 'new',
            component: New,
        },
        {
            path: '/movie/:id',
            name: 'detail',
            component: Movie,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: {application: Main},
    router,
});
