<?php 

declare(strict_types=1);

namespace Bot\Repository;

use Bot\Contracts\Repository;
use Illuminate\Support\Collection;

/**
* 
*/
class FoodRepository implements Repository
{
    /**
     * return food list
     * 
     * @return Illuminate\Support\Collection
     */
    public function getList() : Collection
    {
        return new Collection([
            'Twisters' => [
                'i_twister' => [
                    'name' => 'Ай Твистер'
                ],
                'cheese_twister' => [
                    'name' => 'Сырный твистер'
                ]
            ],
            'Chiken' => [
                'Leg' => [
                    'name' => 'Ножка'
                ],

            ]
        ]);
    }

    public function getItem($item_key)
    {
        return $this->getList()->first(function($value, $key){
            return $item_key === $key;
        });
    }



}





