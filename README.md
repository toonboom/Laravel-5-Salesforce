# Laravel Salesforce

This Laravel package provides an interface for using [Salesforce CRM](http://www.salesforce.com/) through its **SOAP API**.

## Major upgrade
This package is intended to support both Laravel 6.x and 7.x

For Laravel 5.x support, see [Davispeixoto's original package](https://github.com/davispeixoto/Laravel-5-Salesforce)

## Installation

The Laravel package can be installed via [Composer](http://getcomposer.org) by requiring the
`toonboom/laravel-salesforce` package in your project's `composer.json`.

```json
{
    "require": {
        "toonboom/laravel-salesforce": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:toonboom/laravel-salesforce.git"
        }
    ]
}
```

And running a composer update from your terminal:
```sh
php composer update
```

To use the Salesforce Package, you must register the provider when bootstrapping your Laravel application.

Find the `providers` key in your `config/app.php` and register the Service Provider (namespace is unchanged from original)

```php
    'providers' => array(
        // ...
        Davispeixoto\Laravel5Salesforce\SalesforceServiceProvider::class,
    )

    'aliases' => array(
        // ...
        'Salesforce' => Davispeixoto\Laravel5Salesforce\SalesforceFacade::class,
    )
```

## Configuration

By default, the package uses the following environment variables to auto-configure the plugin without modification:
```
SALESFORCE_USERNAME
SALESFORCE_PASSWORD
SALESFORCE_TOKEN
```

Place your [your **enterprise** WSDL file](https://www.salesforce.com/us/developer/docs/api/Content/sforce_api_quickstart_steps_generate_wsdl.htm) into your app `storage/app/wsdl/` directory.

To customize the configuration file, publish the package configuration using Artisan.

```sh
php artisan vendor:publish
```

Update the settings in the generated `config/salesforce.php` configuration file with your credentials.

```php
return [
    'username' => 'YOUR_SALESFORCE_USERNAME',
    'password' => 'YOUR_SALESFORCE_PASSWORD',
    'token' => 'YOUR_SALESFORCE_TOKEN',
    'wsdl' => 'path/to/your/enterprise.wsdl.xml',
];
```

**IMPORTANT:** the PHP Force.com Toolkit for PHP only works with Enterprise WSDL

## Usage

That's it! You're all set to go. Just use:

```php
    Use Salesforce;
    Route::get('/test', function() {
        try {
            echo print_r(Salesforce::describeLayout('Account'), true);
        } catch (Exception $e) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
        }
    });
```

```php
Use Salesforce;
$query = "SELECT ..., ..., ... FROM Object__c WHERE Id = '$this->id'";
$bank = Salesforce::query($query)->records;
```

## More Information

Check out the [SOAP API Salesforce Documentation](http://www.salesforce.com/us/developer/docs/api/index_Left.htm)

## License

This software is licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Versioning

This project follows the [Semantic Versioning](http://semver.org/)
