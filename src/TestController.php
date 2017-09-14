<?php 

namespace Bot;

use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
*  TestController
*/
class TestController
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $response->getBody()->write('Database was');

        return $response;
    }
}