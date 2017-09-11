<?php 

namespace Bot;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;


/**
*  TestController
*/
class TestController
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $response->getBody()->write('Whaow');

        return $response;
    }
}