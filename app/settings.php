<?php
// .
declare( strict_types=1 );

// .
use function App\env;

// Create a date.
$dt       = new DateTime();
$log_name = $dt->format( 'Y_m_d' );

// .
return [
	'app' => [
		'name'     => env( 'APP_NAME' ),
		'env'      => env( 'APP_ENV' ),
		'debug'    => env( 'APP_DEBUG' ),
		'salt'     => '',
		'salt_key' => '',
		'locale'   => 'en',
	],
	'view' => [
		'path'        => '../resources/views',
		'cache'       => __DIR__ . '/../cache/twig',
		'debug'       => true,
		'auto_reload' => true,
	],
	'database' => [
		'driver' => env( 'DB_DRIVER' ),
		'host' => env( 'DB_HOST' ),
		'database'  => env( 'DB_NAME' ),
		'username'  => env( 'DB_USER' ),
		'password'  => env( 'DB_PASS' ),
		'port'      => env( 'DB_PORT' ),
		'charset'   => 'utf8mb4',
		'collation' => 'utf8mb4_unicode_ci',
		'prefix'    => '',
		'options' => [
			// Turn off persistent connections
			PDO::ATTR_PERSISTENT => false,
			// Enable exceptions
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			// Emulate prepared statements
			PDO::ATTR_EMULATE_PREPARES => true,
			// Set default fetch mode to array
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			// Set character set
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
		],
	],
	'logger' => [
		'level' => 'debug',
		'name'  => 'app',
		'path'  => __DIR__ . "/../logs/$log_name.log",
	],
];
