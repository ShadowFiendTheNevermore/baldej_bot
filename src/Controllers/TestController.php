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
        $action = '/add_product';
        $action = ltrim($action, '/add_');

        $locale = resolve('config')['locale']['ru'];

        // $products = resolve('RepositoryManager')->get('FoodProduct');
        // $products->all()->each(function($product) use ($response){
        //     $response->getBody()->write($product->name . "\n");
        // });
        $response->getBody()->write($locale[$action]);
        return $response;
    }
}


