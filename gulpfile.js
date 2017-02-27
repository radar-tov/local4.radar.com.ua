var elixir = require('laravel-elixir');

var gulp = require('gulp');
var imagemin = require('gulp-imagemin');
var csso = require('gulp-csso');
var browserSync = require("browser-sync");

//Наблюдение и минимизация файлов для frontend
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
            'frontend/jquery.fancybox.pack.js'
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

    var Task = elixir.Task;
    new Task('blade', function() {
        browserSync.reload();
    }).watch('resources/views/**/*.blade.php');

});


//Наблюдение и минимизация файлов для admin
/*elixir(function(mix) {

    mix.scripts(
        [
            'frontend/jquery-2.1.3.min.js',
            'frontend/jquery.mousewheel.pack.js',
            'frontend/jquery.fancybox.pack.js',
            'frontend/index.js'
        ], 'public/js/frontend'
    );

    mix.scripts(
        [
            'admin/jquery-2.1.3.min.js',
            'admin/jquery.mousewheel.pack.js',
            'admin/jquery.fancybox.pack.js',
            'admin/index.js'
        ], 'public/js/admin'
    );

    mix.version(
        [
            'css/admin/all.css',
            'js/admin/all.js'
        ]
    ).browserSync({
        proxy: 'local.radar.com.ua',
        notify: false
    });
});*/


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