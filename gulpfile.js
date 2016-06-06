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

var application = {
    // Place all application scripts here
    'scripts': [
        'includes/**.js',
        'main.js'
    ]
};

var dependencies = {
    // Place all NPM packages here
    'scripts': [
        'jquery/dist/jquery.min.js',
        'bootstrap-sass/assets/javascripts/bootstrap.min.js'
    ]
}

// Compile all the things
elixir(function(mix) {
    mix.sass('main.scss', 'public/css/main.css')
        .scripts(dependencies.scripts, 'public/js/dependencies.js', 'node_modules')
        .scripts(application.scripts, 'public/js/main.js');
});
