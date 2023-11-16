const mix = require('laravel-mix');

mix
.js('resources/js/app.js', 'public/js')
.js('resources/js/script.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css')
.sass('resources/sass/style.scss', 'public/css')
.sass('resources/sass/tools/tools.scss', 'public/css')
.sass('resources/sass/diary/diary.scss', 'public/css')
.sourceMaps(true, 'source-map')
.webpackConfig({
    stats: {
        // children: true // Show errors
    }
});
