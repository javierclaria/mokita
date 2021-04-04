const gulp = require('gulp');
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const prefix = require('gulp-autoprefixer');
const nano = require('gulp-cssnano');
const sm = require('gulp-sourcemaps');
const log = require('gulplog');

function global() {
	return gulp
		.src('./src/scss/*.scss')
		.pipe(sm.init())
		.pipe(
			sass({
				includePaths: ['node_modules/'],
			})
		)
		.pipe(prefix())
		.pipe(nano())
		.on('error', log.error)
		.pipe(rename({ suffix: '.min' }))
		.pipe(sm.write('.'))
		.pipe(gulp.dest('./css/'));
};

function blocks() {
	return gulp
		.src('./src/scss/blocks/*.scss')
		.pipe(sm.init())
		.pipe(
			sass({
				includePaths: ['node_modules/'],
			})
		)
		.pipe(prefix())
		.pipe(nano())
		.on('error', log.error)
		.pipe(rename({ suffix: '.min' }))
		.pipe(sm.write('.'))
		.pipe(gulp.dest('./css/blocks/'));
};

module.exports = {
	global,
	blocks,
	all: gulp.parallel(global, blocks)
}
