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
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'kfc_db',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->container->share('DB', $this->connect($capsule));
        $this->container->share('Schema', function() use($capsule){
            return $this->connect($capsule)->getSchemaBuilder();
        });
    }

    protected function connect(Capsule $capsule) : Connection
    {
        return $capsule->getConnection();
    }

}

