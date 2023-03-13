<?php
// .
declare( strict_types=1 );

// .
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Log\LoggerInterface;
use Selective\Config\Configuration;
use Selective\Database\Connection;

// .
$definitions = [
	'settings' => function (): array {
		return require 'settings.php';
	},
	Connection::class => function (ContainerInterface $container) {
        return new Connection( $container->get( PDO::class ) );
    },
	// .
	Twig::class => function (ContainerInterface $container): Twig {
		$settings = $container->get('settings');
		$options  = [
			'debug' => $settings['view']['debug'],
			'cache' => $settings['view']['cache'],
		];
		$path = $settings['view']['path'];
		$twig = Twig::create($path, $options);
		return $twig;
	},
	// .
	LoggerInterface::class => function ( ContainerInterface $container ) {
		$settings       = $container->get( 'settings' );
		$loggerSettings = $settings[ 'logger' ];
		$logger         = new Logger( $loggerSettings['name'] );
		$processor      = new UidProcessor();
		$logger->pushProcessor( $processor );
		$handler = new StreamHandler( $loggerSettings['path'], $loggerSettings['level'] );
		$logger->pushHandler( $handler );
		return $logger;
	},

	// .
    PDO::class => function ( ContainerInterface $container ) {
        $settings = $container->get('settings')['database'];
        $driver   = $settings['driver'];
        $host     = $settings['host'];
        $dbname   = $settings['database'];
        $username = $settings['username'];
        $password = $settings['password'];
        $charset  = $settings['charset'];
        // $flags    = $settings['flags'];
        $dsn      = "$driver:host=$host;dbname=$dbname;charset=$charset";
        //return new PDO($dsn, $username, $password, $flags);
		return new PDO($dsn, $username, $password);
    },
];

return ( new ContainerBuilder() )->addDefinitions( $definitions )->build();
