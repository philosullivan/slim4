<?php

// .
declare( strict_types=1 );

// .
namespace App\Common;

//.
use Psr\Log\LoggerInterface;
use Selective\Database\Connection;

// .
class Functions {

	public $logger;
	public Connection $connection;

	//.
	public function __construct( Connection $connection, LoggerInterface $logger ) {
		$this->connection = $connection;
		$this->logger     = $logger;
	}

	// .
	public function test( $msg ) {
		// $query = $this->connection->select()->from('test');
		// $rows = $query->execute()->fetchAll() ?: [];
		// $this->logger->info( print_r( $query, true ) );
		// $this->logger->info( print_r( $rows, true ) );

		$this->logger->info( $msg );
	}

}