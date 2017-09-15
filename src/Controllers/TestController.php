<?php 

namespace Bot\Controllers;

use Bot\Models\Category;
use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
* Use this controller for local debugs
*  
* @return Psr\Http\Message\ResponseInterface
*/
class TestController
{
    public function index(RequestInterface $request, ResponseInterface $response, array $action): ResponseInterface
    {
        // $category = new Category;

        dd(Category::find(1));

        $response->getBody()->write('Database was');

        return $response;
    }
}