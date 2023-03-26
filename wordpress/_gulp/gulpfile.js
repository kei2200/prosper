const gulp = require('gulp');//gulp本体
const sass = require('gulp-dart-sass');//Dart Sass はSass公式が推奨 @use構文などが使える
const plumber = require('gulp-plumber'); // エラーが発生しても強制終了させない
const notify = require('gulp-notify'); // エラー発生時のアラート出力
const browserSync = require('browser-sync'); //ブラウザリロード
const postcss = require('gulp-postcss'); //メディアクエリをまとめる
const mqpacker = require('css-mqpacker'); //メディアクエリをまとめる
const autoprefixer = require('gulp-autoprefixer'); //ベンダープレフィックス
const htmlhint = require('gulp-htmlhint');//htmlエラー検出

// 入出力するフォルダを指定 プロジェクトごとに設定。
const srcBase = '../_src';
const distBase = '../_htdocs/';
const serverBase = '../_htdocs/';

const srcPath = {
  'html': srcBase + '/**/*.html',
  'scss': srcBase + '/**/*.scss',
  'js': srcBase + '/**/*.js'
};

const distPath = {
  'html': distBase + '/',
  'css': distBase + '/',
  'js': distBase + '/'
};

// sass設定
const TARGET_BROWSERS = [
  'last 2 versions',//各ブラウザの2世代前までのバージョンを担保
  //IE11を担保 'ie >= 11'
];

const cssSass = () => {
  return gulp.src(srcPath.scss, {
    sourcemaps: true
  })
  .pipe(
    //エラーが出ても処理を止めない
    plumber({
      errorHandler: notify.onError('Compile Error:<%= error.message %>')
    }))
  .pipe(sass({ outputStyle: 'expanded' })) //指定できるキー expanded compressed
  .pipe(postcss([mqpacker()]))
  .pipe(autoprefixer(TARGET_BROWSERS))
  .pipe(gulp.dest(distPath.css, { sourcemaps: './' })) //コンパイル先
  .pipe(browserSync.stream())
  .pipe(notify({
    message: 'Compile Completed',
    onLast: true
  }))
}

/**
 * html
 */
const html = () => {
  return gulp.src(srcPath.html)
    .pipe(gulp.dest(distPath.html))
    .pipe(htmlhint(
      {
        "attr-lowercase": ["viewBox"],
        "doctype-first": false,
        "src-not-empty": false,
        "tagname-lowercase": ["linearGradient","clipPath"]
      }
    ))
  .pipe(htmlhint.reporter())
}

/**
 * jsを指定階層に出力
 */
const js = () => {
  return gulp.src(srcPath.js)
  .pipe(gulp.dest(distPath.js))
}

/**
 * ローカルサーバー立ち上げ
 */
const browserSyncFunc = () => {
  browserSync.init(browserSyncOption);
}

const browserSyncOption = {
  server: serverBase
}

/**
 * リロード
 */
const browserSyncReload = (done) => {
  browserSync.reload();
  done();
}


/**
 *
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
  gulp.watch(srcPath.scss, gulp.series(cssSass, browserSyncReload)),
  gulp.watch(srcPath.html, gulp.series(html, browserSyncReload)),
  gulp.watch(srcPath.js, gulp.series(js, browserSyncReload))
}

/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 */
exports.default = gulp.series(
  gulp.parallel(html, cssSass, js),
  gulp.parallel(watchFiles, browserSyncFunc),
);
