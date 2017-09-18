<?php

declare(strict_types=1);

namespace Bot\Interactions;

use Bot\Traits\SessionStringSaver;
use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskNameForCategoryOrProductInteraction extends Interaction
{
    use SessionStringSaver;
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        $action = ltrim($message->getText(), '/add_');

        $this->remember('action', $action);

        if ($action === 'product') {
            $this->sendMessage('Укажите имя для продукта');
        } else if ($action === 'category') {
            $this->sendMessage('Укажите имя для категории');
        }
    }

    /**
     * Process received message.
     *
     * @param ReceivedMessage $reply
     */
    public function process(ReceivedMessage $reply): void
    {
        $this->remember('name', $this->makeRememberValue($reply->getText()));
        if ($this->context('action') === 'product') {
            $this->jump(AskSetPriceForProductInteraction::class);
        } else {
            $this->sendMessage('Еще в разработке');
        }
    }
}
