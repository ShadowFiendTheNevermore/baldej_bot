<?php 

namespace Bot\Repository;

use Bot\Contracts\Repository;
use Illuminate\Support\Collection;

/**
* 
*/
class FoodCategoryRepository implements Repository
{
    
    public function getList() : Collection
    {
        return collect([
            'Sandwitches' => 'Сандвичи',
            'Chiken' => 'Курица',
            'Baskets' => 'Баскеты'
        ]);
    }

    public function getItem($item_key)
    {
        return $this->getList()->first(function ($value, $key){
           return $value === $item_key;
        });
    }

}

