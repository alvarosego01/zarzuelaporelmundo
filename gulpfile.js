
'use strict';

const browserSync = require('browser-sync').create(),
  reload = browserSync.reload,
  gulp = require('gulp'),
  autoprefixer = require('gulp-autoprefixer'),
  sass = require('gulp-dart-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  csso = require('gulp-csso'),
  pump = require('pump'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  plumber = require('gulp-plumber'),
  scp = require('gulp-scp2'),
  watch = require('gulp-watch');
var i;
// browser-sync task for starting the server.

gulp.task('browserSync-Local', () => {
  //watch files

  browserSync.init({
    logPrefix: "zarzuela",
    open: false,
    // http: true,
    // online: true,
    notify: true,
    injectChanges: true,
    proxy: "localhost/zarzuela/",
    files: ['assets/**'],

  });

});

gulp.task('browserSync-Server', () => {
  //watch file

  browserSync.init({
    logPrefix: "Zarzuela",
    open: true,
    https: true,
    online: true,
    notify: true,
    injectChanges: true,
    proxy: "https://zarzuelaporelmundo.org/",

  serveStatic: ["assets/css"],
    files: "assets/css/zarzuelaEstilos.css",
    snippetOptions: {
        rule: {
            match: /<\/head>/i,
            fn: function (snippet, match) {
                return '<link rel="stylesheet" type="text/css" href="/zarzuelaEstilos.css"/>' + snippet + match;
            }
        }
    }

});
});

gulp.task('sass', () => {
  return gulp.src('./dev/sass/*.sass')
    .pipe(watch('./dev/sass/*.sass'))
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer({
      browsers: ['last 10 versions']
    }))
    .pipe(csso())
    .pipe(gulp.dest('./assets/css'))
    .pipe(browserSync.stream());
});

gulp.task('sassGeneral', () => {
  return gulp.src('./dev/sass/*.sass')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer({
      browsers: ['last 10 versions']
    }))
    .pipe(csso())
    .pipe(gulp.dest('./assets/css'))
    .pipe(browserSync.stream());
});

gulp.task('js', () => {
  return gulp.src('./dev/js/*.js')
    .pipe(watch('./dev/js/*.js'))
    .pipe(plumber(
      //{errorHandler: errorScripts};
      function (error) {
        console.log(error);
        this.emit('end');
      }
    ))
    // .pipe(uglify())
    .pipe(gulp.dest('./assets/js/final/'))
});

gulp.task('jsGeneral', (cb) => {
  pump([
    gulp.src('./dev/js/*.js'),
    concat('funciones.js'),
    // uglify(),
    gulp.dest('./assets/js/final/')
  ],
    cb
  );
});

gulp.task('SassJs', gulp.series(gulp.parallel('sass', 'jsGeneral')));


gulp.task('watch', () => {

  gulp.watch("./dev/sass/*.sass", gulp.series('sass'));
  gulp.watch("./dev/js/*.js", gulp.series('js'));

});




gulp.task('online', gulp.series(gulp.parallel('SassJs', 'watch', 'browserSync-Server')));


gulp.task('local', gulp.series(gulp.parallel('SassJs', 'watch', 'browserSync-Local')));



