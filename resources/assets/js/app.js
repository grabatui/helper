require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Main from './components/Main';
import Queue from './components/Queue';
import Watched from './components/Watched';
import New from './components/New';

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
    ],
});

const app = new Vue({
    el: '#app',
    components: {application: Main},
    router,
});
