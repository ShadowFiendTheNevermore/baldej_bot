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
            $this->exact('/burger'),
            $this->exact('/FACE')
        ];
    }

    public function run(ReceivedMessage $message): void
    {
        $eshkere_voice = (new Attachment)
                      ->setPath(realpath(__DIR__ .'/../../resources/voices/eshkere_voice.ogg'))
                      ->setType(Attachment::TYPE_AUDIO);

        $eshkere_phrase = collect([
            'Я РОНЯЮ ЗАПАД! УУУ!',
            'ТРАЧУ 20 ТЫСЯЧ НА КРАСОВКИ И МНЕ ПОХУЙ',
            'Я БУХАЮ И МНЕ ПОХУЙ',
            'ТРАХНУЛ СУКУ БЕЗ ГАНДОНА',
            'ЕДУ В МАГАЗИН **GUCCI** САНКТ-ПЕТЕРБУРГЕ',
            'ОНА ЖРЕТ МОЙ ХУЙ КАК БУДТО ЭТО БУРГЕР',
            'ВОТ ТЫ ФЛЕКСИШЬ'
        ])->random();

        // Eshkereeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
        $this->sendMessage($eshkere_phrase);
        $this->sendAttachment($eshkere_voice);
    }
}
