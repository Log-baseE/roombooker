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

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery',
                Popper: ['popper.js', 'default'],
            })
        ]
    };
});

mix.browserSync('roombooker.test');
mix.js('resources/js/front/app.js', 'public/js')
    .sass('resources/sass/front/app.scss', 'public/css').version();
mix.js('resources/js/dashboard/index.js', 'public/js/dashboard.js')
    .sass('resources/sass/dashboard/index.scss', 'public/css/dashboard.css').version();
mix.copyDirectory('resources/fonts/', 'public/static/fonts/')
    .copyDirectory('resources/img/', 'public/static/img/');
mix.sourceMaps();
