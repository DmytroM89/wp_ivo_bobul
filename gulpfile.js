var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    rename       = require('gulp-rename'),
    minifyCSS    = require('gulp-minify-css'),
    postcss      = require('gulp-postcss'),
    sourcemaps   = require('gulp-sourcemaps'),
    autoprefixer = require('autoprefixer'),
    svgstore     = require("gulp-svgstore"),
    spritesmith  = require('gulp.spritesmith'),
    uglify       = require('gulp-uglify'),
    pump         = require('pump'),
    livereload   = require('gulp-livereload');

gulp.task('css', function() {
    gulp.src('./assets/css/style.sass')
        .pipe(sass())
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer({ browsers: ['> 0%'] }) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(minifyCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('./assets/css/'));
});
gulp.task('js', function (cb) {
    pump([
        gulp.src('./assets/js/scripts.js')
            .pipe(rename('scripts.min.js')),
        uglify(),
        gulp.dest('./assets/js/')
    ], cb);
});
gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./assets/css/*.sass', ['css']).on('change', livereload.changed);
    gulp.watch('./assets/js/scripts.js', ['js']).on('change', livereload.changed);
});

gulp.task("svg", function () {
  return gulp
    .src("./assets/img/svg/*.svg", { base: "./assets/img/sprites" })
    .pipe(svgstore())
    .pipe(gulp.dest("./assets/img/"));
});
gulp.task('sprite', function() {
  var spriteData =
    gulp.src('./assets/img/png/*.*')
      .pipe(spritesmith({
        imgName: 'sprite.png',
        cssName: '_sprite.sass',
        cssFormat: 'sass',
        algorithm: 'binary-tree',
        imgPath: '../img/sprite.png'
      }));
  spriteData.img.pipe(gulp.dest('./assets/img'));
  spriteData.css.pipe(gulp.dest('./assets/css'));
});