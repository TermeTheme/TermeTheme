var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var autoprefixer = require('gulp-autoprefixer');
// var minifyCss = require('gulp-minify-css');
var concat = require('gulp-concat');

// var uglify = require('gulp-uglify');
// var rename = require("gulp-rename");

gulp.task('sass', function(){
	return sass('assets/scss/*.scss')
    .on('error', sass.logError)
	.pipe(autoprefixer({
					browsers: ['last 20 versions'],
					cascade: true
	}))
	//.pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('assets/css/seperated'))
	.pipe(concat('terme.css'))
    .pipe(gulp.dest('assets/css'));
});

gulp.task('rtlsass', function(){
	return sass('assets/scss/rtl/*.scss')
    .on('error', sass.logError)
	.pipe(autoprefixer({
					browsers: ['last 3 versions'],
					cascade: false
	}))
	//.pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('assets/css/seperated/rtl'))
	.pipe(concat('rtl.css'))
    .pipe(gulp.dest('.'));
});


gulp.task('compress', function() {
	  return gulp.src('assets/js/**/*.js')
	    .pipe(uglify())
	     .pipe(rename(function (path) {
//		    path.dirname += "/ciao";
		    path.basename += ".min";
		    path.extname = ".js"
		  }))
	    .pipe(gulp.dest('assets/js'));
});

gulp.task('run', function(){
	gulp.watch('assets/scss/*.scss', ['sass']);
	gulp.watch('assets/scss/rtl/*.scss', ['rtlsass']);
	//gulp.watch('assets/scss/**/*.scss', ['merge']);
	// gulp.watch('assets/js/**/*.js', ['compress']);
	// gulp.watch("./*.html").on('change', browserSync.reload);
})
