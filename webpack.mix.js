const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix
    .sass('resources/views/assets/scss/style.scss','public/assets/css/style.css')
    .scripts('node_modules/jquery/dist/jquery.js','public/assets/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.min.js','public/assets/js/bootstrap.js')
    .scripts('resources/views/assets/js/script.js', 'public/assets/js/script.js')

    .version()
 

 ;