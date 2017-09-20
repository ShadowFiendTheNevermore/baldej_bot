<?php

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Interactions\Products\AskProductProperties;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class CreateProductIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/add_product'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $this->jump(AskProductProperties::class);
    }
}
