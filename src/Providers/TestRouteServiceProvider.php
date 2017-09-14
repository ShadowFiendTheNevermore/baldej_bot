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
        'request',
        'response',
        'emitter',
        'router'
    ];
    
    public function register()
    {
        $this->container->share('request', function () {
            return ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
        });
        $this->container->share('response', Response::class);
        $this->container->share('emitter', SapiEmitter::class);

        $this->container->share('router', function () {
            $router = new RouteCollection($this->container);

            $controller = new TestController;

            $router->map('GET', '/', [$controller, 'index']);

            return $router;
        });
    }
}

