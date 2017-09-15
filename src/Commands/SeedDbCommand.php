<?php 

namespace Bot\Commands;

use Bot\Controllers\DbSeedController;
use FondBot\Toolbelt\Command;

/**
* 
*/
class SeedDbCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setName('db:seed');
        $this->setDescription('Base seed database');
    }

    /**
     * {@inheritdoc}
     */
    public function handle(): void
    {
        $handler = new DbSeedController;

        $handler->seed();
    }
}


