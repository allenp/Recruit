var gulp = require('gulp');
var uglify = require('gulp-uglify');

gulp.task('scripts', function() {
    return gulp.src(['./vendor/twbs/bootstrap/js/*.js', './public/assets/js/*.js'])
        .pipe(uglify())
        .pipe(gulp.dest('assets/compiled'));
});

gulp.task('styles', function() {
    return gulp.src('./public/assets/css/master.less')
        .pipe(less({
            paths: ['./vendor/twbs/bootstrap/less']
        }))
        .pipe(gulp.dest('./public/assets/css'));
});

gulp.task('default', function() {
    gulp.run('styles');
    gulp.run('scripts');

    gulp.watch('./public/assets/master.less', function(e) {
        gulp.run('styles');
    });
});

