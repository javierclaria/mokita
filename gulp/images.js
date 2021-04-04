const gulp = require('gulp');
const imagemin = require('gulp-imagemin');

function bitmap() {
	return gulp
		.src([
			'./src/images/**/*.png',
			'./src/images/**/*.jpeg',
			'./src/images/**/*.jpg',
			'./src/images/**/*.gif'
		])
		.pipe(imagemin())
		.pipe(gulp.dest('./assets/images/'));
}

function svg() {
	return gulp
		.src('./src/svg/**/*.svg')
		.pipe(
			imagemin([
				imagemin.svgo({
					plugins: [{ removeViewBox: true }, { cleanupIDs: false }],
				}),
			])
		)
		.pipe(gulp.dest('./assets/svg/'));
}

module.exports = {
	bitmap,
	svg,
	all: gulp.parallel(bitmap, svg)
}
