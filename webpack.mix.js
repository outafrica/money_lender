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
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/admin/grid.css',
        'resources/css/admin/main.css'
    ], 'public/css/admin/admin.css');
    // .styles([
    //     'resources/css/welcome/bootstrap.css',
    //     'resources/css/welcome/fontawesome-all.cs',
    //     'resources/css/welcome/swiper.css',
    //     'resources/css/welcome/magnific-popup.css',
    //     'resources/css/welcome/styles.css',
    // ], 'public/css/app.css')
    // js([
    //     'resources/js/welcome/jquery.min.js',
    //     'resources/js/welcome/bootstrap.min.js',
    //     'resources/js/welcome/jquery.easing.min.js',
    //     'resources/js/welcome/jquery.magnific-popup.js',
    //     'resources/js/welcome/swiper.min.js',
    //     'resources/js/welcome/scripts.js',
    // ], 'public/js/app.js')
