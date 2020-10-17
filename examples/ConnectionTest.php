<?php

require_once '../src/Connection.php';

/*
 * Connection class accepts 2 arrays in it's constructor first one is DSN settings and the second one is for connection
 * options for other PDO drivers check :
 * https://www.php.net/manual/en/pdo.drivers.php or using SupportedPDODatabaseDrivers() method
 */
$DatabaseInstance = new Connection([
    'host' => 'localhost',
    'database_name' => 'ksw2020',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'
],[
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
], 'mysql');

//connect method does what it says :)
$ConnectDatabase = $DatabaseInstance->connect();

