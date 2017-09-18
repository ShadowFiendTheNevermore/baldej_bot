<?php

declare(strict_types=1);

namespace Bot\Interactions;

use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskNameForCategoryOrProductInteraction extends Interaction
{
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        $this->sendMessage($message);
    }

    /**
     * Process received message.
     *
     * @param ReceivedMessage $reply
     */
    public function process(ReceivedMessage $reply): void
    {
        // Process reply to the message you sent in method "run".
    }
}
