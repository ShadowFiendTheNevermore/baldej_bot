<?php
declare(strict_types=1);

namespace Bot\Interactions\Categories;

use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskCategoryDescriptionInteraction extends Interaction
{
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        // Send message, show keyboard or do something else...
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
