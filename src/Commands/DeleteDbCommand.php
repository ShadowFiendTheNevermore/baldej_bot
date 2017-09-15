<?php 

namespace Bot\Commands;

use Bot\Controllers\SetupDbController;
use FondBot\Toolbelt\Command;


/**
* Setup Database for Application command
*/
class DeleteDbCommand extends Command
{

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setName('db:delete');
        $this->setDescription('Delete bots database');
        $this->setHelp('I can help you');
    }

    /**
     * {@inheritdoc}
     */
    public function handle(): void
    {
        $handler = new SetupDbController;

        $handler->delete();
    }
}
