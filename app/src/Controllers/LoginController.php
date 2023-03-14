<?php
// .
declare( strict_types=1 );

// .
namespace App\Controllers;

// .
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

// .
class LoginController extends Controller {

    public function index( Request $request, Response $response ): Response {
        $this->functions->test( 'LoginController' );
        return $this->render($response, 'login/index.twig');
    }

}
