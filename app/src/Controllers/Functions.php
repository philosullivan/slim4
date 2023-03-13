<?php

// .
declare( strict_types=1 );

// .
namespace App\Controllers;

//.
use Psr\Log\LoggerInterface;

// .
class Functions {
	public $logger;

	public function __construct( LoggerInterface $logger ) {
		$this->logger = $logger;
	}

	public function test( ) {
		$this->logger->info('test');
	}

}