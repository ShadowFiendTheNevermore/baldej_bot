<?php

declare(strict_types=1);

namespace Bot\Interactions;

use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskSetPriceForProductInteraction extends Interaction
{
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        $message = print_r(['message' => $message, 'context' => $this->context()],true);
        $this->sendMessage($message);
    }

    /**
     * Process received message.
     *
     * @param ReceivedMessage $reply
     */
    public function process(ReceivedMessage $reply): void
    {
        $message = print_r([
            'product_name' => $this->context('name'),
            'action' => $this->context('action');
        ], true);
        $this->sendMessage($message);
    }
}
