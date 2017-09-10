<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Interactions\AskDishInteraction;
use Bot\Repository\FoodCategoryRepository;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class KfcListIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/categories')
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $categories = new FoodCategoryRepository;

        $message = var_dump($categories->getList()->values()->all());

        $this->sendMessage($message);
    }
}
