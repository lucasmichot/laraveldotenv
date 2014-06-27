<?php namespace Lucasmichot\Laraveldotenv;

use Illuminate\Support\ServiceProvider;

class LaraveldotenvServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc }
     */
    public function boot()
    {
        $this->package('lucasmichot/laraveldotenv');
    }

    /**
     * {@inheritdoc }
     */
    public function register()
    {
        // get .env filename
        $envFilename = base_path() . '/.env';

        // if .env file exists
        if (file_exists($envFilename)) 
        {
            // if .env file is readable, process it like a .ini file (without sections)
            $variables = parse_ini_file($envFilename, false);
            
            if ($variables !== false) 
            {
                // merge variables into $_ENV and $_SERVER arrays
                $_ENV    = array_merge($_ENV, $variables);
                $_SERVER = array_merge($_SERVER, $variables);
            }
        }
    }

    /**
     * {@inheritdoc }
     */
    public function provides()
    {
        // no service provided
    }
}
