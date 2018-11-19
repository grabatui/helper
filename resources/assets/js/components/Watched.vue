<script>
    import ExistsList from '../mixins/ExistsList';
    import Component from 'vue-class-component';

    @Component
    export default class Main extends ExistsList {
        endpoint = '/api/movie/watched';
    }
</script>
