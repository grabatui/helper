const mix = require(`laravel-mix`);
const {sync: glob} = require(`glob`);

const config = {
    sass: {
        from: `resources/assets/sass/`,
        to: `public/css/`,
    },
    js: {
        from: `resources/assets/js/`,
        to: `public/js/`,
    },
    files: {
        from: `resources/assets/`,
        to: `public/`,
        items: [
            `img`,
        ],
    },
};

glob(config.sass.from + `[^_]*.scss`).forEach((style) => {
    const dest = style.replace(config.sass.from, ``).replace(`.scss`, `.css`);

    mix.sass(style, config.sass.to + dest, {outputStyle: 'compressed'});

});

glob(config.js.from + `*.js`).forEach((script) => {
    mix.react(script, config.js.to);
});

config.files.items.forEach((file) => mix.copyDirectory(config.files.from + file, config.files.to + file));
