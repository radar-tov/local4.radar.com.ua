var elixir = require('laravel-elixir');
var gulp = require('gulp');
var imagemin = require('gulp-imagemin');

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

gulp.task('compress', function() {
    gulp.src('public/frontend/images/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('public/frontend/images/'));
});

/*
gulp.task('compress-big', function() {
    gulp.src('public/images/!**!/!*')
        .pipe(imagemin())
        .pipe(gulp.dest('public/images/'));
});*/
