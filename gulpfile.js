'use strict';

const gulp 			= require('gulp');
const sass 			= require('gulp-sass');
const rename 		= require('gulp-rename');
const postcss 		= require('gulp-postcss');
const jshint 		= require('gulp-jshint');
const concat 		= require('gulp-concat');
const uglify 		= require('gulp-uglify');
const autoprefixer 	= require('autoprefixer');
const cssnano 		= require('cssnano');
const babel         = require('gulp-babel');
const plumber       = require("gulp-plumber")
const sourcemaps 	= require('gulp-sourcemaps');
const browserSync 	= require('browser-sync').create();

const themePath = '';

const paths = {
	styles: {
		src: themePath + 'assets-gulp/sass/**/*.scss',
		srcBackend: themePath + 'assets-gulp/sass-backend/**/*.scss',
		dest: themePath + 'public/css'
	},
	scripts: {
		src: themePath + 'assets-gulp/js/*.js',
		dest: themePath + 'public/js'
	},
	phpFiles: themePath + '**/*.php'
};

function style() {
	return (
		gulp
			.src(paths.styles.src)
			.pipe(sass())
			.on('error', sass.logError)
			.pipe(postcss([autoprefixer()]))
			.pipe(gulp.dest(paths.styles.dest))

			// Add browsersync stream pipe after compilation
			.pipe(browserSync.stream())

			.pipe(rename('style.min.css'))
			.pipe(sourcemaps.init())
			.pipe(postcss([autoprefixer(), cssnano()]))
			.pipe(sourcemaps.write('/source-maps'))
			.pipe(gulp.dest(paths.styles.dest))
			.pipe(browserSync.stream())
	);
}
exports.style = style;

function styleBackend() {
	return (
		gulp
			.src(paths.styles.srcBackend)
			.pipe(sass())
			.on('error', sass.logError)
			.pipe(postcss([autoprefixer()]))
			.pipe(gulp.dest(paths.styles.dest))

			// Add browsersync stream pipe after compilation
			.pipe(browserSync.stream())

			.pipe(rename('backend.min.css'))
			.pipe(sourcemaps.init())
			.pipe(postcss([autoprefixer(), cssnano()]))
			.pipe(sourcemaps.write('/source-maps-backend'))
			.pipe(gulp.dest(paths.styles.dest))
			.pipe(browserSync.stream())
	);
}
exports.styleBackend = styleBackend;

function js() {
	return (
		gulp
			
			.src(paths.scripts.src)
			.pipe(plumber())
				// Transpile the JS code using Babel's preset-env.
				.pipe(
					babel({
					presets: [
						[
						"@babel/env",
						{
							modules: false
						}
						]
					]
					})
				)
			.pipe(jshint())
			.pipe(jshint.reporter('default'))
			.pipe(concat('scripts.js'))
			.pipe(gulp.dest(paths.scripts.dest))
			.pipe(rename('scripts.min.js'))
			.pipe(uglify())
			.pipe(gulp.dest(paths.scripts.dest))
	);
}
exports.js = js;

function jsWatch(done) {
	js();
	browserSync.reload();
	done();
}
exports.jsWatch = jsWatch;

function watch() {
	style();
	styleBackend();
	js();
	gulp.watch(paths.styles.src, style);
	gulp.watch(paths.styles.srcBackend, styleBackend);
	gulp.watch(paths.scripts.src, js);
}
exports.watch = watch;

function serve() {
	style();
	styleBackend();
	js();

	browserSync.init({
		proxy: 'http://localhost/brighter-clone',
		browser: 'chrome'
	});

	gulp.watch(paths.styles.src, style);
	gulp.watch(paths.styles.srcBackend, styleBackend);
	gulp.watch(paths.scripts.src, jsWatch);
	gulp.watch(paths.phpFiles).on('change', browserSync.reload);
}
exports.serve = serve;

exports.default = serve;
