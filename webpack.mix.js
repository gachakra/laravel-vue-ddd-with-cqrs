const mix = require('laravel-mix');
const VuetifyLoader = require('vuetify-loader/lib/plugin');

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
        .js('resources/js/app.js', 'public/js')
        .sass('resources/sass/app.scss', 'public/css')
        .webpackConfig({
            plugins: [
                new VuetifyLoader({
                    options: {}
                }),
            ],
            devServer: {
                host: '0.0.0.0',
                port: 8080
            },
            watchOptions: {
                poll: 2000,
                ignored: /node_modules/
            },
        })
        .options({
            hmrOptions: {
                host: 'localhost',
                port: '8080'
            }
        })
        .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}
