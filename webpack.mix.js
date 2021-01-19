const mix = require('laravel-mix');

mix.config.fileLoaderDirs.images = 'assets/images'
mix.config.fileLoaderDirs.fonts = 'assets/fonts'

mix
    .postCss('resources/css/tailwind.css', 'public/assets', [
        require('tailwindcss'),
    ])
    .postCss('resources/css/app.css', 'public/assets')
    .js('resources/js/app.js', 'public/assets')
    .version()
