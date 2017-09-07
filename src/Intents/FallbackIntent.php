<?php

declare(strict_types=1);

namespace Bot\Intents;

use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class FallbackIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->sendMessage("АЛО ДЯДЯ ТЫ ШО ДЕЛАЕШЬ");
    }
}
