@extends('layouts.main')

@section('content')
    {{--    <div id="application"></div>--}}

    <section class="section main">
        <div class="container">
            <div class="columns">
                <div class="column is-one-fifth">
                    <aside class="menu">
                        <p class="menu-label">Movies</p>

                        <ul class="menu-list">
                            <li><a href="/cabinet/queue"class="is-active">To watch</a></li>
                            <li><a href="/cabinet/watched">Watched</a></li>
                        </ul>
                        <p class="menu-label">Settings</p>

                        <ul class="menu-list">
                            <li><a href="/cabinet/preferences">Preferences</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="column">
                    @include('_movie')
                    @include('_movie')
                    @include('_movie')
                </div>
            </div>
        </div>
    </section>
@endsection
