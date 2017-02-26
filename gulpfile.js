var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.styles(
        [
            'frontend/font.css',
            'frontend/style.css',
            'frontend/jquery.fancybox.css',
        ], 'public/css/frontend'
    );


    mix.scripts(
        [
            'frontend/jquery-2.1.3.min.js',
            'frontend/jquery.mousewheel.pack.js',
            'frontend/jquery.fancybox.pack.js',
            'frontend/index.js'
        ], 'public/js/frontend'
    );

    mix.version(
        [
            'css/frontend/all.css',
            'js/frontend/all.js'
        ]
    ).browserSync({
        proxy: 'local.radar.com.ua',
        notify: false
    });

});
