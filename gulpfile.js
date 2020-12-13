const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
const minify = require("gulp-minify");
const concat = require("gulp-concat");


gulp.task('styles', () => {
    return gulp.src('resources/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('vendor.css'))
        .pipe(gulp.dest('./public/css/'));
});

gulp.task('clean', () => {
    return del([
        'css/vendor.css',
    ]);
});

gulp.task('js', () => {
    return gulp.src('resources/js/**/*.js', { allowEmpty: true })
        .pipe(minify({noSource: true}))
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./public/js'))
});

gulp.task('watch', () => {
    gulp.watch('scss/**/*.scss', (done) => {
        gulp.series(['clean', 'styles'])(done);
    });
});

gulp.task('default', gulp.series(['clean', 'styles', 'js']));