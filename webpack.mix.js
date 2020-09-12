const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.copyDirectory('resources/images', 'public/images')

mix.sass('resources/styles/app.scss', 'public/css').options({
    processCssUrls: false,
    postCss: [
        tailwindcss('./tailwind.config.js'),
    ],
})

if (mix.inProduction()) {
    mix.version()
}
