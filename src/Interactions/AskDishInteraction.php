<?php

declare(strict_types=1);

namespace Bot\Interactions;

use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskDishInteraction extends Interaction
{
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        $this->sendMessage('Шо будите заказывать ?');
    }

    /**
     * Process received message.
     *
     * @param ReceivedMessage $reply
     */
    public function process(ReceivedMessage $reply): void
    {
        $this->sendMessage('Вы будите заказывать' . $reply->getText());
    }
}
