# Laravel Kickstart
### Everyting you need to kick off a Laravel website
___________
### What is Laravel Kickstart?
Laravel Kickstart is a Laravel starter configuration that helps you build Laravel websites faster. It comes with an [Elixir](https://laravel.com/docs/5.1/elixir) configuration, the latest versions of [Bootstrap](http://getbootstrap.com) and [JQuery](https://jquery.com), a [Blade](https://laravel.com/docs/5.1/blade) wrapper template, debug tools, and much more.

### Why Laravel Kickstart?
Laravel is an amazing framework that lets you build scalable applications rapidly and professionally. However, when it comes time to tie in the front end, a lot of time is spent configuring views, stylesheets, and scripts. Laravel Kickstart aims to provide you with a front end workflow as advanced as Laravel's back end workflow, while tying both together seamlessly.

### Features
- **Gulp/Elixir Configuration:** Compile your Sass and JavaScript files with [Laravel Elixir](https://laravel.com/docs/5.1/elixir). Your styles and scripts will automatically be combined with the project's Node dependencies and injected into the base Blade file.
- **DRY Philosophy:** Modularized Sass and JavaScript files out of the box to prevent repetitive front end code. A main.js file utilizes [DOM-based routing](http://www.paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/), while a highly organized Sass file structure (based on [Sage](https://roots.io/sage/)) breaks your styles into organized groups.
- **Blade Wrapper:** A base [Blade](https://laravel.com/docs/5.1/blade) template that acts as a wrapper for all your pages automatically pulls in your styles and scripts and provides many sections to extend.
- **Enhanced Debugging:** Laravel Kickstart implements the [Whoops](https://github.com/filp/whoops) error handler and [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) for advanced debugging in app debug mode.

### Installation
Kick-off your project with Laravel Kickstart in just a few short commands:

Download the zip archive via your web browser or run:
```
$ git clone https://github.com/samrap/lks.git
````
Then:
```
$ cd lks
$ composer install
$ npm install
```

Afterwards, you can rename the directory to whatever you like. Tip: don't forget to do the standard Laravel installtion steps as well, creating your `.env` file and generating the application key with `php artisan key:generate`!

### Usage:
You're now ready to make use of the awesome features Laravel Kickstart has to offer! Here are some basic overviews of how to make the most out of your installation:
##### Blade Wrapper:
A base Blade wrapper located in `resources/views/layouts/base.blade.php` is intended to be the base layout that all your views extend. It contains the links to your main compiled CSS and JavaScript files and defines default sections to extend.

To use this wrapper, simply add an `@extends` Blade directive to your template file(s):
```
@extends('layouts.base')
```
You can now inject content into the layout's sections using `@section` directives. Take a look at the `layouts.base` view to see all the extendable sections. There are quite a few by default, but these can obviously be tailored to your needs.
##### Gulp/Elixir:
Your Sass and JavaScript assets reside in the `resources/assets/sass` and `resources/assets/js` directories, respectively. Run `gulp watch` to automatically compile your Sass and JavaScript assets. Every time you modify and save an existing Sass or JavaScript file in the `resources/assets` directory, it will be compiled and saved into `public/css` and `public/js` and automatically included in your `layouts.base` view. To minify your compiled assets, just add the `--production` flag after the `gulp` command.

If you need to install additional Node script dependencies, simply run the `npm install` as usual, then edit the `nodeScripts` array in the gulpfile by adding the path to the new dependency. Then run `gulp` to recompile all your assets. (Note: npm scripts are compiled separate from asset scripts. They are compiled into public/js/nodeScripts.js and included in the base Blade view right before main.js)
##### Don't Repeat Yourself (DRY):
In addition to the Blade wrapper template, Laravel Kickstart comes configured with an organized Sass and JavaScript file/directory structure to help you modularize and stay DRY.

###### - Scripts
The JavaScript setup is simple, yet powerful. Laravel Kickstart includes one JavaScript file, `resources/assets/js/main.js`. This acts as your primary JavaScript file and utilizes DOM-based routing to help modularize your code. If you need to add more JavaScript files, place them in `resources/assets/js/includes` and they will be automatically compiled *before* your main.js file. All scripts are compiled into `public/js/main.js`.
###### - Stylesheets
The Sass setup is also very powerful. A main.scss file in the base Sass directory, `resources/assets/sass` imports all of your stylesheets and compiles them into one file, `public/css/main.css`. Inside of the base Sass directory, you will find various subdirectories and files which are designed to break up your styles into more maintainable pieces. The setup is almost identical to [Sage for WordPress](https://roots.io/sage/), with some minor changes to better reflect Laravel.
###### - Additional Files
Laravel Kickstart comes with a nice list of Sass and JavaScript files out of the box, but you may find the need to add some more. Don't worry, it's a sinch!

To include additional Sass files, either add an `@import` statement in the `resources/assets/sass/main.scss` file, or update the `appSass` array in the project's gulpfile. (Note: The `appSass` array assumes paths relative to the base Sass directory)

To add additional JavaScript files, remember you can place them directly in `resources/assets/js/includes`. Of course, you can also explicitly add the path to the `appScripts` array in your gulpfile.

----
### Contributing
Contributions are more than welcome! You can submit feature requests to [rapaport.sam7@gmail.com](mailto:rapaport.sam7@gmail.com), or fork the repo yourself!

----
Thank you for using Laravel Kickstart, I hope it helps make front end development in Laravel Kick-ass!

