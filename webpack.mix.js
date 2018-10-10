let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// mix
//   // ビルドしたsassをそれぞれ開発側buildディレクトリへ出力
//   .sass('resources/assets/sass/test1.scss', '../resources/assets/build/css/')
//   .sass('resources/assets/sass/test2.scss', '../resources/assets/build/css/')
//   // buildディレクトリに出力したcssファイルを、app.cssというファイルに１つにまとめてpublicディレクトリへ出力する
//   .styles(
//     [
//       'resources/assets/build/css/test1.css',
//       'resources/assets/build/css/test2.css'
//     ],
//     'public/css/app.css'
//   )
//   // app.jsというファイルに１つにまとめてpublicディレクトリへ出力する
//   .js(
//     [
//       'resources/assets/js/test1.js',
//       'resources/assets/js/test2.js'
//     ],
//     'public/js/app.js'
//   );