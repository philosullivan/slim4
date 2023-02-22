<?php
// .
declare( strict_types=1 );

// .
require __DIR__ . '/../vendor/autoload.php';

// .
Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

// .
$app = require __DIR__ . '/../bootstrap/app.php';

// .
(require __DIR__ . '/../bootstrap/middleware.php')($app);

// .
(require __DIR__ . '/../bootstrap/routes.php')($app);

// .
$app->run();
