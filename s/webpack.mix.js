const mix = require('laravel-mix');
const path = require('path');

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
mix.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/js'),
            },
        },
    })
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/admin.scss', 'public/css')

mix.copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/ui/icons.svg')
