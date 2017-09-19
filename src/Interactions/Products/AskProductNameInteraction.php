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
        $this->sendMessage('Введите имя продукта');
    }

    /**
     * Process received message.
     *
     * @param ReceivedMessage $reply
     */
    public function process(ReceivedMessage $reply): void
    {
        $this->remember('product_name', $reply->getText());
        $this->remember('chat_id', $this->getChat()->getId());
        $this->remember('user_id', $this->getUser()->getId());

        $message = print_r([
            'product_name' => $this->context('product_name'),
            'user_id' => $this->context('user_id'),
            'chat_id' => $this->context('chat_id'),
        ], true);
        $this->sendMessage($message);
    }
}
