# PDO Connection Wrapper With PHP

This is a simple PHP library for PDO connection

### Installation

Install library via composer :

```sh
composer require adirona/pdo-connection
```

## How to use this library

##### Initialize Connection Class
Connection class accepts 2 arrays in it's constructor first one is DSN settings and the second one is for connection options and third attribute is which PDO driver do you want to use for connection default is MYSQL.
You can check PDO Drivers https://www.php.net/manual/en/pdo.drivers.php or using SupportedPDODatabaseDrivers() method
```php
$DatabaseInstance = new Connection([
    'host' => 'localhost',
    'database_name' => 'db_name',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
],[
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
], 'mysql');

```

##### Connect Now
```php
$ConnectDatabase = $DatabaseInstance->connect();
```

To get most of this PDO wrapper and PDO in general use also this repository (https://github.com/envms/fluentpdo).

# You can find same example at examples folder of this repository.

