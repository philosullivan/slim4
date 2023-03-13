<?php
// .
declare( strict_types=1 );

// .
namespace App\Controllers;

// .
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// .
class AboutController extends Controller {
    public function index( Request $request, Response $response ): Response {
        $this->logger->info( 'AboutController' );
        
        return $this->render($response, 'about/index.twig');
    }
}
