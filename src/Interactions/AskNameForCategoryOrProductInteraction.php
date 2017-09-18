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
     * Action for current command
     * TODO: Make a class for Action
     * 
     * @var string
     */
    private $action = '';
    /**
     * Run interaction.
     *
     * @param ReceivedMessage $message
     */
    public function run(ReceivedMessage $message): void
    {
        $this->action = trim(ltrim($message->getText(), '/add_'));
        $this->remember('action', $this->action);

        if ($this->action === 'product') {
            $this->sendMessage('Укажите имя для продукта');
        } else if ($this->action === 'category') {
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
        // $this->remember('name', $this->makeRememberValue($reply->getText()));
        // $this->remember('action', $this->action);

        $this->sendMessage("action $this->action");
        $this->sendMessage("action {$this->context()}");
        $this->sendMessage("action $reply");

        // if ($this->action === 'product') {
        //     $this->jump(AskSetPriceForProductInteraction::class);
        // } else {
        //     $message = print_r(['action' => $this->action, 'context' => $this->context(), 'reply' => $reply], true);
        //     $this->sendMessage($message);
        // }
    }
}
