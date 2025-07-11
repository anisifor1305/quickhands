<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
// header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: http://localhost:8000");
header("Access-Control-Allow-Methods: HEAD, PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, X-Socket-ID, X-CSRF-Token");
header("Access-Control-Expose-Headers: *");

$app->handleRequest(Request::capture());
