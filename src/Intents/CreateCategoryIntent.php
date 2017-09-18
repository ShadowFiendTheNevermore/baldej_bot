<?php

declare(strict_types=1);

namespace Bot\Intents;

use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class CreateCategoryIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/add_category'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        // Send reply to user, jump to interaction or do something else...
    }
}
