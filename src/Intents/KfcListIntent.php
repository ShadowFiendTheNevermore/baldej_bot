<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Interactions\AskDishInteraction;
use Bot\Repository\FoodCategoryRepository;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;
use FondBot\Templates\Keyboard;
use FondBot\Templates\Keyboard\ReplyButton;

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
        $categories = $categories->getList()->values()->all();

        $keyboard = new Keyboard;

        foreach ($categories as $category) {
            $keyboard->addButton(
                (new ReplyButton)->setLabel($category)
            );
        }

        $this->sendMessage('Доступные категории', $keyboard);
    }
}
