<?php
// .
declare( strict_types=1 );

// .
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;
use App\Controllers\UsersController;


// .
use Slim\Routing\RouteCollectorProxy;

// .
return function ( Slim\App $app ): void {
	$app->get( '/', [HomeController::class, 'index'] )->setName('home.index');
	$app->get( '/about', [AboutController::class, 'index'] )->setName('about.index');
	$app->get( '/contact', [ContactController::class, 'index'] )->setName('contact.index');
	$app->get( '/users', [UsersController::class, 'index'] )->setName('users.index');




	/*
	$app->group( '/users', function ( RouteCollectorProxy $app ) {


		}
	);
	$app->group( '/api', function ( RouteCollectorProxy $app ) {

		}
	);
	*/
};
