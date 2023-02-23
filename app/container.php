<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Slim\Views\Twig;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Log\LoggerInterface;

$definitions = [
	'settings' => function (): array {
		return require 'settings.php';
	},

	Twig::class => function (ContainerInterface $container): Twig {
		/** @var array<string, array<string, mixed>> $settings */
		$settings = $container->get('settings');

		$options = [
			'debug' => $settings['app']['debug'],
			'cache' => $settings['view']['cache'],
		];

		/** @var string $path */
		$path = $settings['view']['path'];

		$twig = Twig::create($path, $options);
		return $twig;
	},
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
];

return ( new ContainerBuilder() )->addDefinitions( $definitions )->build();
