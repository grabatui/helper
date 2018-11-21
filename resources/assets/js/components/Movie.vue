<template>
    <div class="detail">
        <div v-show="shown" class="detail__content">
            <p v-if="!id || data == null">Такого фильма не найдено :C</p>

            <div v-else>Yes!</div>
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
    }
</script>
