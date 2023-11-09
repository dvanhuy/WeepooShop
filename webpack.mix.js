const mix = require('laravel-mix')

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css');

mix.styles([
    'resources/css/Auth/login.css',
],"public/css/auth.css");

mix.styles([
    'resources/css/Figure/get_list_figure.css',
],"public/css/get_list_figure.css");