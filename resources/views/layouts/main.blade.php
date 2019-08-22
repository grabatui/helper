<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.Laravel = {csrfToken: '{{ csrf_token() }}'};
    </script>

    <title>Grabatui's helper</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" />
</head>

<body>
    <main>
        <section class="hero">
            <div class="hero-body">
                <div class="container">
                    <div class="field is-grouped">
                        <div class="control is-uppercase has-text-centered">
                            <a href="/" class="title is-5">
                                <p>Search</p>
                                <p>The Movie</p>
                            </a>
                        </div>

                        <div class="control is-expanded">
                            <input type="text" class="input is-medium" placeholder="Type some movie name..." />
                        </div>

                        <div class="control">
                            <button class="button is-primary is-medium" title="Search">
                            <span class="icon">
                                <i class="fas fa-search"></i>
                            </span>
                            </button>
                        </div>

                        <div class="control">
                            <button class="button is-medium is-primary" title="Login">
                            <span class="icon">
                                <i class="fas fa-user"></i>
                            </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @yield('content')
    </main>

    <footer class="footer has-background-light">
        <div class="content has-text-centered">
            <p>This site was created by Grabatui for fun</p>
            <p>You can call me by <a href="mailto:bitolyan@ya.ru" target="_blank">email</a></p>
        </div>
    </footer>

    @stack('js')
</body>
</html>
