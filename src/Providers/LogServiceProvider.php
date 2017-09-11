<?php

declare(strict_types=1);

namespace Bot\Providers;

use Monolog\Handler\StreamHandler;
use Monolog\Handler\HandlerInterface;
use FondBot\Application\LogServiceProvider as BaseLogServiceProvider;

class LogServiceProvider extends BaseLogServiceProvider
{
    /**
     * Define handlers.
     *
     * @return HandlerInterface[]
     */
    public function handlers(): array
    {
        // Write application logs
        return [
            new StreamHandler('php://stderr'),
            new StreamHandler(resources('logs/app.log')),
        ];
    }
}
