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

mix.setPublicPath('public_html/');

mix.js('resources/js/app.js', 'public_html/js')
    .copy('resources/js/data.js', 'public_html/js/data.js')
    .copy('resources/js/dashboard.js', 'public_html/js/dashboard.js')
    .copy('resources/js/main.js', 'public_html/js/main.js')
    .minify('resources/js/data.js', 'public_html/js/data.min.js')
    .minify('resources/js/dashboard.js', 'public_html/js/dashboard.min.js')
    .minify('resources/js/main.js', 'public_html/js/main.min.js')
    .sass('resources/sass/app.scss', 'public_html/css')
    .postCss('resources/css/app.css', 'public_html/css')
    .postCss('resources/css/style.css', 'public_html/css')
    .sourceMaps();

mix.browserSync('127.0.0.1:8000');
