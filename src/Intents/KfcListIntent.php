<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Interactions\AskDishInteraction;
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
            $this->exact('/kfc'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->jump(AskDishInteraction::class);
    }
}
