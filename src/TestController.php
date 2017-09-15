<?php 

namespace Bot;

use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
*  Use this controller for local debugs
* @return Psr\Http\Message\ResponseInterface
*/
class TestController
{
    public function index(RequestInterface $request, ResponseInterface $response, array $action): ResponseInterface
    {
        $response->getBody()->write('Database was');

        return $response;
    }
}