var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    plumber = require('gulp-plumber');
    // replace = require('gulp-replace');
//    imageResize = require('gulp-image-resize');

// Scripts Task

gulp.task('scripts', function() {
  gulp.src(['./node_modules/jquery/dist/jquery.js',
            './node_modules/bootstrap/dist/js/bootstrap.js',
            './js/main.js'
    ])
    .pipe(plumber()) // prevents breaking and has to go first here
    .pipe(concat('sweetbridge.js'))
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./js/compiled'));

  gulp.src(['./node_modules/jquery/dist/jquery.js',
            './node_modules/bootstrap/dist/js/bootstrap.js',
            './js/main.js'
    ])
    .pipe(plumber()) // prevents breaking and has to go first here
    .pipe(concat('sweetbridge.js'))
    .pipe(gulp.dest('./js/compiled'));
});

gulp.task('sass', function () {
  return gulp.src('./sass/sweetbridge.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
    gulp.watch('./js/*.js', ['scripts']);
    gulp.watch('./sass/*.scss', ['sass']);
});

gulp.task('default', ['watch']);
