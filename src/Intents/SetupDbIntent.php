<?php 

declare(strict_types=1);

namespace Bot\Intents;

use Bot\Controllers\DbSeedController;
use Bot\Controllers\SetupDbController;
use Bot\Repository\FoodRepository;
use FondBot\Conversation\Activators\Activator;
use FondBot\Conversation\Intent;
use FondBot\Drivers\ReceivedMessage;

class SetupDbIntent extends Intent
{
    /**
     * Intent activators.
     *
     * @return Activator[]
     */
    public function activators(): array
    {
        return [
            $this->exact('/init_db'),
        ];
    }

    public function run(ReceivedMessage $message): void
    {   
        $installer = new SetupDbController;
        $seeder = new DbSeedController;
        try {
            $installer->delete();
            $installer->setup();
            $seeder->seed();
        } catch (\Exception $e) {
            $this->sendMessage($e->getMessage());
        }

        $this->sendMessage("БД УСТАНОВЛЕНА");
    }
}
