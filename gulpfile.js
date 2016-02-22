var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// Place all Sass dependencies here
var appSass = [
    'main.scss'
];

// Place all Node JavaScript dependencies here
var nodeScripts = [
    'jquery/dist/jquery.min.js',
    'bootstrap-sass/assets/javascripts/bootstrap.min.js'
];

// Place all app JavaScript dependencies here
var appScripts = [
    'includes/**.js',
    'main.js'
];

// Compile all the things
elixir(function(mix) {
    mix.sass(appSass, 'public/css/main.css')
        .scripts(nodeScripts, 'public/js/nodeFrameworks.js', 'node_modules')
        .scripts(appScripts, 'public/js/main.js');
});
