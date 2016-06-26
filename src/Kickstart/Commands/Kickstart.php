<?php

namespace Samrap\Kickstart\Commands;

use Illuminate\Console\Command;

class Kickstart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kickstart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kickstart your Laravel application';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publishing assets...');

        $this->callSilent('vendor:publish', [
            '--tag' => ['app', 'resources'],
        ]);
        $this->callSilent('vendor:publish', [
            '--tag' => ['npm'],
            '--force' => true
        ]);

        $this->info('Installing NPM dependencies...');

        shell_exec('npm install');
        shell_exec('gulp');

        $this->info('Website Kickstarted. Wasn\'t that easy?');
    }
}
