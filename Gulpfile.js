var gulp = require('gulp');
var uglify = require('gulp-uglify');
var es = require('event-stream');
var less = require('gulp-less');
var concat = require('gulp-concat');
var rename = require('gulp-rename');

gulp.task('twbs-scripts', function() {
    return gulp.src([
           './vendor/twbs/bootstrap/js/transition.js'
           ,'./vendor/twbs/bootstrap/js/alert.js'
           ,'./vendor/twbs/bootstrap/js/button.js'
           ,'./vendor/twbs/bootstrap/js/carousel.js'
           ,'./vendor/twbs/bootstrap/js/collapse.js'
           ,'./vendor/twbs/bootstrap/js/dropdown.js'
           ,'./vendor/twbs/bootstrap/js/modal.js'
           ,'./vendor/twbs/bootstrap/js/tooltip.js'
           ,'./vendor/twbs/bootstrap/js/popover.js'
           ,'./vendor/twbs/bootstrap/js/scrollspy.js'
           ,'./vendor/twbs/bootstrap/js/tab.js'
           ,'./vendor/twbs/bootstrap/js/affix.js'
        ])
        .pipe(concat('bootstrap.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'))
        .pipe(rename('bootstrap.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/compiled/js'));
});

gulp.task('app-scripts', function() {
    return gulp.src([
        './public/assets/js/wysihtml5/wysihtml5-0.3*.js'
        ,'./public/assets/js/wysihtml5/bootstrap-wysihtml5.js'
        ,'http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js'
        ,'./public/assets/js/datatables-bootstrap.js'
        ,'./public/assets/js/datatables.fnReloadAjax.js'
        ,'jquery.colorbox.js'
        ,'prettify.js'
        ])
        .pipe(concat('admin-scripts.js'))
        .pipe(gulp.dest('./public/assets/compiled/js'))
        .pipe(rename('admin-scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/compiled/js'));
});

gulp.task('styles', function() {
    return es.concat(
        gulp.src('./public/assets/css/master.less')
            .pipe(less({
                paths: ['./vendor/twbs/bootstrap/less']
            }))
            .pipe(gulp.dest('./public/assets/gulp/css'))
        ,gulp.src('./public/assets/css/page.css')
            .pipe(gulp.dest('./public/assets/css'))
        );
});

gulp.task('default', ['twbs-scripts', 'styles', 'app-scripts'], function() {

    gulp.watch('./public/assets/master.less', function(e) {
        gulp.run('styles');
    });

});
