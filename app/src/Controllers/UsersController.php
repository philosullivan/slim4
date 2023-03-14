<?php
// .
declare( strict_types=1 );

// .
namespace App\Controllers;

// .
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// .
class UsersController extends Controller {

    public function index( Request $request, Response $response ): Response {
        $this->functions->test( 'UsersController' );
        return $this->render($response, 'users/index.twig');
    }

}
