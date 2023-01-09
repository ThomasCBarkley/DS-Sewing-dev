const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
const del = require('del');
const cleanCSS = require('gulp-clean-css');
const sass = require('gulp-sass');
const gulpif = require('gulp-if');
const gcmq = require('gulp-group-css-media-queries');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const babel = require('gulp-babel');
const addsrc = require('gulp-add-src');

const isDev = (process.argv.indexOf('--dev') !== -1);
const isProd = !isDev;

const jsFiles = [
    './node_modules/jquery/dist/jquery.js',
    // Changed method setDimension in slick.js
    './src/js/lightgallery.js',
    './src/js/slick.js',
];

const mainJs = ['./src/js/main.js'];



function clear(){
    return del('assets/css/*')
}
function styles(){
    return gulp.src('./src/scss/main.scss',{allowEmpty:true})
        .pipe(sass.sync().on('error',sass.logError))
        .pipe(gulpif(isProd,gcmq()))
        .pipe(autoprefixer({
            cascade: false,
        }))
        .pipe(gulpif(isProd,cleanCSS({
            level: "1"
        })))
        .pipe(gulp.dest('./assets/css/'))

}
function scripts() {
    return gulp.src(mainJs)
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(addsrc.prepend(jsFiles))
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'))
}

function watch(){
    gulp.watch('./src/scss/**/*.scss',styles);
    gulp.watch('./src/js/*.js', scripts);
}
let build = gulp.series(clear,
    gulp.parallel(styles, scripts)
);

gulp.task('build', build);
gulp.task('watch',gulp.series(build,watch));