const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js/app.js")
    .js("resources/js/dashboard.js", "public/js/dashboard.js")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .copyDirectory("storage/images", "public/images")
    .copyDirectory("resources/img", "public/images");

mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve("resources/sass")
        }
    }
});
