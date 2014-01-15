var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var less = require('gulp-less');
var rename = require('gulp-rename');

var sources = {
    cdn : [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js'
        ,'http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js'
        ],
    less : [
        './public/assets/css/less/master.less'
        ]
};

gulp.task('fetch-cdn', function() {
    return gulp.src(sources.cdn)
               .pipe(gulp.dest('./public/assets/js'));
});

gulp.task('less', function() {
    return gulp.src([sources.less])
        .pipe(less({ paths: ['./vendor/twbs/bootstrap/less'] }))
        .pipe(rename('public.css'))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('dev-setup', function() {
    return gulp.src(['./bin/pre-commit', './bin/config-pre-commit'])
        .pipe(gulp.dest('./.git/hooks'));
});

gulp.task('default',  function() {
    gulp.run('less');
    gulp.run('admin-css');

    gulp.watch(['./public/assets/css/less/*'], function(e) {
        gulp.run('less');
    });
});
