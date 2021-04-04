const browserify = require('browserify');
const babelify = require('babelify');
const gulp = require('gulp');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer');
const uglify = require('gulp-uglify');
const sm = require('gulp-sourcemaps');
const log = require('gulplog');
const glob = require('glob');
const es = require('event-stream');
const rename = require('gulp-rename');

function main(done) {

	return glob('./src/js/*.js', (err, files) => {
		if (err) done(err);

		const tasks = files.map(function (entry) {
			return browserify({
				entries: [entry],
				transform: [babelify.configure({ presets: ['@babel/preset-env'] })],
				debug: true
			})
				.bundle()
				.pipe(source(entry))
				.pipe(rename({
					dirname: "/",
					extname: '.min.js'
				}))
				.pipe(buffer())
				.pipe(sm.init({ loadMaps: true }))
				.pipe(uglify())
				.on('error', log.error)
				.pipe(sm.write('.'))
				.pipe(gulp.dest('./js/'));
		});

		es.merge(tasks).on('end', done);
	})
}

function blocks(done) {
	return glob('./src/js/blocks/*.js', (err, files) => {
		if (err) done(err);

		const tasks = files.map(function (entry) {
			return browserify({
				entries: [entry],
				transform: [babelify.configure({ presets: ['@babel/preset-env'] })],
				debug: true
			})
				.bundle()
				.pipe(source(entry))
				.pipe(rename({
					dirname: "/",
					extname: '.min.js'
				}))
				.pipe(buffer())
				.pipe(sm.init({ loadMaps: true }))
				.pipe(uglify())
				.on('error', log.error)
				.pipe(sm.write('.'))
				.pipe(gulp.dest('./js/blocks/'));
		});

		es.merge(tasks).on('end', done);
	})
}


module.exports = {
	main,
	blocks,
	all: gulp.parallel(main, blocks)
}
