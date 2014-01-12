var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var concat = require('gulp-rename');
var less = require('gulp-less');
var rename = require('gulp-rename');

gulp.task('twbs-scripts', function() {
    return gulp.src([
           './vendor/twbs/bootstrap/dist/js/bootstrap.js'
           ,'./vendor/twbs/bootstrap/dist/js/bootstrap.min.js'
        ])
        .pipe(gulp.dest('./public/assets/compiled/js'))
});

gulp.task('twbs-styles', function() {
    return gulp.src('./public/assets/css/less/master.less')
        .pipe(less({
            paths: ['./vendor/twbs/bootstrap/less']
        }))
        .pipe(rename('styles.css'))
        .pipe(gulp.dest('./public/assets/compiled/public/css'))
});

gulp.task('fetch-cdn', function() {
    return gulp.src([
        'https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js' 
        ,'http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js'
        ])
        .pipe(gulp.dest('./public/assets/compiled/js'));
});

gulp.task('admin-scripts', ['fetch-cdn'], function() {
    return gulp.src([
        './public/assets/js/wysihtml5/wysihtml5-0.3*.js'
        ,'./public/assets/js/wysihtml5/bootstrap-wysihtml5.js'
        ,'./public/assets/js/datatables-bootstrap.js'
        ,'./public/assets/js/datatables.fnReloadAjax.js'
        ,'jquery.colorbox.js'
        ,'prettify.js'
        ])
        .pipe(concat('admin-scripts.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'))
        .pipe(uglify())
        .pipe(rename('admin-scripts.min.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'));
});

gulp.task('front-end-scripts', function() {
    return gulp.src('./public/assets/js/public.js')
        .pipe(rename('public.js'))
        .pipe(gulp.dest('./public/assets/compiled/public/js'))
        .pipe(uglify())
        .pipe(rename('public.min.js'))
        .pipe(gulp.dest('./public/assets/compiled/public/js'));
});

gulp.task('public', ['fetch-cdn', 'twbs-scripts', 'twbs-styles'], function() {
    return gulp.src(['./vendor/twbs/bootstrap/fonts/*'])
        .pipe(gulp.dest('./public/assets/compiled/fonts'));
});

gulp.task('default',  function() {

    gulp.run('public');
    gulp.run('front-end-scripts');
    gulp.run('admin-scripts');

    gulp.watch('./public/assets/master.less', function(e) {
        gulp.run('twbs-styles');
    });
});

