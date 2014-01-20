<?php namespace Lucasmichot\Laraveldotenv;

use Illuminate\Support\ServiceProvider;
use Dotenv;

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
        // get full .env filename
        $env_filename = base_path().'/.env';

        // if file exists
        if (File::exists($env_filename)) {
            // load it
            Dotenv::load(base_path());
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // No services registered
    }

}
