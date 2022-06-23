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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('resources/css/custom.css', 'public/css')
    .copy('resources/css/login.css', 'public/css')
    .copy('resources/css/cards.css', 'public/css')
    .copy('./node_modules/startbootstrap-sb-admin-2/css/sb-admin-2.min.css', './public/css')
    .copy('./node_modules/startbootstrap-sb-admin-2/js/sb-admin-2.min.js', './public/js')
    .copy('./node_modules/startbootstrap-sb-admin-2/vendor', './public/vendor')
    .sourceMaps();
