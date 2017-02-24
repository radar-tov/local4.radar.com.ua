/*
    CSS

    // frontend
    public\frontend\css\print.css
    public\frontend\css\style.css
    public\frontend\css\font.css
    public\css\additional.css

    //авторизация при входе в админку
    public\css\app.css

    // админка
    public\admin\assets\css\bootstrap.min.css
    public\admin\assets\css\font-awesome.min.css
    public\admin\assets\css\jquery-ui.custom.min.css
    public\admin\assets\css\jquery.gritter.css
    https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css
    public\admin\assets\css\ace-fonts.css
    public\admin\assets\css\uncompressed\ace.css
    public\admin\assets\css\uncompressed\ace-part2.css  // для IE9
    public\admin\assets\css\ace-ie.min.css              // для IE9
    public\admin\assets\css\main.css
    public\packages\colorbox\colorbox.css
    public\packages\tinymce\skins\lightgray\skin.min.css


*/


var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.styles(
        [
            'style.css',
            'additional.css',
            'jquery.fancybox.css',
            'font.css',
        ]
    );


    mix.scripts(
        [
            'jquery-2.1.3.min.js',
            'jquery.mousewheel.pack.js',
            'jquery.fancybox.pack.js',
            'index.js'
        ]
    );

    mix.version(
        [
            'css/all.css',
            'js/all.js'
        ]
    );

});
