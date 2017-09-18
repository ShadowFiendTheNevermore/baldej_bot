<?php
declare(strict_types=1);

namespace Bot\Interactions\Products;

use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;

class AskProductNameInteraction extends Interaction
{
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
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
