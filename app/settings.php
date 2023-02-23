<?php
// .
declare(strict_types=1);

// .
use function App\env;

// Create a date.
$dt       = new DateTime();
$log_name = $dt->format( 'Y_m_d' );

// .
return [
	'app' => [
		'name'   => env( 'APP_NAME', 'Slim 4 Starter' ),
		'env'    => env( 'APP_ENV', 'production' ),
		'debug'  => env( 'APP_DEBUG', false ),
		'locale' => 'en',
	],
	'view' => [
		'path'        => '../resources/views',
		'cache'       => __DIR__ . '/../cache/twig',
		'debug'       => true,
		'auto_reload' => true,
	],
	'database' => [
		'host'   => env( 'DB_HOST' ),
		'user'   => env( 'DB_USER' ),
		'pass'   => env( 'DB_PASS' ),
		'dbname' => env( 'DB_NAME' ),
		'port'   => env( 'DB_PORT' ),
	],
	'logger' => [
		'level' => 'debug',
		'name'  => 'app',
		'path'  => __DIR__ . "/../logs/$log_name.log",
	],
];
