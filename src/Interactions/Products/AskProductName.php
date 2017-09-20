<?php 

namespace Bot\Interactions\Products;

use Bot\Interactions\Sanitizer\Sanitizer;
use FondBot\Contracts\Template;
use FondBot\Conversation\Interaction;
use FondBot\Drivers\ReceivedMessage;
use FondBot\Templates\Keyboard;
use FondBot\Templates\Keyboard\PayloadButton;

/**
* 
*/
class AskProductName extends Interaction
{
    public function run(ReceivedMessage $message): void
    {
    }

    public function process(ReceivedMessage $reply): void
    {
    }
}

