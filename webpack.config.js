var Encore = require('@symfony/webpack-encore');

Encore

// directory where all compiled assets will be stored
  .setOutputPath('web/build/')

  // what's the public path to this directory (relative to your project's document root dir)
  .setPublicPath('/build')

  // empty the outputPath dir before each build
  .cleanupOutputBeforeBuild()

  // // allow sass/scss files to be processed
  .enableSassLoader(function(options) {
    // options.includePaths = [...]
  }, {
    resolveUrlLoader: false
  })

  // allow legacy applications to use $/jQuery as a global variable
  .autoProvidejQuery({
    $: 'jquery',
    jQuery: 'jquery'
  })

  .createSharedEntry('vendor', ['jquery', 'bootstrap-sass', 'interactjs'])
  // .enableSourceMaps(!Encore.isProduction())
  .addEntry('app', [
    './src/Ramik/PdfLayoutGenBundle/Resources/public/js/interact.js',
    './src/Ramik/PdfLayoutGenBundle/Resources/public/sass/main.scss'
  ])


  //

// create hashed filenames (e.g. app.abc123.css)
//.enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();

