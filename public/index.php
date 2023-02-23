<?php
// .
declare( strict_types=1 );

// .
require __DIR__ . '/../vendor/autoload.php';

// .
Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

// TODO - If debug and development.
ini_set( "log_errors", 1 );
ini_set( "error_log", "../logs/php-error.log" );
// error_log( "Hello, errors!" );

// .
$app = require __DIR__ . '/../app/app.php';

// .
(require __DIR__ . '/../app/middleware.php')( $app );

// .
(require __DIR__ . '/../app/routes.php')( $app );

// .
$app->run();
