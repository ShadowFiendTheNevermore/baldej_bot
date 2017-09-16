<?php 

namespace Bot\Repositories;

use Bot\Models\Product;

/**
* FoodProductRepository
*/
class FoodProductRepository extends BaseRepository implements RepositoryInterface
{

    /**
     * Return collection of all items
     * 
     * @return array|Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::all();
    }

    /**
     * Find one product via id
     * 
     * @param int $id 
     */
    public function find(int $id)
    {
        return Product::find($id);
    }

    public function getRepoName() : string
    {
        return 'FoodProduct';
    }

}


