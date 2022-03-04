const Encore = require('@symfony/webpack-encore')
const path = require('path')

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev')
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .enableVueLoader()
    .addAliases({
        '@': path.resolve('assets/js')
    })
    .addEntry('app', './assets/js/app.js')
    .splitEntryChunks()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .disableSingleRuntimeChunk()
    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })
    //.enableSassLoader()
    .enablePostCssLoader((options) => {
        options.postcssOptions = {
            config: './postcss.config.js'
        }
    })

    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]',
        pattern: /\.(png|jpg|jpeg)$/
    })

module.exports = Encore.getWebpackConfig()