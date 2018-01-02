// The instructions for this Gulp file can be found in the README.md file in this directory




// START Editing Project Variables.
// Project related.

// Style related.
var srcPrimaryStyle			= '../styles/*.scss', // Path to main .scss file.
		srcWorkingStyles		= '../styles/*/*.scss', // Path to work folders
		styleDestination		= '../styles/'; // Path to place the compiled CSS file.

// JS related
var jsFiles							= '../js/scripts/*.js', // location of working javascript files
		jsDest							= '../js'; // Javascript file destination


'use strict';
var gulp						= require('gulp');

// CSS related plugins
var sass						= require('gulp-sass'); // The all important SASS
var autoprefixer		= require('gulp-autoprefixer'); // Automatically adds prefixes for backwards compatibility

// JS related plugins.
var concat				= require('gulp-concat'); // Concatenates JS files
var uglify				= require('gulp-uglify'); // Minifies JS files
var browserify		= require('gulp-browserify');
var jshint				= require('gulp-jshint');

// Utility related plugins.
var lineec				= require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var sourcemaps		= require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss)
var plumber			 = require('gulp-plumber');
var notify				= require('gulp-notify'); // Sends message notification to you
	// check requirements for notify to work: https://www.npmjs.com/package/gulp-notify
	// Works out of the box on OS X and Windows 8 or higher



// Sets the default Gulp task
gulp.task('default',['sass']);


// create the error message
var onError = function (err) {
	notify({
			 title: 'Gulp Task Error',
			 message: 'Check the console.'
	 }).write(err);
	 console.log(err.toString());
	 this.emit('end');
}



// Primary gulp build, used for development
// Use `prodSASS` for live dev

gulp.task('sass', function () {
	return gulp
		// Find the main SCSS files
		.src( srcPrimaryStyle )

		// Activate the error message if it doesn't compile
		.pipe(plumber({ errorHandle: onError }))
		.pipe(sass())
		.on('error', onError)

		// Errors and sourcempas
		.pipe( sourcemaps.init() )
		.pipe( sass( {
			errLogToConsole: true,
			precision: 10
		} ) )
		.on('error', console.error.bind(console))
		.pipe( sourcemaps.write( { includeContent: false } ) )
		.pipe( sourcemaps.init( { loadMaps: true } ) )

		// Autoprefix
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))

		// Write sourcemaps
		.pipe( sourcemaps.write ( styleDestination ) )

		// Consistent Line Endings for non UNIX systems.
		.pipe( lineec() )

		// Final output
		.pipe(gulp.dest( styleDestination ))

});


// Watches the files in the 'styles' directories for changes in .scss files
// Runs the gulp.task(sass)

gulp.task('sassWatch', function () {
	gulp.watch([
		srcPrimaryStyle,
		srcWorkingStyles
	], ['sass']);
});



// Create a production SASS compile, compressed for production

gulp.task('prodSASS', function () {
	return gulp
		// Find the SCSS file
		.src( srcPrimaryStyle )

		// Activate the error message if it doesn't compile
		.pipe(plumber({ errorHandle: onError }))
		.pipe(sass())
		.on('error', onError)

		// Compress
		.pipe(sass(
			{outputStyle: 'compressed'}
		).on('error', sass.logError))

		// Autoprefix
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))

		.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.

		// Final output
		.pipe(gulp.dest( styleDestination ))
});





// compile javascript files

gulp.task('scripts', function() {
	return gulp.src(jsFiles)

		// Errors and sourcempas
		.pipe( sourcemaps.init() )
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest(jsDest))

		.pipe(uglify())
		.on('error', console.error.bind(console))
		.pipe( sourcemaps.write( { includeContent: false } ) )
		.pipe( sourcemaps.init( { loadMaps: true } ) )

		// Write sourcemaps
		.pipe( sourcemaps.write ( jsDest ) )

		.pipe(gulp.dest(jsDest));
});


gulp.task('scriptsWatch', function () {
	gulp.watch([
		jsFiles
	], ['scripts']);
});


// compile javascript files for production, compressed for production

gulp.task('prodScripts', function() {
	return gulp.src(jsFiles)
		.pipe(concat('scripts.js'))
		.pipe(gulp.dest(jsDest))
		.pipe(uglify())
		.pipe(gulp.dest(jsDest));

});


// #todo
// add compile error messages to JS compile



// #todo
// Create reuseable pips for things used multiple times, like errors
