let mix = require('laravel-mix');
const path = require('path');


mix
.js('src/js/app.js', 'dist')
.sass('src/scss/main.scss', 'css')
.webpackConfig({
    resolve: {
        alias: {
            '~': path.resolve(__dirname, 'node_modules')
        }
    },
    devtool: 'inline-source-map'
})
.setResourceRoot( '/app/themes/joblisting/dist' )
.setPublicPath('dist')
.vue()
.sourceMaps();
