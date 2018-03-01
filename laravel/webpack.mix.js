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
console.log("NODE_ENV:" + process.env.NODE_ENV);

mix.webpackConfig({
  devServer: {
    host: "0.0.0.0",
    port: 8080,
    overlay: true,
    watchContentBase: true,
    contentBase: [
      path.join(__dirname, "public"),
      path.join(__dirname, "resources")
    ]
  },
  watchOptions: {
    poll: 2000,
    ignored: /node_modules/
  }
});

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
  

switch (process.env.NODE_ENV) {
  case "development":
    console.log("build for development");
    mix.sourceMaps();
    break;
  case "staging":
    console.log("build for staging");
    mix.setResourceRoot("/nursery/");
    mix.sourceMaps();
    break;
  case "production":
    console.log("build for production");
    mix.setResourceRoot("/nursery/");
    mix.version();
    break;
}