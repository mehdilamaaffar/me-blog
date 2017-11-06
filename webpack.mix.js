let mix = require('laravel-mix');

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
  .js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .scripts([
    'resources/assets/vendor/js/jquery-2.1.3.min.js',
    'resources/assets/vendor/js/bootstrap.min.js',
    'resources/assets/vendor/js/modernizr.custom.js',
    'resources/assets/vendor/js/pace.min.js',
    'resources/assets/vendor/js/script.js',
  ], 'public/js/vendor.js')
  .styles([
    'resources/assets/vendor/css/bootstrap.min.css',
    'resources/assets/vendor/css/ionicons.min.css',
    'resources/assets/vendor/css/pace.css',
  ], 'public/css/vendor.css')
  .options({
    processCssUrls: false,
  })
  .browserSync('localhost:8000')
  // .browserSync('app.dev')
