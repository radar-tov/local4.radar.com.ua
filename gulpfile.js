/*var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.styles(
        [
            'frontend/style.css',
            'frontend/additional.css',
            'frontend/jquery.fancybox.css',
            'frontend/font.css',
        ]
    );*/


    /*mix.scripts(
        [
            'frontend/jquery-2.1.3.min.js',
            'frontend/jquery.mousewheel.pack.js',
            'frontend/jquery.fancybox.pack.js',
            'frontend/index.js'
        ]
    );*/

    /*mix.version(
        [
            'css/all.css',
            'js/all.js'
        ]
    );

});*/

/*
var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    browserSync = require('browser-sync'),
    connectPHP  = require('gulp-connect-php'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglifyjs'),
    cssnano     = require('gulp-cssnano'),
    rename      = require('gulp-rename');


gulp.task('sass', function () {
    return gulp.src('resources/assets/sass/!**!/!*.sass')
        .pipe(sass())
        .pipe(gulp.dest('public/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('css-libs', ['sass'], function () {
    return gulp.src('public/css/frontend/all.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('public/css/frontend'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('scripts', function () {
    return gulp.src([
        'resources/assets/js/frontend/jquery-2.1.3.min.js',
        'resources/assets/js/frontend/jquery.fancybox.pack.js',
        'resources/assets/js/frontend/jquery.mousewheel.pack.js',
        'resources/assets/js/frontend/index.js',
    ])
    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/frontend'));
});

gulp.task('php', function(){
    connectPHP.server({
        base: 'public',
        keepalive:true,
        hostname: 'localhost',
        port:8080,
        open: false
    });
});

gulp.task('browser-sync', function () {
    browserSync({
        proxy:'127.0.0.1',
        port: 8080,
        open: false
    });
});

gulp.task('watch', ['browser-sync', 'php', 'css-libs', 'scripts'], function () {
    gulp.watch('resources/assets/css/!**!/!*.css', ['sass']);
    gulp.watch('resources/assets/sass/!**!/!*.sass', ['sass']);
    gulp.watch('resources/assets/js/frontend/!*.js', browserSync.reload );
});*/
