<?php namespace Lucasmichot\Laraveldotenv;

use Illuminate\Support\ServiceProvider;

class LaraveldotenvServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('lucasmichot/laraveldotenv');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // get .env full path
        $env_filename = base_path().'/.env';

        // if .env file is readable, process it like a .ini file (without sections)
        $variables = parse_ini_file($env_filename, false);
        if ($variables !== false) {
            // merge variables into $_ENV and $_SERVER
            $_ENV    = array_merge($_ENV, $variables);
            $_SERVER = array_merge($_SERVER, $variables);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // no service provided
    }
}
