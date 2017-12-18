<?php
namespace Base;

include_once "vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Database;

$Database = new Database;

$Database->addConnection([
    'driver'    => 'mysql',
    'host'      => $servername,
    'database'  => $dbname,
    'username'  => $username,
    'password'  => $password,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Database instance available globally via static methods... (optional)
$Database->setAsGlobal();
