// dependencies
var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-ruby-sass');
var autoprefixer = require('gulp-autoprefixer');
var growl = require('gulp-notify-growl');

var growlNotifier = growl();

// directories
var sassDir = 'app/assets/zurb-foundation/scss';
var targetCssDir = 'public/styles';

gulp.task('css', function () {

	return gulp.src(sassDir + '/main.scss')
		.pipe(sass({style : 'expanded'}))
		.on('error', function() {
			 gutil.log(arguments);
		})
		.pipe(autoprefixer('last 10 versions'))
		.pipe(gulp.dest(targetCssDir))
		.pipe(growlNotifier({ title: 'CSS', message: 'Generated OK'}));
});

gulp.task('watch', function () {	
	gulp.watch(sassDir + '/**/*.scss', ['css']);
});


gulp.task('default', ['css', 'watch']);