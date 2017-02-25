var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.styles(
        [
            'frontend/style.css',
            'frontend/additional.css',
            'frontend/jquery.fancybox.css',
            'frontend/font.css',
        ]
    );


    mix.scripts(
        [
            'frontend/jquery-2.1.3.min.js',
            'frontend/jquery.mousewheel.pack.js',
            'frontend/jquery.fancybox.pack.js',
            'frontend/index.js'
        ]
    );

    mix.version(
        [
            'css/all.css',
            'js/all.js'
        ]
    );

});
