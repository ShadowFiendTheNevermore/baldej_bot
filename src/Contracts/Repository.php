<?php 

namespace Bot\Contracts;

use Illuminate\Support\Collection;


interface Repository
{
    public function getList() : Collection;

    public function getItem($item_key);
}
