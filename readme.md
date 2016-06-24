# Laravel Kickstart

### What is Laravel Kickstart?
---
Laravel Kickstart is a Laravel starter configuration that helps you build Laravel websites faster. It comes with an [Elixir](https://laravel.com/docs/5.1/elixir) configuration, the latest versions of [Bootstrap](http://getbootstrap.com) and [JQuery](https://jquery.com), a [Blade](https://laravel.com/docs/5.1/blade) wrapper template, debug tools, and much more.

### Why Laravel Kickstart?
---
Laravel is an amazing framework that lets you build scalable applications rapidly and professionally. However, when it comes time to tie in the front end, a lot of time is spent configuring views, stylesheets, and scripts. Laravel Kickstart aims to provide you with a front end workflow as advanced as Laravel's back end workflow, while tying both together seamlessly.

### Features
---
- **Gulp/Elixir Configuration:** Compile your Sass and JavaScript files with [Laravel Elixir](https://laravel.com/docs/5.1/elixir). Your styles and scripts will automatically be combined with the project's Node dependencies and injected into the base Blade file.
- **DRY Philosophy:** Modularized Sass and JavaScript files out of the box to prevent repetitive front end code. A main.js file utilizes [DOM-based routing](http://www.paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/), while a highly organized Sass file structure (based on [Sage](https://roots.io/sage/)) breaks your styles into organized groups.
- **Blade Wrapper:** A base [Blade](https://laravel.com/docs/5.1/blade) template that acts as a wrapper for all your pages automatically pulls in your styles and scripts and provides many sections to extend.
- **Enhanced Debugging:** Laravel Kickstart implements the [Whoops](https://github.com/filp/whoops) error handler and [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) for advanced debugging in app debug mode.

### Installation
---
Install via composer:
`composer require samrap/laravel-kickstart`
Then add the service provider to your providers array in `config/app.php`:
`Samrap\Kickstart\KickstartServiceProvider::class`
Finally, there are some files that need to be published to your project. We will go over all of these later, but for now we will just move them to the right place. This can be done using the `vendor:publish` command:
`php artisan vendor:publish`
