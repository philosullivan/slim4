<?php
// .
declare( strict_types=1 );

// .
use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ContactController;

use Slim\Routing\RouteCollectorProxy;

// use App\Models\Functions;

// .
return function ( Slim\App $app ): void {
	$app->get( '/', [HomeController::class, 'index'] )->setName('home.index');
	$app->get( '/about', [AboutController::class, 'index'] )->setName('about.index');
	$app->get( '/contact', [ContactController::class, 'index'] )->setName('contact.index');

	// API
	$app->group( '/api', function ( RouteCollectorProxy $app ) {
		/*
			$app->get('/customers', \App\Action\Customer\CustomerFinderAction::class);
			$app->post('/customers', \App\Action\Customer\CustomerCreatorAction::class);
			$app->get('/customers/{customer_id}', \App\Action\Customer\CustomerReaderAction::class);
			$app->put('/customers/{customer_id}', \App\Action\Customer\CustomerUpdaterAction::class);
			$app->delete('/customers/{customer_id}', \App\Action\Customer\CustomerDeleterAction::class);
		*/
		}
	);
};
