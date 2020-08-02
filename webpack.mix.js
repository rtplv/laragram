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

mix.js('resources/js/index.js', 'public/js/index.js')
    .sass('resources/sass/index.scss', 'public/css/index.css')
    .copy('resources/assets', 'public/assets');
