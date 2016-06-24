<?php

namespace Samrap\Kickstart;

use Illuminate\Support\ServiceProvider;

class KickstartServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(['Samrap\Kickstart\Commands\Kickstart']);
    }
}
