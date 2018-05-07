let mix = require('laravel-mix');
const webpack = require('webpack');


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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/owl.carousel.min.js', 'public/js/owl.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/style.scss', 'public/css')
    .styles([
    'resources/assets/css/owl.carousel.min.css',
    'resources/assets/css/owl.theme.default.min.css',
    'resources/assets/css/owl.theme.green.min.css'
], 'public/css/owl.css');
    // .browserSync();