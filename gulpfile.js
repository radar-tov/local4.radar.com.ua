var elixir = require('laravel-elixir');

var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var csso = require('gulp-csso');
var browserSync = require("browser-sync");


elixir(function(mix) {

    mix.styles(
        [
            'frontend/font.css',
            'frontend/style.css',
            'frontend/jquery.fancybox.css',
        ], 'public/css/frontend'
    );

    mix.styles(
        [
            'admin/bootstrap.min.css',
            'admin/font-awesome.min.css',
            'admin/ace.css',
            'admin/ace-skins.min.css',
            'admin/main.css',
            'admin/jquery-ui.custom.min.css',
            'admin/jquery.gritter.css',
            'admin/colorbox.css',
            'admin/jquery.fancybox.css'
        ], 'public/css/admin'
    );

    mix.scripts(
        [
            'frontend/jquery--2.1.3.min.js',
            'frontend/jquery.easing.1.3.js',
            'frontend/jquery-2.1.3.min.js',
            'frontend/jquery.mousewheel.pack.js',
            'frontend/jquery.fancybox.pack.js',
            'frontend/indexFooter.js'
        ], 'public/js/frontend'
    );

    mix.scripts(
        [
            'admin/jquery.colorbox-min.js',
            'admin/standalonepopup.js',
            'admin/ace.min.js',
            'admin/ace-elements.min.js',
            'admin/ace-extra.min.js',
            'admin/jquery-ui.custom.min.js',
            'admin/jquery.gritter.min.js',
            'admin/bootstrap.min.js',
            'admin/jquery.maskedinput.js',
            'admin/jquery.mousewheel.pack.js',
            'admin/jquery.fancybox.pack.js',
            'admin/index.js'
        ], 'public/js/admin'
    );

    mix.version(
        [
            'css/frontend/all.css',
            'js/frontend/all.js',
            'css/admin/all.css',
            'js/admin/all.js',
        ]
    ).browserSync({
        proxy: 'local.radar.com.ua',
        notify: false
    });

    var Task = elixir.Task;
    new Task('blade', function() {
        browserSync.reload();
    }).watch('resources/views/**/*.blade.php');

});


//Уменьшить изображения интерфеса
gulp.task('compress', function() {
    gulp.src('public/frontend/images/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('public/frontend/images/'));
});

//Уменьшить изображения продуктов
gulp.task('compress-big', function() {
    gulp.src('public/images/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('public/images/'));
});

//Оптимизация css
gulp.task('csso', function () {
    return gulp.src('resources/assets/css/frontend/style.css')
        .pipe(csso())
        .pipe(gulp.dest('resources/assets/css'));
});

//Удалить неиспользуемые css правила
/*require('laravel-elixir-uncss');
elixir(function (mix) {
    mix.uncss(
        ([
            'resources/assets/css/frontend/font.css',
            'resources/assets/css/frontend/style.css'
        ]), {
            html: ['resources/views/frontend/!**!/!*.php']
        });
});*/