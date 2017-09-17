<?php 

namespace Bot\Providers;

use Illuminate\Database\Capsule\Manager as Capsule;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Illuminate\Database\Connection;



/**
* Core database implementation Capsule from illuminate packages
*/
class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * Register method for protect from container aware trait
     * 
     * @return void
     */
    public function boot(): void
    {
        $capsule = new Capsule;
        $config = $this->container->get('config');
        $capsule->addConnection($config['db']['pgsql']);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->container->share('DB', $this->connect($capsule));
        $this->container->share('Schema', function() use($capsule){
            return $this->connect($capsule)->getSchemaBuilder();
        });
    }

    public function register()
    {
    }

    private function connect(Capsule $capsule) : Connection
    {
        return $capsule->getConnection();
    }

}

