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

mix.browserSync('roombooker.test');
mix
   .js('resources/js/app.js', 'public/js').version()
   .js('resources/adminator/scripts/index.js', 'public/js/admin-vendor.js').version()
   .sass('resources/sass/app.scss', 'public/css').version()
   .sass('resources/adminator/styles/index.scss', 'public/css/admin-vendor.css').version()
   .copyDirectory('resources/adminator/static', 'public/assets/static').version();
