const images = require('./images');
const scripts = require('./scripts');
const styles = require('./styles');
const gulp = require('gulp');

module.exports = function watch() {
	gulp.watch('./src/(images|svg)/**/*', images.all);
	gulp.watch('./src/js/**/*.js', scripts.all);
	gulp.watch('./src/scss/**/*.scss', styles.all);
};
