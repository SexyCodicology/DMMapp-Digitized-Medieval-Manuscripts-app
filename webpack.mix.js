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

mix.setPublicPath('public/');

mix.js('resources/js/app.js', 'public/js')
    .extract(['bootstrap'], 'public/js/bootstrap.min.js')

    .minify('resources/js/data.js', 'public/js/data.min.js')
    .minify('resources/js/admin-dashboard.js', 'public/js/admin-dashboard.min.js')
    .minify('resources/js/main.js', 'public/js/main.min.js')
    .minify('resources/js/map-data.js', 'public/js/map-data.min.js')
    .minify('resources/js/broken-links.js', 'public/js/broken-links.min.js')

    .sass('resources/sass/app.scss', 'public/css')

    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/style.css', 'public/css')
    .copyDirectory('resources/img', 'public/img')
    .version();

mix.browserSync('127.0.0.1:8000');
