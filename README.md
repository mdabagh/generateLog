# GenerateLog

With the GenerateLog package, you can easily and accurately store your program logs in both database and storage. This package provides the ability to customize log information, such as adding IP addresses, user information, and executed file information to your logs.

Additionally, you can easily set your log level in the env file. For example, you can temporarily disable info logs and later reactivate them as needed.

The GenerateLog package offers customizable features, ease of use, and the ability to manage program logs with precision and high quality.

## Features

- Customize log information: With Laravel Custom Logger, you can log additional information such as IP address, user information, and file execution information. You can easily customize the information that is logged to meet your specific needs.

- Fine-grained control: This package provides fine-grained control over logging levels. You can choose to log only the most important messages, or log everything for detailed debugging.

- Dual storage: You can choose to store your logs in both the database and storage simultaneously. This allows you to have a backup of your logs in case one storage location fails.

## Installation

To install the package, simply run the following command:

```
composer require mdabagh/generatelog
```

## Usage

To use the package, you need to include the `GLogFactory` class in your code:

```
use Mdabagh\GenerateLog\GLogFactory;
```

Then, you can call the `make` method to generate a log file:

```
GLogFactory::make($type, $message, $data, $exception, $request, $response);
```

The `make` method takes six parameters:

- `$type`: The type of the log message (info, warning, debug, or error).
- `$message`: The message to log.
- `$data`: Additional data to include in the log file.
- `$exception`: The exception object (if any).
- `$request`: The HTTP request object (if any).
- `$response`: The HTTP response object (if any).

## Configuration

To configure GenerateLog, you can set the following environment variables in the `.env` file of your Laravel application:

### GLOG_STATE_ACTIVE
This variable specifies whether to use the database (`db`), the file system (`storage`), or both (`dbAndStorage`) to store log files. By default, it is set to `storage`.

When `GLOG_STATE_ACTIVE` is set to `storage`, GenerateLog uses Laravel's built-in logging functionality to generate log files. The `config/logging.php` file in your Laravel application specifies the location and format of the log files.

By default, Laravel stores log files in the `storage/logs` directory. You can change this location by modifying the `path` option in the `config/logging.php` file. For example, to store log files in a subdirectory called `logs` under the `storage/app` directory, you can change the `path` option as follows:

```php
'path' => storage_path('app/logs/laravel.log'),
```

You can also change the format of the log files by modifying the `channels` option in the `config/logging.php` file. For example, to log messages in JSON format, you can add a new channel as follows:

```php
'json' => [
    'driver' => 'single',
    'path' => storage_path('logs/laravel.json'),
    'level' => 'debug',
],
```

Then, you can set `GLOG_STATE_ACTIVE` to `storage` in your `.env` file to enable logging to the file system:

```
GLOG_STATE_ACTIVE=storage
```

If you want to use the database to store log files, you can set `GLOG_STATE_ACTIVE` to `db`. In this case, you also need to run the `Logging` migration to create the necessary database table:

```
php artisan migrate
```

### GLOG_TYPE_INFO_ACTIVE, GLOG_TYPE_WARNING_ACTIVE, GLOG_TYPE_DEBUG_ACTIVE, GLOG_TYPE_ERROR_ACTIVE
These variables specify whether to log messages of a particular type (`info`, `warning`, `debug`, or `error`). By default, all types are set to `true`.

Example usage:
```
GLOG_TYPE_INFO_ACTIVE=false
GLOG_TYPE_WARNING_ACTIVE=true
GLOG_TYPE_DEBUG_ACTIVE=true
GLOG_TYPE_ERROR_ACTIVE=true
```

Note that if you change the value of any of these environment variables, you may need to restart your application for the changes to take effect.

## References

- Laravel documentation on [Logging](https://laravel.com/docs/8.x/logging)
- Laravel documentation on [Configuration](https://laravel.com/docs/8.x/configuration)

## License

GenerateLog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
