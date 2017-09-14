<?php 

namespace Bot\Commands;

use Bot\SetupDbController;
use FondBot\Toolbelt\Command;


/**
* Setup Database for Application command
*/
class SetupDbCommand extends Command
{

    protected function configure(): void
    {
        $this->setName('db:setup');
        $this->setDescription('Setup Database for bot');
        $this->setHelp('I can help you');
    }

    public function handle(): void
    {
        $handler = new SetupDbController;

        $handler->setup();
    }
}

