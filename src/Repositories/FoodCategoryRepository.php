<?php 

namespace Bot\Repositories;

use Bot\Models\Category;

/**
* Food categories repository
*/
class FoodCategoryRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Return collection with categories
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * [find description]
     * @param  int    $id
     * @return ***
     */
    public function find(int $id)
    {
        return Category::find($id);
    }

    public function getRepoName() : string
    {
        return 'FoodCategory';
    }
}

