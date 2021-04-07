const gulp = require('gulp');
const images = require('./gulp/images');
const scripts = require('./gulp/scripts');
const styles = require('./gulp/styles');
const watch = require('./gulp/watch');

module.exports = {
	svgs: images.svgs,

	'images:bitmap': images.bitmap,
	'images:svg': images.svg,
	images: images.all,

	'styles:blocks': styles.blocks,
	'styles:global': styles.global,
	styles: styles.all,

	'js:main': scripts.main,
	'js:blocks': scripts.blocks,
	js: scripts.all,

	watch,
	default: watch,
	build: gulp.parallel(styles.all, scripts.all, images.all),
}
