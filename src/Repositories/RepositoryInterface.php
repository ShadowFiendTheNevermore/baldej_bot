<?php 

namespace Bot\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface {

    /**
     * Return all data from storage|db|
     * 
     * @return mixed
     */
    public function all();

    /**
     * Return one item by id
     * @param  int    $id
     * @return mixed
     */
    public function find(int $id);

    /**
     * Need return string with repository name for put this with key in RepositoryManager
     * 
     * @return string
     */
    public function getRepoName() : string;
}

