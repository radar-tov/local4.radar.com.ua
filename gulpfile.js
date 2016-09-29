var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'materialize.css',
        'style.css',
        'animate.css',
        'lightbox.css',
        'jquery.rating.css',
        'print.css',
        'range.css',
    ]);

    mix.scripts([
        'jquery-2.1.3.min.js',
        'materialize.js',
        'ion.rangeSlider.js',
        'lightbox.js',
        'jquery.glide.js',
        'wow.min.js',
        'jquery.rating-2.0.min.js',
        'init.js',
    ]);
});
