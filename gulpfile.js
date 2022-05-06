// gulpfile.js
const {
     src,
     dest,
     watch,
     series,
     parallel,
     lastRun

} = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sassGlob = require("gulp-sass-glob-use-forward");
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssdeclsort = require('css-declaration-sorter');
const gcmq = require('gulp-group-css-media-queries');
const mode = require('gulp-mode')();
const browserSync = require('browser-sync');
const crypto = require('crypto');
const hash = crypto.randomBytes(8).toString('hex');
const replace = require("gulp-replace");
const tinypng = require("gulp-tinypng-extended");
const webp = require("gulp-webp");
const webpackStream = require("webpack-stream");
const webpack = require("webpack");

const webpackConfig = require("./webpack.config");

const bundleJs = (done) => {
     webpackStream(webpackConfig, webpack)
          .on('error', function (e) {
               console.error(e);
               this.emit('end');
          })
          .pipe(dest("dist/js"))
     done();
};


const compileSass = (done) => {
     const postcssPlugins = [
          autoprefixer({
               grid: "autoplace",
               cascade: false,
          }),
          cssdeclsort({
               order: 'alphabetical'
          })
     ];
     src('./src/scss/**/*.scss', {
               sourcemaps: true
          })
          .pipe(
               plumber({
                    errorHandler: notify.onError('Error: <%= error.message %>')
               })
          )
          .pipe(sass({
               outputStyle: 'expanded'
          }))
          .pipe(sassGlob())
          .pipe(notify({
               message: 'Sassをコンパイルしました！',
               onLast: true
          }))
          .pipe(postcss(postcssPlugins))
          .pipe(mode.production(gcmq()))
          .pipe(dest('./dist/css', {
               sourcemaps: './sourcemaps'
          }));
     done();
};


const buildServer = (done) => {
     browserSync.init({
          port: 8080,
          // 静的サイト
          // server: {
          //      baseDir: './'
          // },
          // 動的サイト
          files: ["./**/*.php"],
          //ローカルで動かしているURLを入れる
          proxy: "http://originalthema.local/",
          open: true,
          watchOptions: {
               debounceDelay: 1000,
          },
     });
     done();
};

const browserReload = done => {
     browserSync.reload();
     done();
};



const tinyPng = done => {
     src("./src/img/**/*.{png,jpg,jpeg}")
          .pipe(plumber())
          .pipe(tinypng({
               key: "ByT6WV8wDJPLK3mYLqdZwx6tyd9ZVtN7",
               sigFile: "./src/img/.tinypng-sigs",
               log: true,
               summarise: true,
               sameDest: true,
               parallel: 10,
          }))
          .pipe(dest("./src/img"))
          .on("end", done);
};


const copyImages = done => {
     src(["./src/img/**/*"])
          .pipe(dest("./dist/img"))
          .on("end", done);
};

const generateWebp = done => {
     src("./dist/img/**/*.{png,jpg,jpeg}", {
               since: lastRun(generateWebp)
          })
          .pipe(webp())
          .pipe(dest("dist/img"));
     done();
};

const cacheBusting = done => {
     src("./dist/**/*.php")
          // src("./")
          .pipe(replace(/\.(js|css)\?ver/g, ".$1?ver=" + hash))
          .pipe(replace(/\.(webp|jpg|jpeg|png|svg|gif)/g, ".$1?ver=" + hash))
          .pipe(dest("./dist"));
     done();
};



const watchFiles = () => {
     watch('./src/scss/**/*.scss', series(compileSass, browserReload))
     watch("./src/img/**/*", series(copyImages, generateWebp, browserReload))
     watch('./src/js/**/*.js', series(bundleJs, browserReload))
};


module.exports = {
     sass: compileSass,
     default: parallel(buildServer, watchFiles),
     bundle: bundleJs,
     tinypng: tinyPng,
     webp: generateWebp,
     image: series(tinyPng, generateWebp, copyImages),
     build: series(parallel(compileSass), tinyPng, copyImages, generateWebp, cacheBusting),
};

//この順番で画像圧縮しても良い
//  画像圧縮
// npx gulp tinypng

// ## webpの生成
// npx gulp webp