<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Repository\FoodRepository;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class ShowCategoriesIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/categories'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {   
        $categories = resolve('RepositoryManager')->get('FoodCategory');
        $message = "Список категорий: \n";

        foreach ($categories->all() as $category) {
            $message .= "
                $category->name
                \n
                --------------------------
                \n
            ";
        }

        $this->sendMessage($message);
    }
}
