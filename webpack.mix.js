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

mix.js('resources/js/layouts/main/index.js', 'public/js/layouts/main.js')
    .sass('resources/sass/layouts/main/index.scss', 'public/css/layouts/main.css')
    .copy('resources/assets', 'public/assets');
