<?php

// .
declare( strict_types=1 );

// .
namespace App\Controllers;

// .
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller {

	public function index( Request $request, Response $response ): Response {
		$this->logger->info('HomeController');

		// Test Query.
		$query = $this->connection->select()->from('test');
		$rows = $query->execute()->fetchAll() ?: [];
		$this->logger->info( print_r( $query, true ) );
		$this->logger->info( print_r( $rows, true ) );


		return $this->render( $response, 'home/index.twig' );
	}
}
