let mix = require('laravel-mix');

const config = {
    sass: {
        from: 'resources/assets/sass/',
        to: 'public/css/',
        items: [
            'app',
            'skeleton',
        ],
    },
    js: {
        from: 'resources/assets/js/',
        to: 'public/js/',
        items: [
            'app',
        ],
    },
    files: {
        from: 'resources/assets/',
        to: 'public/',
        items: [
            'img',
        ],
    },
};

config.sass.items.forEach((file) => mix
    .sass(config.sass.from + file + '.scss', config.sass.to)
    .minify(config.sass.to + file + '.css')
    .version()
);

config.js.items.forEach((file) => mix
    .js(config.js.from + file + '.js', config.js.to)
    .copy(config.js.to + file + '.js', config.js.to + file + '.min.js')
    .version()
);

config.files.items.forEach((file) => mix.copyDirectory(config.files.from + file, config.files.to + file))
