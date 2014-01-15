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
    bootstrap: [
        './public/assets/css/less/master.less'
        ],
    admin : [
        './public/assets/css/public.css'
        ,'./public/assets/css/wysihtml5/prettify.css'
        ,'./public/assets/css/wysihtml5/bootstrap-wysihtml5.css'
        ,'./public/assets/css/datatables-bootstrap.css'
        ,'./public/assets/css/colorbox.css'
        ]
};

gulp.task('fetch-cdn', function() {
    return gulp.src(sources.cdn)
               .pipe(gulp.dest('./public/assets/js'));
});

gulp.task('less', function() {
    return gulp.src(['./public/assets/css/less/master.less'])
        .pipe(less({ paths: ['./vendor/twbs/bootstrap/less'] }))
        .pipe(rename('public.css'))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('admin-css', ['less'], function() {
    return gulp.src(sources.admin)
        .pipe(concat('admin.css'))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('front-scripts', function() {
    gulp.src('./public/assets/js/public.js')
        .pipe(rename('public.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'))
        .pipe(uglify())
        .pipe(rename('public.min.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'));

    return gulp.src('./vendor/twbs/bootstrap/dist/js/bootstrap.js')
        .pipe(gulp.dest('./public/assets/compiled/js'));
});

gulp.task('public', function() {
    return gulp.src(['./vendor/twbs/bootstrap/fonts/*'])
        .pipe(gulp.dest('./public/assets/compiled/fonts'));
});

gulp.task('dev-setup', function() {
    return gulp.src(['./bin/pre-commit', './bin/config-pre-commit'])
        .pipe(gulp.dest('./.git/hooks'));
});

gulp.task('default',  function() {

    gulp.run('less');
    gulp.run('public');
    gulp.run('front-scripts');
    gulp.run('admin-css');

    /*
    gulp.watch(['./public/assets/css/less/*'], function(e) {
        gulp.run('less-styles');
    });
    */
});
