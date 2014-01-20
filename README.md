# Laravel .ENV

A very simple utility to set a environment variables file for your Laravel project.

[![Latest Stable Version](https://poser.pugx.org/lucasmichot/laraveldotenv/v/stable.png)](https://packagist.org/packages/lucasmichot/laraveldotenv)
[![Total Downloads](https://poser.pugx.org/lucasmichot/laraveldotenv/downloads.png)](https://packagist.org/packages/lucasmichot/laraveldotenv)
[![Build Status](https://travis-ci.org/lucasmichot/laraveldotenv.png)](https://travis-ci.org/lucasmichot/laraveldotenv)

* [Requiring/Loading](#requiringloading)
* [Usage](#usage)
* [Note](#note)
* [License](#license)

## Requiring / Loading

Require this package in your `composer.json` and run `composer update`.
Or run `composer require lucasmichot/laravel-ide-laraveldotenv:dev-master` directly.

````javascript
"require": {
    "lucasmichot/laraveldotenv": "dev-master"
}
````
After updating composer, add the `LaraveldotenvServiceProvider` at the bottom of the Providers array in `app/config/app.php`:

`````php
'providers' => array(
    //  ...
    'Lucasmichot\Laraveldotenv\LaraveldotenvServiceProvider',
),
````

## Usage

Place a file called `.env` at the root of your Laravel project folder, so that `.env` and `server.php` files are in the same folder.

You can put all the required environment variable with this `.env` file, respecting the following syntax: `ENV_KEY=ENV_VALUE`. In this example we set environment variables for MySQL database configuration and access:

Content of `.env` file:

````ìni
DB_HOST=localhost
DB_NAME=database-name
DB_USER=root
DB_PASS=password
````

Then in your `database.php` config file, you can use the existing variables with `getenv()` function:

````php
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
),
````

#### Note

Keep in mind that this `.env` file must shall not be committed in your repository and must be excluded from release archive. 
Ensure to add `.env` to your `.gitignore` file.

To ensure this file will not be available in the the release archive, simply add `.env export-ignore` to your `.gitattributes` file.

## License

Released under the MIT License - see `LICENSE.txt` for details.
