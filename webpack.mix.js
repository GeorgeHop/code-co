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

mix.js('resources/js/admin', 'public/js')
    .js('resources/js/web', 'public/js')
    .sass('resources/sass/livechat.scss', 'public/css')
    .copy('node_modules/tinymce/skins', 'public/js/skins')
    .copy('node_modules/tinymce/icons', 'public/js/icons');
