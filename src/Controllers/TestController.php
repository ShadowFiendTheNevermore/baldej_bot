<?php 

namespace Bot\Controllers;

use Bot\Models\Category;
use Bot\Repositories\FoodCategoryRepository;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Database\Capsule\Manager;

/**
* Use this controller for local debugs
*  
* @return Psr\Http\Message\ResponseInterface
*/
class TestController
{
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $repo = resolve('RepositoryManager')->get('FoodProduct');
        $response->getBody()->write($repo->all()->toJson());
        return $response->withHeader('Content-type','application/json');
    }
}


