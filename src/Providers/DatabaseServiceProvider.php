<?php 

namespace Bot\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;


/**
* 
*/
class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    /**
     * boot for service provider class
     * 
     * @return void
     */
    public function boot() : void
    {
        
    }

    /**
     * Register method for protect from container aware trait
     * 
     * @return void
     */
    public function register(): void
    {
    }
}

