let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js').minify('public/js/app.js').version();
mix.sass('resources/assets/sass/app.scss', 'public/css').minify('public/css/app.css').version();
mix.sass('resources/assets/sass/skeleton.scss', 'public/css').minify('public/css/skeleton.css').version();

mix.copyDirectory('resources/assets/img', 'public/img');
