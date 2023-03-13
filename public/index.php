<?php
// .
declare( strict_types=1 );


// .
require __DIR__ . '/../vendor/autoload.php';

// .
Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

// .
$app = require __DIR__ . '/../app/app.php';

// .
(require __DIR__ . '/../app/middleware.php')( $app );

// .
(require __DIR__ . '/../app/routes.php')( $app );

// .
// $settings = require __DIR__ . '/../app/settings.php';
// error_log( print_r( $settings, true ) );
;
// .
$app->run();
