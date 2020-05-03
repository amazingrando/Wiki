const {
  src, dest, parallel, watch, series,
} = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const browsersync = require('browser-sync').create();
const del = require('del');
const eslint = require('gulp-eslint');
// const imagemin = require('gulp-imagemin');
// const newer = require('gulp-newer');
const sass = require('gulp-dart-sass');
const sassGlob = require('gulp-sass-glob');
const twig = require('gulp-twig');
const w3cjs = require('gulp-w3cjs');

function clean() {
  return del(['./build']);
}

function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: './build/',
    },
    port: 3000,
  });
  done();
}

function browserSyncReload(done) {
  browsersync.reload();
  done();
}

function html() {
  return src('src/twig/*.twig').pipe(twig()).pipe(dest('build/'));
}

function w3cjsCheck() {
  return src('build/**/*.html').pipe(w3cjs()).pipe(w3cjs.reporter());
}

function css() {
  return src('src/stylesheets/*.scss')
    .pipe(sassGlob())
    .pipe(sass().on('error', sass.logError))
    .pipe(
      autoprefixer({
        cascade: false,
      }),
    )
    .pipe(dest('build/stylesheets'))
    .pipe(browsersync.stream());
}

function scripts() {
  return src(['./src/scripts/**/*'])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError())
    .pipe(dest('build/js'));
}

function fonts() {
  return src('src/fonts/**').pipe(dest('build/fonts'));
}

function watchFiles() {
  watch('src/stylesheets/**/*.scss', css);
  watch('src/scripts/**/*.js', scripts);
  watch('src/twig/**/*.twig', series(html, browserSyncReload));
}

const build = series(clean, parallel(html, css, scripts, fonts));
const watch2 = parallel(watchFiles, browserSync);

exports.clean = clean;
exports.html = html;
exports.w3cjs = w3cjsCheck;
exports.css = css;
exports.scripts = scripts;
exports.build = build;
exports.watch2 = watch2;
exports.default = series(build, watch2);
