const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    devServer: {
        watchOptions: {
            poll: true
        }
    }
});

mix.browserSync('laragram.ru');

mix.js('resources/js/layouts', 'public/js/layouts')
    .sass('resources/sass/layouts', 'public/css/layouts')
    .copy('resources/assets', 'public/assets');
