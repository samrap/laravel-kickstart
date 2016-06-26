var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Laravel Kickstart Asset Management
 |--------------------------------------------------------------------------
 |
 | Laravel Kickstart has provided a default configuration on top of Elixir
 | for managing your application's assets and NPM dependencies. Now it
 | is easier than ever to build out your application's front end!
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
