var gulp = require('gulp'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps');


gulp.task('style-frontend', function() {
    gulp.src('resources/assets/css/frontend/*.css')
        // .pipe(sourcemaps.init())
            .pipe(concat('all.css'))
        // .pipe(sourcemaps.write('public/build/css/frontend'))
        .pipe(gulp.dest('public/build/css/frontend'));
});