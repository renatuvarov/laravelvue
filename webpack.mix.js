const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue({ version: 2 })
    .sass('resources/css/app.scss', 'public/css');
