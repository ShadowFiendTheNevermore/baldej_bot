<?php 

namespace Bot\Providers;

use Illuminate\Database\Capsule\Manager as Capsule;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Illuminate\Database\Connection;

/**
* 
*/
class DatabaseServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        'Schema',
        'DB'
    ];

    /**
     * Register method for protect from container aware trait
     * 
     * @return void
     */
    public function register(): void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => env('DB_DRIVER', 'mysql'),
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_NAME','kfc_db'),
            'username'  => env('DB_USERNAME','root'),
            'password'  => env('DB_PASSWD','root'),
            'charset'   => env('DB_CHARSET','utf8'),
            'collation' => env('DB_COLLATION','utf8_unicode_ci'),
            'prefix'    => env('DB_PREFIX',''),
        ]);

        $capsule->bootEloquent();

        $this->container->share('DB', $this->connect($capsule));
        $this->container->share('Schema', function() use($capsule){
            return $this->connect($capsule)->getSchemaBuilder();
        });
    }

    private function connect(Capsule $capsule) : Connection
    {
        return $capsule->getConnection();
    }

}

