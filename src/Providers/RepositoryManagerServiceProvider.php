<?php 

namespace Bot\Providers;

use Bot\Repositories\FoodCategoryRepository;
use Bot\Repositories\FoodProductRepository;
use Bot\RepositoryManager\Manager as RepoManager;
use League\Container\ServiceProvider\AbstractServiceProvider;


/**
* Repository manager
*/
class RepositoryManagerServiceProvider extends AbstractServiceProvider
{

    /**
     * Provides RepositoryManager
     * @var array
     */
    protected $provides = [
        'RepositoryManager',
        'Bot\RepositoryManager\Manager'
    ];

    /**
     * Register of provides Classes
     * 
     * @return void
     */
    public function register() : void
    {
        $this->container->share('RepositoryManager', function (){
            $manager = new RepoManager();
            $manager->addRepositories($this->registeredRepositories());

            return $manager;
        });
    }

    /**
     * Registered data repositories
     * 
     * @return array
     */
    public function registeredRepositories() : array
    {
        return [
            new FoodCategoryRepository,
            new FoodProductRepository
        ];
    }

}

