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

mix

.js('resources/backend/js/app.js', 'public/backend/js')
.sass('resources/sass/app.scss', 'public/css')
.js('resources/backend/js/components/user/profile/index.js','public/backend/js/user/profile/index.js')
.js('resources/backend/js/components/user/meme/index.js','public/backend/js/user/meme/index.js');

