<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Repository\FoodRepository;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class ShowListingIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/list'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {   
        $categories = resolve('RepositoryManager')->get('FoodCategory');
        $message = "Список категорий: \n";

        $categories->all()->each(function($category) use ($message){
            $message = "<b>{$category->name}</b>\n"
        });

        $this->sendMessage($message);
    }
}