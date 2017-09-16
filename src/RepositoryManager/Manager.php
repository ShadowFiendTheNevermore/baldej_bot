<?php 

namespace Bot\RepositoryManager;

use Bot\Repositories\RepositoryInterface;
use Illuminate\Support\Collection;

/**
* Main manager of repositories
*/
class Manager
{

    /**
     * 
     * @var array|Illuminate\Support\Collection
     */
    protected $repositories = [];

    /**
     * Constructor of Repository manager
     * 
     * @param boolean $useCollection
     */
    public function __construct($useCollection = true)
    {
        if ($useCollection) {
           $this->repositories = new Collection();
        }
    }

    /**
     * 
     * 
     * @param RepositoryInterface $repository
     */
    public function add(RepositoryInterface $repository)
    {
       $this->repositories[$repository->getRepoName()] = $repository;
    }

    /**
     * 
     * @param array $repositories [description]
     */
    public function addRepositories(array $repositories)
    {
        foreach ($repositories as $repository) {
            $this->add($repository);
        }
    }

    /**
     * 
     * 
     * @param RepositoryInterface $repository
     */
    public function get(string $repoKey)
    {
        return $this->repositories[$repoKey];
    }


}


