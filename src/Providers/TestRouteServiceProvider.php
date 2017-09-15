<?php 

namespace Bot\Providers;

use Bot\TestController;
use FondBot\Application\RouteServiceProvider;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Capsule\Manager;
use League\Route\RouteCollection;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;


/**
* 
*/
class TestRouteServiceProvider extends RouteServiceProvider
{

    protected $provides = [
        'router'
    ];
    
    public function register()
    {
        $this->container->share('router', function () {
            $router = new RouteCollection($this->container);

            $controller = new TestController;

            $router->map('GET', '/', [$controller, 'index']);

            return $router;
        });
    }
}

