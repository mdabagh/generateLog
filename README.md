# GenerateLog

GenerateLog is a Laravel package for generating and storing log messages.

## Installation

To install the package, you can use Composer. First, add the following line to your `composer.json` file:

```json
"require": {
    "mdabagh/generate-log": "^1.0"
}
```

Then, run the following command in your terminal:
```
composer update
```
This will download and install the package. Next, add the following line to your config/app.php file:
```
// ...
'providers' => [
    // ...
    Mdabagh\GenerateLog\GenerateLogServiceProvider::class,
],
// ...
```
This will register the package's service provider with Laravel.

Finally, you may need to publish the package's assets (configuration files, views, migrations, etc.) to your application by running:

## Usage
Once the package is installed and configured, you can use it in your Laravel application by calling the appropriate methods. For example:

```
use Mdabagh\GenerateLog\Facades\GLog;

GLog::info('This is an info message');
```
The package supports several types of log messages, including info, warning, error, critical, and emergency.

For more information on how to use this package, please refer to the documentation.

## Contributing
If you find a bug or have a feature request, please open an issue on the package's GitHub repository. Pull requests are also welcome.

## License
This package is open-source software licensed under the MIT license.
