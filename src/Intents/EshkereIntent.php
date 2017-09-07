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
        $path = realpath(__DIR__ .'/../../resources/voices/eshkere_voice.ogg');
        $eshkere = (new Attachment)
                      ->setPath($path)
                      ->setType(Attachment::TYPE_AUDIO);

        $this->sendMessage($path);
        // Send eshkere voice with delay in 1 second
        $this->sendAttachment($eshkere);
    }
}
