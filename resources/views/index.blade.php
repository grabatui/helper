@extends('layouts.main')

@section('content')
{{--    <div id="application"></div>--}}

    <section class="section main">
        <div class="container">
            <h1 class="title has-text-primary">Hello, my dear friend <i class="far fa-hand-spock"></i></h1>

            <p>This is a little site for collecting your own movies library. Enjoy!</p>

            <p>First, you can type movie name in the input above to <a href="#">search it</a>. I'm not sure that all movies you want to find will be here, but most of them.</p>

            <p>Next, you might want to keep what you watched and want to watch. For that, you can <a href="#" class="has-text-link">register</a> or
                <a href="#" class="has-text-link">login</a>. In your personal cabinet all your movies will be in one place.</p>

            <p>In your personal cabinet you can share with your friends, show them your watching progress, chat with another people about movie.</p>

            <p>I hope, this site will help you!</p>

            <hr>

            <p>For any question about bugs or site's work, <a href="mailto:bitolyan@ya.ru">ask me</a>.</p>
        </div>
    </section>

    @include('_auth_register')
@endsection

@push('js')
    <script type="application/javascript" src="{{ mix('/js/main.js') }}"></script>
@endpush
