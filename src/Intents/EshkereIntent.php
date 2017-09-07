<?php

declare(strict_types=1);

namespace Bot\Intents;

use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;
use FondBot\Templates\Attachment;


class EshkereIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/eshkere'),
            $this->exact('/эщкере'),
            $this->exact('эщкере'),
            $this->exact('eshkere')
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $eshkere = (new Attachment)
                      ->setPath('./../../resources/voices/eshkere_voice.ogg')
                      ->setType(Attachment::TYPE_AUDIO);

        // Send eshkere voice with delay in 1 second
        $this->sendAttachment($eshkere, 1);
    }
}
